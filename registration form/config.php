<?php
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db = "accountregistration";

    $conn = new mysqli($server_name,$username,$password,$db);

    if($conn->connect_error){
        die("connection Failed " . $conn->connect_error);
    }
 


?>