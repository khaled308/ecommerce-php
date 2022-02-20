<?php
require_once __DIR__ .'/core/database/db.php';
require_once __DIR__ . '/core/database/crud.php';
require_once __DIR__ .'/core/functions/login.php';


$inc = __DIR__ .'/core/includes/';


// public files
$dirFullpath = dirname($_SERVER['PHP_SELF']) ;

$dirName = join('/',array_slice(explode('/',$dirFullpath),0,-1)) ;
$dirName = !str_contains($dirName , 'admin') ? $dirName . '/admin' : $dirName ;
$public = $dirName .'/public/';

