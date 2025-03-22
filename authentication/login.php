<?php session_start();
  
  if(isset($_POST["btnLogin"])){
	  
	  $username=$_POST["username"];
	  $password=$_POST["password"];
	  
	  $file=file("storedPassword.txt");
	  
	  foreach($file as $line){
		  
		  list($check_username,$check_password)=explode(",",$line);
		  
		  if(trim($check_username)==$username && trim($check_password)==$password){
			  
			
			 $_SESSION["sname"]=$username;
			
			 header("location:dashboard.php");
			  
		  }else{
			  
			  $msg="Username or Password is incorrect!";
		  }
		  
	  }
	  
  }

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #6e8efb, #a777e3);
        color: #fff;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    section {
        background: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
        color: #333;
    }
    section form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    section div {
        margin-bottom: 15px;
    }
    input[type="text"], input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }
    input[type="submit"] {
        background: #6e8efb;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }
    input[type="submit"]:hover {
        background: #5a7de0;
    }
    h2 {
        margin: 0 0 20px 0;
        text-align: center;
    }
    .msg {
        text-align: center;
        color: #e74c3c;
        font-size: 14px;
    }
</style>
</head>
<body>
    <?php echo isset($msg) ? "<p class='msg'>$msg</p>" : ""; ?>
    <section>
        <h2>Login</h2>
        <form action="#" method="post">
            <div>
                <label for="username">Username</label><br />
                <input type="text" name="username" id="username" required placeholder="rajib" />
            </div>
            <div>
                <label for="password">Password</label><br />
                <input type="password" name="password" id="password" required  placeholder="123"/>
            </div>
            <div>
                <input type="submit" value="Log In" name="btnLogin" />
            </div>
        </form>
    </section>
</body>
</html>
