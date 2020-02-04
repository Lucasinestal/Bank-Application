<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "users";
 
    // object properties
    public $transaction_id;
    public $from_amount;
    public $from_account;
    public $from_currency;
    public $to_amount;
    public $to_account;
    public $to_currency;
    public $currency_rate;
    public $date;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    public function read(){
        $query = "SELECT * FROM $this->table_name WHERE ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function transfer(){
        $query = "SELECT * FROM $this->table_name WHERE ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>




