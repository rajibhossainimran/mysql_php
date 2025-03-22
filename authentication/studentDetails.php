<?php 
require_once("studentClass.php");
session_start();
if(!isset($_SESSION["sname"])){
    header("location:login.php");
 }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <style>
            /* navber style  */
    .navbar{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .navbar a {
        color: gray;
        text-decoration: none;
        font-weight: bold;
        margin: 0 10px;
        padding: 10px 15px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .navbar a:hover {
        background-color: #555;
    }

    .navbar .logout {
        background-color: #c0592b;
        padding: 10px 20px;
        
    }

    .navbar .logout:hover {
        background-color: #e74d3c;
    }
    </style>
</head>
<body>
<div class="navbar">
    <div class="nav-links">
        <a href="dashboard.php">Home</a>
        <a href="studentDetails.php">Students Details</a>
        <a class="logout" href="logout.php">Logout</a>
    </div> 
</div>
<h2>Students Details</h2>
</body>
</html>
<?php


Student::display(); 


?>