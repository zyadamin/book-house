
    <?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'book_house');

$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
$erorr=null;
if(isset($_POST['submit'])){      
        $username=$_POST['username'];
        $password=$_POST['password'];
  
    $sqlinsert = "select Email ,state from users where  users.user_name ='$username' and  users.PASSWORD='$password' ";

    if (!mysqli_query($dbcon, $sqlinsert)) {
        die('error login');
        } //end of nested if

        $result=mysqli_query($dbcon, $sqlinsert);
        
  
        if(mysqli_num_rows($result)==0){
            $erorr="invalid username or password";
        }
else{
    $row = mysqli_fetch_row($result);
    $email=$row[0];
    $state=$row[1];

    if(isset($_POST['checkbox'])){
    $value="$email::$state";
    setcookie("MyCookie",$value, time()+86400);
    }     
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['gender'] = $state;

        if($state=="Student"){
       header("Location: home_page.php?login=success");
        }

        else{
            header("Location: home_admin.php?login=success");
        }
}
 // end of the main if statement

 mysqli_close($dbcon);

}
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
#input {
 
  border-radius: 6px;
  padding:8px 25px;
 
}
#submit {
 background-color:#262626;
  border-radius: 6px;
 color:  #ffffff;
font-size: 20px;
 padding:5px 40px;

}
#text{
 color: #262626;


}
</style>
    </head>
<?php

if(isset($_COOKIE["MyCookie"])){

    $strReadCookie = $_COOKIE["MyCookie"];
    $arrListOfStrings = explode ("::", $strReadCookie);
    
    session_start();
    $_SESSION['email'] = $arrListOfStrings[0];
    $_SESSION['gender'] = $arrListOfStrings[1];

    if($arrListOfStrings[1]=="Student"){
   header("Location: home_page.php?login=success");
    }

    else{
        header("Location: home_admin.php?login=success");
    }
}

?>

    <body style= "background-color:#ffffff;">

    

        <div style="text-align: center;">
            <form  action="index.php" method="POST" >
                <br><br>
                <img src="logo3.jpg"><br>
              <input id="input" type="name" placeholder="username" name="username" > 
<br>
<br>
<input id="input" type="password" placeholder="password"  name=" password">
<br><br>
<input style="margin-left:-100px" name="checkbox" type="checkbox">
<label id="text">Remember Me</label>
<br>
<?php   
if($erorr!=null){
echo "<p>$erorr</p>";
}
?>
<br><br>


        <div id="x"> </div>
                <button id="submit" name="submit"  type="submit">log in</button>
                <button id="submit" formaction="singup.html"  type="submit">sign up</button>
            <form>    
        </div>


    </body>
</html>
