<?php
    require_once 'connection.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $country = $_POST['country'];
        $gender = $_POST['gender'];

        // Check if the 'language' key exists in $_POST
        if(isset($_POST['language'])){
            // Corrected the spelling of 'language' array
            $languages = $_POST['language'];
            $language = '';

            foreach($languages as $row){
                $language .= $row . ","; 
            }

            // Remove the trailing comma
            $language = rtrim($language, ',');
        } else {
            // If 'language' key does not exist, set $language to an empty string
            $language = '';
        }

        // Removed single quotes around column names in the SQL query
        $query = "INSERT INTO tb_data (name, age, country, gender, languages) VALUES ('$name', '$age', '$country', '$gender', '$language')";
        mysqli_query($conn, $query);

        //$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        ///always use die mysqli_error to fix bugs
        echo "<script> alert('Data Inserted Successfully'); </script>";

        // Redirect to the same page to prevent form resubmission again and again
        header("Location: {$_SERVER['PHP_SELF']}");
        exit; // Stop further execution
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <style media="screen">
        label{
            display: block;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <label for="">Name</label>
        <input type="text" name="name" required value="">
        <label for="">Age</label>
        <input type="number" name="age" required value="">
        <label for="">Country</label>
        <select name="country" required>
            <option value="" selected hidden>Select Country</option>
            <option value="USA">USA</option>
            <option value="Uk">Uk</option>
            <option value="India">India</option>
        </select>
        <label for="">Gender</label>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
        <label for="">Languages</label>
        <input type="checkbox" name="language[]" value="English">English
        <input type="checkbox" name="language[]" value="Chinese">Chinese
        <input type="checkbox" name="language[]" value="Spanish">Spanish
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
