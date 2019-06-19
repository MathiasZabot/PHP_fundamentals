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

    public function getAllData(/*$table = null*/)
    {
        $stmt = $this->conn->prepare("SELECT * FROM posts LEFT JOIN users ON posts.user_id = users.user_id");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getPostById($id = null)
    {
        $stmt = $this->conn->prepare("SELECT * FROM posts WHERE post_id = ".$id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getUsersData(){
        $stmt = $this->conn->prepare("SELECT user_id,username FROM users");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function deleteDatabyId($table = null,$id = null){
        $stmt = $this->conn->prepare("DELETE FROM ".$table." WHERE post_id=".$id);
        $stmt->execute();
    }

    public function updatePostbyId($id = null,$title = null ,$body = null ){
        $stmt = $this->conn->prepare("UPDATE `posts` SET title = '".$title."',body = '".$body."' WHERE post_id=".$id);
        $stmt->execute();
    }

    public function createPost($title,$body,$create_date,$user_id){
        $stmt = $this->conn->prepare("INSERT INTO posts (title, body, create_date, user_id) VALUES ('".$title."', '".$body."', TIMESTAMP('".$create_date."'), '".$user_id."');");
        $stmt->execute();
    }
}