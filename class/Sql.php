<?php

class Sql extends PDO{

    private $conn;

    public function __construct()
    {
        
        $this->conn = new PDO ("mysql:host=127.0.0.1;dbname=dao","root","");

    }

    private function setParams ($statement,$parameters=array()){
        
        foreach ($parameters as $key => $value) {

            $statement->bindParam($key, $value);
            
        }
    }

    private function setParam($statement, $key,$value){
        
        $statement->bindParam($key, $value);

    }
    public function Queryy($rawQuery, $params = array()){

        $stmt = $this->conn->prepare($rawQuery);
        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
        
        
        
    }
    

    public function select($rawQuery, $params = array()):array
    {

        $stmt  = $this-> queryy($rawQuery,$params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
        
    


    
}


?>