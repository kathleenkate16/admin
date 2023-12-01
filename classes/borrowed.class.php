<?php

require_once 'database.php';

Class Borrowed{
    //attributes

    public $id;
    public $member_id;
    public $item_name;
    public $borrower_name;
    public $maximum_book;
    public $borrower_date;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO borrowed (member_id, item_name, borrower_name, maximum_book, borrowed_date) VALUES 
        (:member_id, :item_name, :borrower_name, :maximum_book, :borrowed_date);";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':member_id', $this->member_id);
        $query->bindParam(':item_name', $this->item_name);
        $query->bindParam(':borrower_name', $this->borrower_name);
        $query->bindParam(':maximum_book', $this->maximum_book);
        $query->bindParam(':borrowed_date', $this->borrowed_date);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE borrowed SET member_id=:member_id, item_name=:item_name, borrower_name=:borrower_name, maximum_book=:maximum_book, borrowed_date=:borrowed_date WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':member_id', $this->member_id);
        $query->bindParam(':item_name', $this->item_name);
        $query->bindParam(':borrower_name', $this->borrower_name);
        $query->bindParam(':maximum_book', $this->maximum_book);
        $query->bindParam(':borrowed_date', $this->borrowed_date);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function delete($record_id){
        $sql = "DELETE FROM borrowed WHERE id = :id;";
        $query = $this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);

        if ($query->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function fetch($record_id){
        $sql = "SELECT * FROM borrowed WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM borrowed ORDER BY title ASC;";
        $query=$this->db->connect()->prepare($sql);
        $data = null;
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

}

?>