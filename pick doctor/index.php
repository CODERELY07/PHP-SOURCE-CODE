<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Information</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <form id="doctorForm">
        <label for="doctorSelect">Select a Doctor:</label>
        <select id="doctorSelect" name="doctorSelect">
            <option value="">Select Doctor</option>
            <?php
                // PHP code to fetch doctors from the database
                $db = new mysqli('localhost', 'root', '', 'doctor_patient_test');
                $query = "SELECT id, name FROM doctors";
                $result = $db->query($query);
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['id']."'>".$row['name']."</option>";
                }
                $db->close();
            ?>
        </select>
    </form>

    <div id="doctorInfo"></div>

    <script>
        $(document).ready(function(){
            $('#doctorSelect').change(function(){
                var doctorId = $(this).val();
                if (doctorId !== "") {
                    $.ajax({
                        url: 'get_doctor_info.php',
                        type: 'GET',
                        data: { doctorId: doctorId },
                        success: function(response) {
                            $('#doctorInfo').html(response);
                        }
                    });
                } else {
                    $('#doctorInfo').html("");
                }
            });
        });
    </script>
</body>
</html>
