<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<?php include "navber.php"?>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Emal</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "connection.php";
            $sql = "SELECT * from curd";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){

            echo "<tr>
            <th scope='row'>$row[id]</th>
            <td>$row[name]</td>
            <td>$row[email]</td>
            <td>$row[phone]</td>
            <td>
                <a href='update.php?id=$row[id]' class='btn btn-primary'>EDIT</a>
                <a href='delete.php?id=$row[id]' class='btn btn-danger'>Delete</a>
            </td>
            </tr>";
            };
           
            ?>
        </tbody>
        </table>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
"></script>
</body>
</html>