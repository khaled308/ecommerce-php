<?php
namespace db ;
use PDO ;
class Crud{
    function __construct()
    {
        $this->pdo = connect();
    }

    function create(string $table, $data){
        $keys = array_keys($data);
        $vals = [];
        foreach($keys as $key){
            $vals[] = ":$key";
        }
        $keysStr = join(',',$keys);
        $valsStr = join(',',$vals);
        $query = "INSERT INTO $table($keysStr) VALUES($valsStr)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($data);
    }

    function read(string $table,$id){
        $query = "SELECT * FROM $table WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetch();
        return $result ;
    }


    function update(string $tableName,int $id, array $data){
        $keys = array_keys($data);
        $new_keys = [];
        foreach($keys as $key){
            $new_keys[] = "$key=:$key";
        }

        $keysStr = join(',',$new_keys);
        $query = "UPDATE $tableName SET $keysStr WHERE id=:id ";
        $stmt = $this->pdo->prepare($query);
        $data['id'] = $id ;
        $stmt->execute($data);
    }

    function delete(string $table,$id){
        $query = "DELETE FROM $table WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id'=>$id]);
    }
}