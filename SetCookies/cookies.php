<?php
$cookie_name = "user"; // Define the cookie name

if(isset($_COOKIE[$cookie_name])) { // Check if the cookie is set
    $cookie_userName = $_COOKIE[$cookie_name]; // Retrieve the value of the cookie
    echo "Welcome back, $cookie_userName!"; // Display a welcome message or utilize the cookie value as needed
} else {
    echo "Cookie not set."; // If the cookie is not set, display a message indicating so
}
?>
