<?php
    require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h1>Registration</h1>
                    <p>Fill up the form with correct values.</p>
                    <hr class="mb-3">
                    <label for="firstname">First Name:</label>
                    <input class="form-control" type="text" name="fname" id="fname" required>

                    <label for="lastname">Last Name:</label>
                    <input class="form-control" type="text" name="lname" id="lname" required>

                    <label for="email">Email Address:</label>
                    <input class="form-control" type="text" name="email" id="email" required>

                    <label for="phone">Phone Number:</label>
                    <input class="form-control" type="text" name="pnumber" id="pnumber" required>

                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="password" id="password" required>
                    <hr class="mb-3">
                    <input class="form-control btn btn-primary" type="submit" value="Submit" id="register" name="submit">
            </div>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       $(document).ready(function(){
            $('#register').click(function(e){
                var valid = this.form.checkValidity();

                if(valid){
                    e.preventDefault();
        
                    var firstname = $('#fname').val();
                    var lastname = $('#lname').val();
                    var email = $('#email').val();
                    var phone = $('#pnumber').val();
                    var password = $('#password').val();

                    $.ajax({
                        url:"proccess.php",
                        method:"POST",
                        data:{fname:firstname, lname:lastname, email:email,phone:phone,password:password},
                        success: function (data){
                            console.log(data);
                            if(data == 1){
                                Swal.fire({
                                title: "Registeration!",
                                text: "User Registerd Successfully",
                                icon: "success"
                            });
                           
                            }else{
                                Swal.fire({
                                title: "Registeration!",
                                text: "User Registerd Failed",
                                icon: "error"
                            });
                            }  
                        }
                    })
                } else {
                    alert('Please fill out all required fields.');
                }
            })
       });
    </script>
</body>
</html>
