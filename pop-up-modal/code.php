<?php

    require_once 'connection.php';

    if(isset($_POST['save_data'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['number'];

        $query = "INSERT INTO users(name,email,phone) VALUES ('$name','$email','$phone')";

        $result = mysqli_query($conn,$query);

        if($result){
            $_SESSION['status'] = "Data inserted successfully";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Insertion of data failed";
            die($conn->error);
            header("Location: index.php");
        }

    }

    //ajax view
    if(isset($_POST['click_view_button'])){
        $id = $_POST['user_id'];
        // echo $id;

        $query = "SELECT * FROM users WHERE id='$id'";
        $fetch_query = mysqli_query($conn,$query);

        if(mysqli_num_rows($fetch_query) > 0){
            while($row = mysqli_fetch_array($fetch_query)){
                echo '
                <h6>User id : ' . $row['id'] .'</h6>
                <h6>Full name : ' . $row['name'] .'</h6>
                <h6>Email Address : ' . $row['email'] .'</h6>
                <h6>Phone Number : ' . $row['phone'] .'</h6>
                ';
            }
        }else{
            echo $result = '<h4>No record found</h4>';
        }
    }

    //ajax edit
    if(isset($_POST['click_edit_button'])){
        $id = $_POST['user_id'];
        // echo $id;
        $arrayresult = [];
        $query = "SELECT * FROM users WHERE id='$id'";
        $fetch_query = mysqli_query($conn,$query);

        if(mysqli_num_rows($fetch_query) > 0){
            while($row = mysqli_fetch_array($fetch_query)){
              
                array_push($arrayresult, $row);
                header('content-type: application/json');
                echo json_encode($arrayresult);
            }
        }else{
            echo $result = '<h4>No record found</h4>';
        }
    }

    //update data
    if(isset($_POST['update_data'])){
        $name = $_POST['name'];
        $id = $_POST['id'];
        $email = $_POST['email'];
        $phone = $_POST['number'];

        $update_query = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id = '$id'";

        $update_query_run = mysqli_query($conn,$update_query);

        if($update_query_run){
            $_SESSION['status'] = "Data Updated successfully";
            header("Location: index.php");
        }else{
            $_SESSION['status'] = "Data not updated successfully";
            header("Location: index.php");
        }

    }

    //delete data

    if(isset($_POST['click_delete_button'])){
        $id = $_POST['user_id'];

        $delete_query = "DELETE FROM users WHERE id='$id'";
        $delete_run = mysqli_query($conn, $delete_query);

        if($delete_run){
            echo "Data deleted Successfully";
        }else{
            die($conn->error . "Data delition Not Successfulll");
        }
    }

    //comfoirm delete data 
    if(isset($_POST['delete_data'])){
        $id = $_POST['user_id'];

        $confirm_delete_query = "DELETE FROM users WHERE id='$id'";
        $confirm_delete_run = mysqli_query($conn, $confirm_delete_query);

        if($confirm_delete_run){
            echo "Data deleted Successfully";
        }else{
            die($conn->error . "Data delition Not Successfulll");
        }
    }
?>