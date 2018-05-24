<?php
require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class ImageRepository extends Repository
{
    protected $tableName = 'picture';

    public function getAllPictures($max = 100){
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

    public function upload($date, $name, $desc, $galleryId, $url, $uid){
      
        $query = "INSERT INTO $this->tableName (name, description, url, gallery_id, user_id, created) VALUES (?, ?, ?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssiis', $name, $desc, $url, $galleryId, $uid, $date);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }


    public function getAllPicturesByGallerId($galleryId){
        $query = "SELECT * FROM {$this->tableName} WHERE id = ?";
        

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param("i", $galleryId);
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