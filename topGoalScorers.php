 <html>
       <head>
             <link rel = "stylesheet" type="text/css" href="css/style.css">
       </head>
     <body><br>
           <div>
                 <form action="" method="get" name = "myform"><br>
                       <p class="s">1.Which of these stadiums was in the World Cup 2018 ?</p>
                 <input type="radio" name="skill[]" value="percival"/><p class="a">Percival Molson Stadium</p>
                 <input type="radio" name="skill[]" value="boom"/><p class="a">BSFZ-Arena<p>
                 <input type="radio" name="skill[]" value="Kazan Arena"/><p class="a">kazan-Arena</p>
                 <input type="radio" name="skill[]" value="bb"/><p class="a">Merkur-Arena</p>
                 <p class = "s">2.Which of these players has more goals in the World Cup 2018 ?</p>
                 <input type="radio" name="aa[]" value="neymar"/><p class="a">Neymar<p>
                 <input type="radio" name="aa[]" value="Romelu Lukaku"/><p class="a">Romelu Lukaku<p>
                 <input type="radio" name="aa[]" value="Luis Suarez"/><p class="a">Luis Suarez<p>
                 <input type="radio" name="aa[]" value="hehe"/><p class="a">Cristiano Ronaldo<p>
                 <br><br>
                 <p class = "s">3.Which of these coaches was the coach of Colombia in the World Cup 2018 ?</p>
                 <input type="radio" name="kk[]" value="Roberto Martínez"/><p class="a">Roberto Martínez<p>
                 <input type="radio" name="kk[]" value="msh howa la"/><p class="a">Carlos Queiroz<p>
                 <input type="radio" name="kk[]" value="bardo la"/><p class="a">Aliou Cisse<p>
                 <input type="radio" name="kk[]" value="ssssiiiiiiiiii"/><p class="a">Fernando Santos<p>
                       <br><br>
                  <p class = "s">4.What was the role of "Fedor Smolov" in the World Cup 2018 ?</p>
                 <input type="radio" name="huh[]" value="nope"/><p class="a">GoalKeeper<p>
                 <input type="radio" name="huh[]" value="nah"/><p class="a">Defender<p>
                 <input type="radio" name="huh[]" value="noooooo"/><p class="a">Midfielder<p>
                 <input type="radio" name="huh[]" value="Forwarder"/><p class="a">Forwarder<p>
                       <br><br>
                       <p class = "s">5.Who won the World Cup 2018 ?</p>
                 <input type="radio" name="sahl[]" value="France"/><p class="a">France<p>
                 <input type="radio" name="sahl[]" value="yareeet :D"/><p class="a">Egypt<p>
                 <input type="radio" name="sahl[]" value="enta bet2ool eh"/><p class="a">Saudi Arabia<p>
                 <input type="radio" name="sahl[]" value="?????!!"/><p class="a">Croatia<p>
                       <br><br>
                <button class="button button" type="submit" name="submit" value="submit">Submit</button>
                 </form>
</div>
<?php
session_start();

$link=mysqli_connect("localhost","root","1234","userProj");

if(mysqli_connect_errno()){
    echo"Failed to connect!". mysqli_connect_errno();
}
mysqli_select_db($link,'userProj');
$username  = $_SESSION['uname'];
$savescore=mysqli_query($link,"UPDATE usertableProj SET score = '0' WHERE  name = '$username'");

$client = new SoapClient ("https://footballpool.dataaccess.eu/info.wso?wsdl");
$result = $client -> TopScorersList(array('' => 'A'));
$result1 = $client -> AllStadiumInfo(array('' => 'B'));
$result2 = $client -> AllTeamCoachNames(array('' => 'C'));
$result3 = $client -> Countries(array('sCountryName' => 'C'));
$result4 = $client -> PlayerRoles(array('' => 'C'));

$array = $result ->TopScorersListResult->tTopScorerTop5;
$array1 = $result1 ->AllStadiumInfoResult->tStadiumInfo;
$array2 = $result2 ->AllTeamCoachNamesResult->tTeamCoachName;
$array3 = $result3 ->CountriesResult->tCountry;
$array4 = $result4 ->PlayerRolesResult->tPlayerRole;

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
$s = 0;
if(isset($_GET['submit'])){
      if(isset($_GET['skill'])){
      $country = $_GET['skill'];
      foreach($country as $key=>$value){
      foreach($array1 as $k=>$v){     
        if(strcmp($value,$v->sName)===0){
          $s = $s+1;
          $saveScore=mysqli_query($link,"UPDATE usertableProj SET score='$s' WHERE  name = '$username'");
         }
       }
     }
   } 
}
if(isset($_GET['submit'])){
      if(isset($_GET['aa'])){
      $count = $_GET['aa'];
      foreach($count as $key=>$value){
      foreach($array as $k=>$v){     
            if(strcmp($value,$v->sName)===0){
              $s = $s+1;
              $saveScore=mysqli_query($link,"UPDATE usertableProj SET score='$s' WHERE  name = '$username'"); 
         }
       }    
     }   
   }
}
if(isset($_GET['submit'])){
      if(isset($_GET['kk'])){
      $counts = $_GET['kk'];
      foreach($counts as $key=>$value){
      foreach($array2 as $k=>$v){     
            if(strcmp($value,$v->sCoachName)===0){
            $s = $s+1;
            $saveScore=mysqli_query($link,"UPDATE usertableProj SET score='$s' WHERE  name = '$username'");
        }
      }    
    }   
  }
}
if(isset($_GET['submit'])){
      if(isset($_GET['huh'])){
      $player = $_GET['huh'];
      foreach($player as $key=>$value){
      foreach($array4 as $k=>$v){      
            if(strcmp($value,$v->sDescription)===0){
              $s = $s+1;
              $saveScore=mysqli_query($link,"UPDATE usertableProj SET score='$s' WHERE  name = '$username'");          
        }
      }    
    }   
  } 
}
if(isset($_GET['submit'])){
      if(isset($_GET['sahl'])){
      $keseb = $_GET['sahl'];
      foreach($keseb as $key=>$value){
      foreach($array3 as $k=>$v){     
            if(strcmp($value,$v->sName)===0){
              $s = $s+1;
              $saveScore=mysqli_query($link,"UPDATE usertableProj SET score='$s' WHERE  name = '$username'");
        }
      }    
    }   
  }
}
if(isset($_GET['submit'])){
      header('location:finalpage.php');
}
?>
</body>   
</html>
            
          