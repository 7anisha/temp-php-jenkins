<?php
// $showAlert = false;
// $showError = false;
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     // include 'dbconnect.php';
//     $connect = mysqli_connect(
//       'db', # service name
//       'php_docker', # username
//       'password', # password
//       'php_docker' # db table
//   );
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     include 'dbconnect.php';
//     $username = $_POST["username"];
//     $password = $_POST["password"];
//     $cpassword = $_POST["cpassword"];
//     $exists=false;
//     if(($password == $cpassword) && $exists==false){
//         $sql = "INSERT INTO `demo` ( `username`, `password`, `cpassword`) VALUES ('$username', '$password', '$cpassword')";
//         $result = mysqli_query($conn, $sql);
//         if ($result){
//             $showAlert = true;
//         }
//         // header("location: login.php");
//     }
//     else{
//         $showError = "Passwords do not match";
//     }
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'dbconnect.php';
  $db = new dbconnect();
  $conn = $db->connect();

  $username = $_POST['username'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  if ($password === $cpassword) {
      $stmt = $conn->prepare("INSERT INTO demo (username, password, cpassword) VALUES (?, ?, ?)");
      $stmt->execute([$username, $password, $cpassword]);

      echo "Data inserted successfully.";
  } else {
      echo "Passwords do not match.";
  }
}

?>

<!doctype html>
<html>
<head>
  <title>signin page </title>
  <meta content="Homepage" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">


  <link rel="stylesheet" href="signup.css" type="text/css">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



</head>
<body>

<?php
    if($showAlert){
    echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account is now created and you can
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error!</strong>'. $showError.'
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> ';
    }
    ?>





<div class="loginBox"> <img class="user" src="https://i.ibb.co/yVGxFPR/2.png" height="100px" width="100px">
        <h3>Sign in here</h3>
        <form action="index.php" method="post">
            <div class="inputBox">
             <input id="username" type="text" name="username" placeholder="Username"> 
             <input id="password" type="password" name="password" placeholder="Password"> 
             <input id="ccpassword" type="password" name="cpassword" placeholder="Confirm Password">
             <a href="login.php" ><input type="submit" name="" value="signup"></a>
            </div>
        </form> 
        <!-- <a href="#">Forget Password<br> </a> -->
        <!-- <div class="text-center">
           <a href="#"> <p style="color: #59238F;">Sign-Up</p>
        </div> -->
        
    </div>
</body>
</html>
