<html>
    <head>
        <title>Welcome to TopGoalScorers!</title>
        <link rel = "stylesheet" type="text/css" href="css/accountMngt.css">
    </head>
<body>
<h1>Account LogIn</h1> 
    <form action="checkUser.php" method="POST"> 
        <div class="imgcontainer"> 
          <img src= "Images/Loginicon.jpg" alt="Icon here" class="icon"width="180" height="170"> 
        </div> 
  
        <div class="container"> 
            <label style='font-size:40px;'><b>Username</b></label> 
            <input type="username" placeholder="Enter Username" name="uname" required> 
  
            <label style='font-size:40px;'><b>Password</b></label> 
            <input type="password" placeholder="Enter Password" name="psw" required> 
        </div> 
  
        <div class="container1" style="background-color:#f1f1f1"> 
          <button type="submit" class="loginbtn">Login</button> 
          <span class="psw">Don't have an account? <a href="register.php">Create an account.</a></span> 
        </div> 
    </form> 
  
</body> 
</html>