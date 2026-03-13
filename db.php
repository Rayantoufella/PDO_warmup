<?php 
$host='localhost' ; 
$username = 'root';
$password = '';
$db_name = 'Challenge1';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}catch(Exception $e){
    die("Error Could not be Connected ". $e->getMessage());
}



