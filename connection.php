<?php
    session_start();
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $database_name = "jolibee";
    $conn = mysqli_connect($server_name, $username, $password, $database_name);
    if (!$conn) {
            echo "Error " ;
    } 
?>