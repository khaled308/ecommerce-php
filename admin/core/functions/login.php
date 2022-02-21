<?php
function login(){
    $crud = new Crud();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $userName = $_POST['username'];
        $password = sha1($_POST['password']);
        $query = "SELECT full_name,id from users WHERE (user_name=:username OR email=:username) AND password=:password ";
        $params = ['username'=>$userName , 'password'=>$password];

        $res = $crud->read($query , $params);

        if(count($res) > 0){
            $_SESSION['username'] = $res[0]['full_name'];
            $_SESSION['id'] = $res[0]['id'];
            echo json_encode(['status'=>'ok']) ;
        }
        
        else echo json_encode(['status'=>'404']);
        
        exit();
    }
}

