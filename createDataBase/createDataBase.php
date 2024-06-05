<?php

    $server_name = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($server_name, $username, $password);

    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }

        $name = htmlspecialchars($_POST['name']);

        $sql = "CREATE DATABASE $name";
        if($conn->query($sql) === TRUE){
            echo 1;
        }else{
            echo 0;
        }

        $conn->close();

?>