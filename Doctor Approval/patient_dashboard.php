<?php
// Connect to MySQL
$mysqli = new mysqli("localhost", "root", "", "doctor_patient_test");

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// If form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Prepare an insert statement
    $sql = "INSERT INTO appointments (patient_id, doctor_id, appointment_date) VALUES (?, ?, ?)";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("iis", $param_patient_id, $param_doctor_id, $param_appointment_date);
        
        // Set parameters
        $param_patient_id = $_POST['patient_id'];
        $param_doctor_id = $_POST['doctor_id'];
        $param_appointment_date = $_POST['appointment_date'];
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "Appointment created successfully.";
        } else{
            echo "ERROR: Could not execute query. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
</head>
<body>
    <h2>Create Appointment</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="patient_id">Patient ID:</label>
        <input type="text" name="patient_id" id="patient_id"><br><br>
        <label for="doctor_id">Doctor ID:</label>
        <input type="text" name="doctor_id" id="doctor_id"><br><br>
        <label for="appointment_date">Appointment Date:</label>
        <input type="datetime-local" name="appointment_date" id="appointment_date"><br><br>
        <input type="submit" value="Submit">
    </form>


</body>
</html>
