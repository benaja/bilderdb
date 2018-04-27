<?php
require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class GalleryRepository extends Repository
{
    protected $tableName = 'gallery';

    public function getAllGallery($max = 100){
        $query = "SELECT * FROM {$this->tableName} LIMIT 0, $max";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] = $row;
        }                                          
        return (json_decode(json_encode($rows), true));                
    }

    public function create($name, $descripiton){
        $currentDate = date("Y-m-d");
        $query = "INSERT INTO $this->tableName (name, description, createdate) VALUES (?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sss', $name, $descripiton, $currentDate);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function exist($id, $attribut){
        $query = "SELECT count(*) as anzahl FROM {$this->tableName} WHERE $attribut =?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $id);

        // Das Statement absetzen
        $statement->execute();

        // Resultat der Abfrage holen
        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Ersten Datensatz aus dem Reultat holen
        $row = $result->fetch_object();

        // Datenbankressourcen wieder freigeben
        $result->close();

        // Den gefundenen Datensatz zurückgeben
        if($row->anzahl > 0){
            return true;
        }else{
            return false;
        }
    }
}
?>