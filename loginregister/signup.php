<?php 
session_start();

	include("../connect.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['username'];
		$password = $_POST['password'];
    $email=$_POST['email'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (id,username,email,password) values ('$user_id','$user_name','$email','$password')";

			mysqli_query($connect, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>

<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,500,700"
      rel="stylesheet"
    />
    <link rel="stylesheet" type="text/css" href="style.css" />
    <title>Register</title>
  </head>
  <body>
    <div class="align">
      <div class="card">
        <div class="head">
          <div></div>
          <a id="login" href="login.php">Login</a>
          <a id="register" class="selected" href="signup.php">Register</a>
          <div></div>
        </div>
        <div class="tabs">
		  <form  method="POST">
            <div class="inputs">
              <div class="input">
                <input placeholder="Email" type="text" name="email" />
                <img src="img/mail.svg" />
              </div>
              <div class="input">
                <input placeholder="Username" type="text" name="username"/>
                <img src="img/user.svg" />
              </div>
              <div class="input">
                <input placeholder="Password" type="password" name="password"/>
                <img src="img/pass.svg" />
              </div>
            </div>
            <button>Register</button>
          </form>
          
        </div>
      </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
  </body>
</html>

