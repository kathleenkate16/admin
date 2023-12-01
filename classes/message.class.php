<?php

require_once 'database.php';

class Message {
    //attributes

    public $id;
    public $recipient;
    public $subject;
    public $message;

    protected $db;

    function __construct() {
        $this->db = new Database();
    }

    //Methods

    function add() {
        $sql = "INSERT INTO message (recipient, subject, message) VALUES (:recipient, :subject, :message);";

        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':recipient', $this->recipient);
        $query->bindParam(':subject', $this->subject);
        $query->bindParam(':message', $this->message);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function fetch($record_id) {
        $sql = "SELECT * FROM message WHERE id = :id;";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if ($query->execute()) {
            $data = $query->fetch();
        }
        return $data;
    }

    function show() {
        $sql = "SELECT * FROM message ORDER BY title ASC;";
        $query = $this->db->connect()->prepare($sql);
        $data = null;
        if ($query->execute()) {
            $data = $query->fetchAll();
        }
        return $data;
    }

    function delete($record_id) {
        $sql = "DELETE FROM message WHERE id = :id;";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

?>
