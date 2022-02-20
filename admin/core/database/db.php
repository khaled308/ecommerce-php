<?php
$host = 'localhost:3307';
$db = 'shop' ;
$dsn = "mysql:host=$host;dbname=$db";
$user = 'root';
$password = '';

function connect(){
    global $dsn , $user , $password ;
    try{
        $pdo = new PDO($dsn,$user,$password);
        return $pdo ;
    }
    catch(PDOException $e){
        echo $e->getMessage() ;
    }
}
