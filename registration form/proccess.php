<?php
    require_once 'config.php';
    if(isset($_POST)){
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
           // Check if the user already exists in the database based on name or email
           $stmt_check = $conn->prepare("SELECT * FROM users WHERE firstname = ? OR email = ?");
           $stmt_check->bind_param("ss", $firstName, $email);
           $stmt_check->execute();
           $result_check = $stmt_check->get_result();

           if($result_check->num_rows > 0){

           }
        $stmt = $conn->prepare("INSERT INTO users (firstname,lastname,email,phone,password) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $password);

        if($stmt->execute()){
            echo 1;
        } else {
            echo 0;
        }
        
        $stmt->close();
        $conn->close();
       
    }else{
        echo "No data";
    }
?>