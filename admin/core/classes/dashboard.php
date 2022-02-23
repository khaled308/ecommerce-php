<?php
class Dashboard{
    function __construct()
    {
        $this->crud = new db\Crud();
        $this->utilites = new Utilities();
        $this->server = $_SERVER['SERVER_NAME'];
        $this->logged = false ;
        $this->page = '';
        $this->checkLogin();
        
        if($this->logged){
            $this->URL = $this->prepareURL();
            $this->handleCases();
        }

    }

    private function checkLogin(){
        if(!isset($_SESSION['username'])){
            $this->logOut();
        }
        else $this->logged = true ;
    }

    private function prepareURL(){
        $url = $_GET['url'];
        return $url ;
    }

    function logOut(){
        $this->logged = false ;
        session_unset();
        session_destroy();

        header("Location: http://$this->server/shop/admin");
    }

    function display_page(){
        switch($this->page){
            case 'edit':
                require_once './edit.php';
                break ;
            case 'members':
                require_once './add-member.php';
                break ;
            case 'dashboard':
                require_once './dashboard-statistics.html';
                break ;    
        }
    }

    function handleCases(){
        switch($this->URL){
            case 'dashboard': 
                $this->page = 'dashboard'; 
                break;

            case 'members':
                $this->page = 'members'; 
                break;

            case 'members/edit':
                $this->page = 'edit'; 
                break;  
        
            case 'logout':
                $this->logOut();
                break ;  
            case 'edit_profile':
                $this->page = 'edit';
                $_SESSION['data'] = $this->crud->read('users',$_SESSION['id']);
                $this->utilites->updateProfile($_SESSION['id']);
                break ;      

            default :
                header("HTTP/1.0 404 Not Found");
                die ;
        }   
    }
    
}