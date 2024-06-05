<?php
    session_start();
    $server_name = "localhost";
    $username = "root";
    $password = "";
    $db = "my_source_code";
    $conn = new mysqli($server_name,$username,$password,$db);

?>