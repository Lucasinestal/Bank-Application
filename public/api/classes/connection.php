<?php

require_once __DIR__ . '\..\..\..\env\vendor\autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


class Connection
{
    private $db;
    private $server;
    private $user;
    private $pass;
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $con;

    
    public function openConnection()
    {
        $this->user = getenv('DB_USER');
        $this->db = getenv('DB_DATABASE');
        $this->host = getenv('DB_HOST');
        $this->server = "mysql:host=$this->host;dbname=$this->db;";


        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;
        } catch (PDOException $e) {
        }
    }
    public function closeConnection()
    {
        
        $this->con = null;
    }
}
