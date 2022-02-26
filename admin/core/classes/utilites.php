<?php
class Utilities{
    function __construct()
    {
        $this->crud = new UserDB\Crud();
        $this->addMember();
        $this->displayAllData();
        $this->deleteMember();
        $this->updateMember();
        $this->activateMember();
    }

    function updateProfile($id){
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])){
            unset($_POST['edit']);
            $data = $this->prepare($_POST);
            if($this->validate($data)){
                if(empty($data['password'])) unset($data['password']);
                else $data['password'] = sha1($data['password']);
                $this->crud->update('users',$id,$data);
                echo json_encode(["status"=>'ok','id'=>$id]);
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
                $this->crud->create('users',$data);
                echo json_encode(["status"=>'ok']);
            }
            else echo json_encode(["status"=>"404"]);
            exit();
        }
    }

    function displayAllData(){
        if($_GET['url'] ==='members'){
            $_SESSION['members_data']= $this->crud->displayMembers();
        }
    }

    function deleteMember(){
        if(isset($_GET['action']) && $_GET['action'] ==='delete'){
            if($_GET['id']){
                $this->crud->delete('users',$_GET['id']);
                echo json_encode(['status'=>'ok']);
            }
            else echo json_encode(['status'=>404]);
            exit();
            
        }
    }

    function updateMember(){
        if(isset($_GET['action']) && $_GET['action'] ==='edit'){
            if(isset($_GET['id'])){
                $id = $_GET['id'] ;
                $_SESSION['data'] = $this->crud->read('users',$id);
                echo json_encode(['status'=>'ok']) ;
            }
            else echo json_encode(['status'=>404]);
            exit();
        }
        if(isset($_GET['id'])) $this->updateProfile($_GET['id']);
    }

    function activateMember(){
        if(isset($_GET['action']) && $_GET['action'] ==='activate'){
            if($_GET['id']){
                $id = $_GET['id'] ;
                $data = ['register_status'=>1];
                $this->crud->update('users',$id,$data);
                echo json_encode(['status'=>'ok','id'=>$id]) ;
            }
            else echo json_encode(['status'=>404]);
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