<?php

include "connection.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM curd WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $emal = $row['email'];
    $phone = $row['phone'];
}

?>
<?php
if(isset($_POST['update'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $sql= "UPDATE curd SET name='$name',email='$email', phone='$phone' WHERE id =$id";
    $conn->query($sql);
    header("Location:index.php");
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
        <input type="text" name="name" value="<?php echo $name?>"><br><br>

        <label for="email">Email :</label>
        <input type="email" name="email"  value="<?php echo $emal?>"><br><br>

        <label for="phone">Phone :</label>
        <input type="phone" name="phone" value="<?php echo $phone?>"><br><br>

        <button type="submit" name='update'>update</button>

        </form>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js
    "></script>
</body>
</html>