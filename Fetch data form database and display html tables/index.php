<?php
    require_once 'connection.php';

    $query = "SELECT * FROM student";
    $result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch data and display table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <h2 class="jumbotron text-center py-3 mb-0">Student Record</h2>
            <table class="table mt-0">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Country</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['country']?></td>
                        </tr>
                    <?php
                        }    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>