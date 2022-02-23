<?php
function login(){
    $crud = new UserDB\Crud();
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $userName = $_POST['username'];
        $password = sha1($_POST['password']);
        $params = ['username'=>$userName , 'password'=>$password];

        $res = $crud->login($params);

        if(count($res) > 0){
            $_SESSION['username'] = $res['full_name'];
            $_SESSION['id'] = $res['id'];
            echo json_encode(['status'=>'ok']) ;
        }
        
        else echo json_encode(['status'=>'404']);
        
        exit();
    }
}

