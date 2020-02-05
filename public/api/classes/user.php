<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "vw_users";
 
    // object properties
    public $id;
    public $firstName;
    public $lastName;
    public $password;
    public $mobilePhone;
    public $account_id;
    public $balance;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    public function read(){
        $query = "SELECT * FROM $this->table_name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
}
    public function checkUser(){
        $query = "SELECT * FROM $this->table_name WHERE firstname = $this->firstName AND lastname = $this->lastName";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function checkBalance(){
        $query = "SELECT * FROM $this->table_name WHERE id = $this->id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>




