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
        $query = "SELECT gallery.id, gallery.name, gallery.description, picture.url from gallery
        left JOIN picture
        ON gallery.id = picture.gallery_id GROUP by gallery.id;";

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

    public function getGallerysByUser($userId){
        $query = "SELECT gallery.id, gallery.name, gallery.description, picture.url from gallery
        left JOIN picture
        ON gallery.id = picture.gallery_id where gallery.user_id = ? GROUP by gallery.id";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $userId);
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

    public function create($name, $descripiton, $userId){
        $currentDate = date("Y-m-d");
        $query = "INSERT INTO $this->tableName (name, description, createdate, user_id, share_link) VALUES (?, ?, ?, ?, ?)";
        $shareLink = uniqid();
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssis', $name, $descripiton, $currentDate, $userId, $shareLink);

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

    public function pictures($galleryId){
        $query = "SELECT * FROM picture where gallery_id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $galleryId);
        $statement->execute();

        $result = $statement->get_result();
        if (!$result) {
            throw new Exception($statement->error);
        }

        // Datensätze aus dem Resultat holen und in das Array $rows speichern
        $rows = array();
        while ($row = $result->fetch_object()) {
            $rows[] =$row;
        }

        return $rows;
    }

    public function update($name, $descripiton, $id){
        $query = "UPDATE {$this->tableName}
        SET name = ?, description = ?
        WHERE id = ?;";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssi', $name, $descripiton, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
}
?>