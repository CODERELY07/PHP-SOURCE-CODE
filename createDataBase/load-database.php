<?php
    $server_name = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($server_name, $username, $password);

    if($conn->connect_error){
        die("Connection Failed " . $conn->connect_error); 
    }
    $sql = "SHOW DATABASES";
    $result = $conn->query($sql);

    $output = "";
    if($result->num_rows > 0){
    $output = '<h3>DataBase Table</h3>
        <table>
            <tr>
                <th>DataBase Name</th>
            </tr> ';
                   
                while($row = $result->fetch_assoc()){
                    $output .= "
                    <tr>
                        <td>" . $row["Database"] . "</td>
                        <td>
                    </tr>";
                }

        $output .='</table>';
        $conn->close();
        echo $output;
    }else{
        echo "No record";
    }

?>