<?php
require 'constant.php';

class mysql_DB {

    public $error = '';
    private $pdo = null;
    private $stmt = null;

    function __construct(){
        $this->pdo = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    // closing connection
    function __destruct(){
        if($this->pdo != null) { $this->pdo = null; }
        if($this->stmt != null){ $this->stmt=null; }
    }

    // select
    function select($sql, $data = null){
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($data);
        return $this->stmt->fetchAll();
    }


    // insert
    function insert($sql, $check_qry=null){
        if($check_qry != null){
            $result = $this->check($check_qry);
            if($result > 0){
                return 0;
                exit();
            }
            $this->stmt = $this->pdo->exec($sql);
            return $this->stmt;
        }else{
            $this->stmt = $this->pdo->exec($sql);
            return $this->stmt;
        }
    }

    // update
    function update($sql){
        $this->stmt = $this->pdo->exec($sql);
        return $this->stmt;
    }

    // delete 
    function delete($sql){
        $this->stmt = $this->pdo->exec($sql);
        return $this->stmt;
    }
    
}


$DB = new mysql_DB();