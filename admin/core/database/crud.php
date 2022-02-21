<?php
class Crud{
    function __construct()
    {
        $this->pdo = connect();
    }

    function create($query,array $params=[]){
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
    }

    function read($query,array $params = []){
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        //extract data 
        $result = [] ;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row ;
        }
        return $result ;
    }

    function update($query,array $params=[]){
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
    }
}