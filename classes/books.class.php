<?php

require_once 'database.php';

Class Books{
    //attributes

    public $id;
    public $title;
    public $author;
    public $publisher;
    public $genre;
    public $description;
    public $availability;
    public $image;

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    //Methods

    function add(){
        $sql = "INSERT INTO books (title, author, publisher, genre, description, availability, image) VALUES 
        (:title, :author, :publisher, :genre, :description,  :availability, :image);";

    $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':title', $this->title);
        $query->bindParam(':author', $this->author);
        $query->bindParam(':publisher', $this->publisher);
        $query->bindParam(':genre', $this->genre);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':availability', $this->availability);
        $query->bindParam(':image', $this->image);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function edit(){
        $sql = "UPDATE books SET title=:title, author=:author, publisher=:publisher, genre=:genre, description=:description, availability=:availability, image=:image WHERE id = :id;";

        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':title', $this->title);
        $query->bindParam(':author', $this->author);
        $query->bindParam(':publisher', $this->publisher);
        $query->bindParam(':genre', $this->genre);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':availability', $this->availability);
        $query->bindParam(':image', $this->image);
        $query->bindParam(':id', $this->id);
        
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function fetch($record_id){
        $sql = "SELECT * FROM books WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }

    function show() {
        $sql = "SELECT * FROM books ORDER BY title ASC;";
        $query = $this->db->connect()->prepare($sql);
        $data = null;
        if ($query->execute()) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
    

    public function sortrevise() {
        $sql = "SELECT * FROM books ORDER BY title DESC;";
        $query = $this->db->connect()->prepare($sql);
        $data = null;
        if ($query->execute()) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $data;
    }
}

?>