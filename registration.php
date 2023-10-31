<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $regno = $_POST["regno"];
  $email = $_POST["email"];
  $phoneno = $_POST["phoneno"];
  $cpassword = $_POST["cpassword"];
  $exists = false;
  if (($password == $cpassword) && $exists == false) {

    $sql = " INSERT INTO `registration` ( `username`, `regno`, `email`, `phoneno`, `password`) VALUES ('$username', '$regno', '$email', '$phoneno', '$password')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      $showAlert = true;
    }
    header("location: index.php");
  } else {
    $showError = "Passwords do not match";
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Placement Cell | PIET jaipur</title>
  <meta content="Homepage" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <meta content="Webflow" name="generator">


  <link rel="stylesheet" href="modal.css" type="text/css">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
  <script src="https://kit.fontawesome.com/432533cf1e.js" crossorigin="anonymous"></script>
  <script
    type="text/javascript">WebFont.load({ google: { families: ["Montserrat:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic", "Inconsolata:400,700", "Merriweather:300,300italic,400,400italic,700,700italic,900,900italic", "Gothic A1:100,200,300,regular,500,600,700,800,900"] } });</script>
  <script
    type="text/javascript">!function (o, c) { var n = c.documentElement, t = " w-mod-"; n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch") }(window, document);</script>
  <link href="https://image3.mouthshut.com/images/imagesp/925717709s.jpg" rel="shortcut icon" type="image/x-icon">
  <link href="images/iiitg_logo.svg" rel="apple-touch-icon">
</head>

<body>
  <div class="contact-form">
    <img alt="" class="avatar" src="https://i.postimg.cc/zDyt7KCv/a1.jpg">
    <h2>Registration Form</h2>
    <form action="registration.php" method="post">
      <p>Name</p><input placeholder="Enter Your Name" id="username" type="password" name="username">
      <p>Registration No.</p><input placeholder="i.e. PIET21CS021 " id="regno" type="password" name="regno">
      <p>Email</p><input placeholder="Enter Email" id="email" type="password" name="email">
      <p>Phone No.</p><input placeholder="Enter your Phone no." id="phoneno" type="password" name="phoneno">
      <p>Passwrod</p><input placeholder="Enter Password" id="password" type="password" name="password">
      <p>Confirm Passwrod</p><input placeholder="Confirm Password" id="cpassword" type="password" name="cpassword">
      <input type="submit" value="Sign in">

      <p><input type="checkbox">Remember Me</p>
    </form>
  </div>
</body>

</html>