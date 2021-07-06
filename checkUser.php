<?php
session_start();

$link=mysqli_connect("localhost","root","1234",'userProj');
if(mysqli_connect_errno()){
  echo"Failed to connect!". mysqli_connect_errno();
}
mysqli_select_db($link,'userProj');

$username = $_POST["uname"];
$password = $_POST['psw'];

$result =mysqli_query($link,"SELECT * FROM usertableProj WHERE  
                      name = '$username'AND password = '$password'");

$num = mysqli_num_rows($result);

if($num==1){
$_SESSION['uname']=$username;
$_SESSION['score']=$score;
header('location:welcomepage.php');
}
else{
  header('location:tryagain.php'); 
}
?>