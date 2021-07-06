<?php
session_start();

$link=mysqli_connect("localhost","root","1234","userProj");

if(mysqli_connect_errno()){
    echo"Failed to connect!". mysqli_connect_errno();
}
    $username = $_POST["uname"];
    $password = $_POST['psw'];

    $result = mysqli_query($link, "SELECT * FROM usertableProj WHERE name= '$username' ");
    $row = mysqli_num_rows($result);

if ($row == 1) {
    header('location:tryagain2.php');
}
else{
  $register="INSERT INTO usertableProj(name,password) VALUES ('$username','$password') ";
  mysqli_query($link,$register);
  header('location:welcomenewUser.php');
 }

?>
