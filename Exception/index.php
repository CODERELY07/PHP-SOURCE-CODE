<?php
 
    function checkEmptyString($name){
        if($name == ""){
            throw new Exception("No Value it should not empty string");
        }
        return $name;
    }
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        try{
            echo checkEmptyString($name);
        }catch(Exception $ex){
            $code = $ex->getCode();
            $message = $ex->getMessage();
            $file = $ex->getFile();
            $line = $ex->getLine();
            echo "Exception thrown in $file on line $line: [Code $code]
            $message";
        }
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
    <!-- HTML form for input -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <input type="text" name="name" id="name">
    <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>