<?php

include "connection.php";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO curd(name,email,phone) VALUES('$name','$email','$phone')";
    if(mysqli_query($conn,$sql)){
        echo 'DATA SUCCESSFULLY INSERTED';
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert data</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<?php include "navber.php"?>
    <section>
        <form method="POST">


        <label for="name">Name :</label>
        <input type="text" name="name"><br><br>

        <label for="email">Email :</label>
        <input type="email" name="email"><br><br>

        <label for="phone">Phone :</label>
        <input type="phone" name="phone"><br><br>

        <button type="submit" name='submit'>Submit</button>

        </form>
    </section>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
    "></script>
</body>
</html>