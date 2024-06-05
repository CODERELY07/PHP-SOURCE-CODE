<?php
    require_once 'connection.php';

    if(isset($_POST['patient-submit'])){
        $name = $_POST['patientname'];
        $age = $_POST['patientage'];
        $gender = $_POST['gender'];
        $phone = $_POST['patientphone'];
        $email = $_POST['patientemail'];
        $address = $_POST['patientaddress'];
        $password = $_POST['patientpassword'];

        $query = "INSERT INTO patient (name,age,gender,phone,email,address,password) VALUES ('$name','$age','$gender','$phone','$email','$address','$password')";

        $result = mysqli_query($conn, $query);

        if($result){
            echo "<script> alert('Data Inserted Successfully'); </script>";
        }else{
            echo "<script> alert('Data Faild'); </script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert form data into database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="hidden" id="add-patient">
                    <div class="container my-3">
                        <div class="card">
                            <div class="card-header p-4">
                                <h4 class="mb-0">Add Patient</h4>
                            </div>
                            <div class="card-body">
                                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                                    <div class="mb-3">
                                        <label for="patientname" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="patientname" name="patientname">
                                    </div>
                                    <div class="mb-3">
                                        <label for="patientage" class="form-label">Age</label>
                                        <input type="number" class="form-control col-xs-3" id="patientage" name="patientage">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-block">Sex</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="patientmale">
                                            <label class="form-check-label" for="patientmale" value="Male">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="patientfemale">
                                            <label class="form-check-label" for="patientfemale" value="Female">Female</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="patientphone" class="form-label">Phone</label>
                                        <input type="tel" class="form-control" id="patientphone" name="patientphone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="patientemail" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="patientemail" name="patientemail">
                                    </div>
                                    <div class="mb-3">
                                        <label for="patientaddress" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="patientaddress" name="patientaddress">
                                    </div>
                                    <div class="mb-3">
                                        <label for="patientpassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="patientpassword" name="patientpassword">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="patient-submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</body>
</html>