<?php

    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db = "my_source_code";

    $conn = new mysqli($server_name,$username,$password,$db);

    if($conn->connect_error){
        die("Connection failed" . $conn->connect_error);
    }
    echo "Connected succesfully";


?>