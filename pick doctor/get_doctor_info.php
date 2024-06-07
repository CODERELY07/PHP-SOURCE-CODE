<?php
$db = new mysqli('localhost', 'root', '', 'doctor_patient_test');
$doctorId = $_GET['doctorId'];
$query = "SELECT * FROM doctors WHERE id = $doctorId";
$result = $db->query($query);
$row = $result->fetch_assoc();
echo "Doctor Name: " . $row['name'] . "<br>";
echo "Fees: $" . $row['fees'];
$db->close();
?>
