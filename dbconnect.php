<!-- 
$server = "localhost";
$username = "user";
$password = "password";
$database = "d";

// Create a connection
$conn = mysqli_connect($server, $username, $password,$database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
} -->


<?php
class dbconnect{
// private $host = '192.168.56.1'; // This is the hostname of the MySQL container (as defined in docker-compose.yml)
private $host = '10.101.63.172'; // cluster ip of mysql-pod
private $dbname = 'sqldb'; // Replace with your actual database name
private $user = 'root'; // MySQL root user
private $pass = 'password'; // Replace with your MySQL root password

public function connect(){
try {
    $conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
}
}

