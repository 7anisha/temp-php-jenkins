

<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    $sql = "Select * from users where username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1){
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: index.php");

    } 
    else{
        $showError = "Invalid Credentials";
    }
}
    
?>


<!doctype html>
<html>
<head>
  <title>login page </title>
  <meta content="Homepage" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">


  <link rel="stylesheet" href="login.css" type="text/css">
 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



  
  <!-- <link href="images/iiitg_logo.svg" rel="apple-touch-icon"> -->
</head>
<body>


<div class="loginBox">
<div  class="text-center " style="color:white; margin-left:44px">
<?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You are logged in
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div> ';
    }
    if($showError){
    echo '     <div class="alert alert-danger alert-dismissible fade " role="alert">
    <strong>       Error!</strong> '. $showError.'   <strong>   !</strong> 
</div> ';
    }
    ?>
</div>
<br>
   <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        
<h3>Login here</h3>
        
        <form action="login.php" method="post">
            <div class="inputBox"> <input id="username" type="text" name="username" placeholder="Username"> 
            <input id="password" type="password" name="password" placeholder="Password"> </div> <input type="submit" name="" value="Login">
        
        <a href="#">Don't have an account?<br> </a>
        <div class="text-center">
        <a href="signup.php"> <p style="color: #59238F;">Sign-Up</p></a>
        </div>
</form>

</div>
</body>
</html>
