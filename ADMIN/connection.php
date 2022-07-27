<?php
    $server_name = "sql6.freemysqlhosting.net";
    $username = "sql6509179";
    $password = "53Lilcmc8k";
    $database_name = "sql6509179";
    $conn = mysqli_connect($server_name, $username, $password, $database_name);
    if (!$conn) {
            echo "Error " ;
    } 
   
?>