<?php
session_start(); 
?>

<html>
<head>
    <title>Welcome to TopGoalScorers!</title>
    <link rel = "stylesheet" type="text/css" href="css/welcome.css">
</head>

    <body>
        <img src="Images/success.gif" class="animated" width="150" height="150"><br>
        <h0>Login Success!</h0><br>
        <h style='font-size:40px;'>Welcome <?php echo($_SESSION['uname']);?></h>
        <br>
        <h style='font-size:40px;'>What do you want to do?</h> 
        <br>
        <br>
        <a href="topGoalScorers.php">
        <button>Play</button>
        </a>
        <a href="logout.php">
        <button>LogOut</button>
        </a>
    </body>

</html>