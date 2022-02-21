<?php
class Utilities{
    function __construct()
    {
        $this->crud = new Crud();
        $this->updateProfile();
        $this->addMember();
    }
    function updateProfile(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])){
            unset($_POST['edit']);
            $data = $this->prepare($_POST);
            if($this->validate($data)){
                $passord_query =  'password=:password';
                if(empty($data['password'])){
                    $passord_query = '';
                    unset($data['password']);
                }
                else{
                    $data['password'] = sha1($data['password']);
                }
                $id = $_SESSION['id'] ;
                $query = trim("UPDATE  users SET user_name=:username, full_name=:fullname,email=:email,$passord_query",',').
                " WHERE id=$id";
                $this->crud->update($query,$data);

                echo json_encode(["status"=>'ok']);
            }
            else echo json_encode(["status"=>"404"]);
            exit();
        }
    }

    function addMember(){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])){
            unset($_POST['add']);
            $data = $this->prepare($_POST);
            if($this->validate($data)&& !empty($data['password'])){
                $data['password'] = sha1($data['password']);
                $query = "INSERT INTO users(user_name,email,full_name,password) VALUES(:username,:email,:fullname,:password)";
                $this->crud->create($query,$data);

                echo json_encode(["status"=>'ok']);
            }
            else echo json_encode(["status"=>"404"]);
            exit();
        }
    }

    function prepare($data){
        $new_data = [];
        foreach($data as $key=>$val){
            $new_data[$key] = trim($data[$key]);
        }
        return $new_data ;
    }

    function validate($data){
        foreach($data as $key=>$val){
            if(!$data[$key] && $key !='password'){
                return false ;
            }
        }
        return true ;
    }
}