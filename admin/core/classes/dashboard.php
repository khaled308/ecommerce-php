<?php
class Dashboard{
    function __construct()
    {
        $this->server = $_SERVER['SERVER_NAME'];
        $this->logged = false ;
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

    function handleCases(){
        switch($this->URL){
            case 'dashboard/logout':
                $this->logOut();
                break ;
        }
    }
    
}