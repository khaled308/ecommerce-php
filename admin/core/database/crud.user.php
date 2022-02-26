<?php
namespace UserDB ;
use db\Crud as DB;
use PDO ;
class Crud extends DB{
    function login(array $info){
        $query = "SELECT full_name,id from users WHERE (user_name=:username OR email=:username) AND password=:password ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($info);
        $result = $stmt->fetch();
        return $result ;
    }

    function deleteMember($id){
        $query = "DELETE FROM users WHERE id=:id AND group_id != '1' ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id'=>$id]);
    }

    function displayMembers(){
        $query = "SELECT id,user_name,full_name,email,added_at,register_status FROM users WHERE group_id != '1' ";
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