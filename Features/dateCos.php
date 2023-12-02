<?php
session_start();
include 'C:\xampp\htdocs\Proiect\Utils\db_connect.php';
$db1 = new DataBase();
$db = $db1->connnectDataBase();
    if(!isset($_SESSION['cos'])){
        //$products = array();
        $_SESSION['cos'] = array();
    }
    if(isset($_GET['productID'])){
        array_push($_SESSION['cos'],$_GET['productID']);
        header('location:magazinHTML.php');
    }
    
    //echo "Products is: '".implode("','",$_SESSION['cos'])."'<br>";
   header('location:../magazinHTML.php');
mysqli_close($db); 
?>