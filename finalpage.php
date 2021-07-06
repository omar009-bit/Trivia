<html>
    <head>
        <title>Congratulations!</title>
        <link rel = "stylesheet" type="text/css" href="css/finalpage.css">
    </head>
<body>
<?php
session_start();

$link=mysqli_connect("localhost","root","1234","userProj");

if(mysqli_connect_errno()){
    echo"Failed to connect!". mysqli_connect_errno();
}
mysqli_select_db($link,'userProj');
$username  = $_SESSION['uname'];
$score = $_SESSION["score"];
$info=mysqli_query($link,"SELECT score from usertableProj WHERE name='$username'");

while($record=mysqli_fetch_array($info)){  
    $rs=$record['score'];  
    echo "<div style ='position:center;margin-top:100px;font:60px Arial,tahoma,
    sans-serif;color:rgb(0, 0, 0);'>Your Score is: $rs / 5</div>";  
}
?>
<button onclick= "window.location.href= 'topGoalScorers.php' ">Play Again</button>
<button onclick= "window.location.href= 'logout.php' ">Logout</button>
                 
</body>
</html>

