<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class UserRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'user';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($firstName, $lastName, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO $this->tableName (email, password, lastname, firstname) VALUES (?, ?, ?, ?)";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $email, $password, $lastName, $firstName);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }

    public function login($email)
    {
        // Query erstellen
        $query = "SELECT * FROM {$this->tableName} WHERE email=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $email);

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
        return $row;
    }

    public function exist($email){
        $query = "SELECT count(*) as anzahl FROM {$this->tableName} WHERE email=?";

        // Datenbankverbindung anfordern und, das Query "preparen" (vorbereiten)
        // und die Parameter "binden"
        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('s', $email);

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

    public function getAuthUser(){
        $query = "SELECT * from user where id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $_SESSION['userId']);

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
        return $row;
    }

    public function updateUser($firstName, $lastName, $id){
        $query = "UPDATE {$this->tableName} SET firstname = ?, lastname = ? WHERE id = ?;";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssi', $firstName, $lastName, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function updateUserWidthPW($firstName, $lastName, $password, $id){
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE {$this->tableName} SET firstname = ?, lastname = ?, password = ? WHERE id = ?;";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('sssi', $firstName, $lastName, $password, $id);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }

    public function delete($userid){
        $query = "delete from user where id = ?";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('i', $userid);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }
    }
}
