<?php
if(isset($_POST['submit'])){
    $cookie_name = "user";
    $cookie_userName = trim(htmlspecialchars($_POST['name']));
    $cookie_gender = trim(htmlspecialchars($_POST['gender']));

    // Set the cookie with an expiry time
    setcookie($cookie_name, $cookie_userName, time() + (86400 * 30), "/"); // 30 days

    // Redirect to another page
    header("Location: cookies.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post"> 
        <input type="text" name="name" id="name">
        <select name="gender" id="gender">
            <option hidden>Select your Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
