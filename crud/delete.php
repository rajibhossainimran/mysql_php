<?php

if(isset($_GET['id'])){
    include "connection.php";
    $id = $_GET['id'];
    $sql = "DELETE FROM curd WHERE id = $id";
    if(mysqli_query($conn,$sql)){
        header('Location:index.php');
    }
}

?>