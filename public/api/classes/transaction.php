<?php
 
class Transaction
{
    protected $conn;
    private $table_name = "transactions";
    private $transaction_id;
    private $from_amount;
    private $from_account;
    private $from_currency;
    private $to_amount;
    private $to_account;
    private $to_currency;
    private $currency_rate;
    private $date;

    public function __construct($db)
    {
        $this->conn = $db;
    }
 
    public function setFromAmount($from_amount)
    {
        $this->from_amount = $from_amount;
    }
    public function setFromAccount($from_account)
    {
        $this->from_account = $from_account;
    }
    public function setToAmount($to_amount)
    {
        $this->to_amount = $to_amount;
    }
    public function setToAccount($to_account)
    {
        $this->to_account = $to_account;
    }
  
  
 
    // create new Transaction
    public function createTransaction($balance, $amount)
    {
        $this->checkTransaction($balance, $amount);

        try {
            $query = "INSERT INTO transactions (from_amount, from_account, to_amount, to_account)
            VALUES ( :from_amount, :from_account, :to_amount, :to_account )";
            
            $stmt = $this->conn->prepare($query);
            // set parameters and execute
            $stmt->bindParam(':from_amount', $this->from_amount);
            $stmt->bindParam(':from_account', $this->from_account);
            $stmt->bindParam(':to_amount', $this->to_amount); 
            $stmt->bindParam(':to_account', $this->to_account); 
    

            //$stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        } catch (Exception $e) {
            die("There's an error in the query!");
        }
    }
    
    // getbalance
    public function getBalance()
    {
        try {
            $query = "SELECT balance FROM vw_users WHERE account_id = :from_account";
            $stmt = $this->conn->prepare($query);
            //Set params
            $stmt->bindParam(':from_account', $this->from_account); 
            //execute
            $stmt->execute();
            $balance = $stmt->fetchAll()[0]['balance'];
            return $balance;
        } catch (Exception $e) {
            die("Oh noes! There's an error in the query!");
        }
    }
    public function checkTransaction($balance, $amount)
    {
        if ($balance < $amount || $balance < 0) {
            throw new Exception('No Coverage');
            echo $e->getMessage();
        }
        return true;
    }
}
