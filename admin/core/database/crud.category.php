<?php
namespace CategoryDB ;
use db\Crud as DB;
use PDO ;
class Crud extends DB{
    function displayCtaegories(){
        $query = "SELECT * FROM categories";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        //extract data 
        $result = [] ;
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $result[] = $row ;
        }
        return $result ;
    }

}