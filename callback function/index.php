<?php
    // Define a function to add an exclamation mark to a string
    function exclaim($str){
        return $str . "!";
    }

    // Define a function to add a question mark to a string
    function ask($str){
        return $str . "?";
    }

    // Define a function to print a formatted string
    function print_name($str, $format){
        echo $format($str);
    }

    // Check if the form has been submitted
    if(isset($_POST['submit'])){
        // Retrieve the values from the form
        $name = $_POST['name'];
        $symbol = $_POST['symbol'];

        // Check the selected symbol and call the appropriate function
        if($symbol == "!"){
            print_name($name, "exclaim");
        } elseif($symbol == "?"){
            print_name($name, "ask");
        }
    }
?>
<!-- HTML form for input -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="name" id="name">
    <select name="symbol" id="symbol">
        <option value="None" hidden>SELECT SYMBOL</option>
        <option value="!">!</option>
        <option value="?">?</option>
    </select>
    <input type="submit" name="submit" value="Submit">
</form>
