<?php 
include 'database.php'; 

class Login {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conDB();
    }

    
}

class Register {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->conDB();
    }

   
}




?>