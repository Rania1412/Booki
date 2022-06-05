<?php 
require "../connect.php";
session_start();

include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['username'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        if ($user_name=='admin' && $password === 'admin'){
          $_SESSION['user_id'] = $user_data['id'];
            header("Location: ../dash/index.php");
            die;
        }
        //read from database
        $query = "select * from users where username = '$user_name' limit 1";
        $result = mysqli_query($connect,$query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password'] === $password)
                {

                    $_SESSION['user_id'] = $user_data['id'];
                    header("Location: ../home/index.php");
                    die;
                }
            }
        }
        
        echo "wrong username or password!";
    }else
    {
        echo "wrong username or password!";
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
    <title>Login</title>
  </head>
  <body>
    <div class="align">
      <div class="card">
        <div class="head">
          <div></div>
          <a id="login" class="selected" href="login.php">Login</a>
          <a id="register" href="signup.php">Register</a>
          <div></div>
        </div>
        <div class="tabs">
          <form action="login.php" method="POST">
            <div class="inputs">
              <div class="input">
                <input placeholder="Username" type="text" name="username"/>
                <img src="img/user.svg" />
              </div>
              <div class="input">
                <input placeholder="Password" type="password" name="password"/>
                <img src="img/pass.svg" />
              </div>
            </div>
            <button>Login</button>
          </form>
          
        </div>
      </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
  </body>
</html>
