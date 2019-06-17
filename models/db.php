<?php

class db
{
    protected $host, $username, $password, $dbname;
    //altijd private want in verschillende extensies andere connectie variabele
    private $conn;

    public function __construct($host = 'localhost', $username= 'root', $password ='',$dbname ='blog')
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        try {
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getAllData($table = null)
    {
        $stmt = $this->conn->prepare("SELECT * FROM ".$table);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getDatabyId($table = null,$id = null){
        $stmt = $this->conn->prepare("SELECT * FROM ".$table."WHERE post_id=".$id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        var_dump($result);
    }

    public function deleteDatabyId($table = null,$id = null){
        $stmt = $this->conn->prepare("DELETE FROM ".$table." WHERE post_id=".$id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
    }

    public function updateDatabyId($table = null,$columnName = null, $id = null){
        $stmt = $this->conn->prepare("UPDATE".$table."SET".$columnName." post_id=".$id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        var_dump($result);
    }

    public function createPost($user_id,$title,$body){

    }
}