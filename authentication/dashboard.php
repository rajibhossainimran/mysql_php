<?php 
 session_start();

 require_once("studentClass.php");

 if(!isset($_SESSION["sname"])){
	 header("location:login.php");
  }

//   error variable 
  $message = ""; 
$messageClass = "";

if(isset($_POST["btnSubmit"])){
	$id=$_POST["Id"];
	$name=$_POST["Name"];
	$email=$_POST["email"];
	$phone=$_POST["Phone"];
	
	if(!preg_match("/^[0-9+]{11,14}$/",$phone)){
		
		$message = "Phone is not valid.";
        $messageClass = "error";
		
	}elseif(!preg_match("/^[a-zA-Z0-9]{4,}[@][a-zA-Z]{4,6}[.][a-zA-Z]{2,3}$/",$email)){
		
		$message = "Email is not valid.";
        $messageClass = "error";
		
	}else{
		$student=new Student($id,$name,$email,$phone);
		$student->save();
		$message = "Form submit Successfully!";
        $messageClass = "success";
		
	}
	
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Form</title>
<style>
	body{
		background: linear-gradient(135deg, #6e8efb, #a777e3);
	}
    .main-container {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        color: #fff;
        margin: 0;
        display: flex;
		flex-direction:column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        padding: 20px;
    }
    a {
        color: #fff;
        text-decoration: none;
        font-weight: bold;
        margin-bottom: 20px;
        display: inline-block;
        transition: color 0.3s;
    }
    a:hover {
        color: #f39c12;
    }
    section {
        background: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 500px;
        color: #333;
    }
    section h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    section form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    section div {
        margin-bottom: 10px;
    }
    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }
    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }
    input[type="submit"] {
        background: #1e8449;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }
    input[type="submit"]:hover {
        background: #145a32;
    }
    .students-list {
        margin-top: 20px;
        padding: 15px;
        background: #f9f9f9;
        border-radius: 5px;
        color: #333;
        font-size: 14px;
    }
	/* .logout{
		display:block;
		text-align:end;
		color:black;
		font-weight:600;
		background-color:#c0392b;
		padding:15px;
		border-radius:50%;
		
	} */
	.cont-logout{
		display: flex;
        justify-content: end;
        align-items: end;
	}

	/* show error message  */
    .message {
        margin: 15px 0;
        padding: 10px;
        border-radius: 5px;
        font-size: 14px;
        text-align: center;
        font-weight: bold;
        width: 100%;
    }
    .error {
        background-color: #e74c3c;
        color: white;
    }
    .success {
        background-color: #2ecc71;
        color: white;
    }
    /* navber style  */
    .navbar{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .navbar a {
        color: #fff;
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
        background-color: #c0392b;
        padding: 10px 20px;
        
    }

    .navbar .logout:hover {
        background-color: #e74c3c;
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
<div class="main-container">
<section>
    <h2>Student Form</h2>
    <form action="" method="post">

        <div>
            <label for="tId">ID</label>
            <input type="text" name="Id" id="Id" />
        </div>
        <div>
            <label for="Name">Name</label>
            <input type="text" name="Name" id="Name" />
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" />
        </div>
        <div>
            <label for="Phone">Phone</label>
            <input type="text" name="Phone" id="Phone" />
        </div>
        <div>
            <input type="submit" name="btnSubmit" value="Submit" />
			
        </div>
		<?php if ($message): ?>
			<div class="message <?php echo $messageClass; ?>">
				<?php echo $message; ?>
			</div>
			<?php endif; ?>
    </form>
</section>
<!-- 
<section class="students-list">

</section> -->

</body>
</html>
