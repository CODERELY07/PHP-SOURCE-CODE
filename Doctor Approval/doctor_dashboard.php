<?php
// TODO: Studt this 
// Connect to MySQL
$mysqli = new mysqli("localhost", "root", "", "doctor_patient_test");

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// If form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Prepare an update statement
    $sql = "UPDATE appointments SET status = ? WHERE id = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("si", $param_status, $param_id);
        
        // Set parameters
        $param_status = $_POST['status'];
        $param_id = $_POST['appointment_id'];
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "Appointment status updated successfully.";
        } else{
            echo "ERROR: Could not execute query. Please try again later.";
        }

        // Close statement
        $stmt->close();
    }
}

// Fetch appointments
$sql = "SELECT id, patient_id, doctor_id, appointment_date, status FROM appointments";
if($result = $mysqli->query($sql)){
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Doctor Dashboard</title>
    </head>
    <body>
        <h2>Appointments</h2>
        <table border='1'>
            <tr>
                <th>Appointment ID</th>
                <th>Patient ID</th>
                <th>Doctor ID</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>";

    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['patient_id']."</td>";
        echo "<td>".$row['doctor_id']."</td>";
        echo "<td>".$row['appointment_date']."</td>";
        echo "<td>".$row['status']."</td>";
        echo "<td>";
        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
        echo "<input type='hidden' name='appointment_id' value='" . $row['id'] . "'>";
        echo "<select name='status'>";
        echo "<option value='approved'>Approve</option>";
        echo "<option value='rejected'>Reject</option>";
        echo "</select>";
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>
    </body>
    </html>";

    // Free result set
    $result->free();
} else {
    echo "ERROR: Could not execute query. Please try again later.";
}

// Close connection
$mysqli->close();
?>
