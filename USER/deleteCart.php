<?php 
require_once("connection.php");
    if(!isset($_SESSION['cart'])){
        header("location:index.php");exit;
    }
    $key = isset($_GET["idsp"]) ? $_GET["idsp"] : "";
    if($key){
        if(array_key_exists($key,$_SESSION['cart'])){
            unset($_SESSION['cart'][$key]);
        }
        else{

        }
    }
    header("location:listCart.php");exit;
    
 
?>