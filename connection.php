<?php
    session_start();
    $server_name = "sql3.freemysqlhosting.net";
    $username = "sql3507377";
    $password = "2QfnCRWGXK";
    $database_name = "sql3507377";
    $conn = mysqli_connect($server_name, $username, $password, $database_name);
    if (!$conn) {
            echo "Error " ;
    } 
?>