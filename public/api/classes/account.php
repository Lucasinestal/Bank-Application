<?php
class Account{
 
    // database connection and table name
    private $conn;
    private $table_name = "account";
 
    // object properties
    public $id;
    public $user_id;
    public $currency;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    public function checkUserAccount($user_id){
        $query = "SELECT * FROM $this->table_name WHERE $user_id = $this->user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }   
}
?>




