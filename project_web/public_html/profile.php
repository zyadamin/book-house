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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>   
     #submit2 {
 background-color:#262626;
  border-radius: 6px;
 color:  #ffffff;
font-size: 20px;
 padding:10px 90px;
   margin-left:-1000px;
}
        
  ul {
  list-style-type: none;
position: fixed; 
  padding: 0;
  overflow: hidden; 
top: 0;

}

li {
  float:left;

}

li a {
  display: inline-block;
  color: white;
  margin-top: 15px;
 list-style-type: none;
  padding:20px  ;
  text-decoration: none;
   font-family: Arial, Helvetica, sans-serif;
font-size: 22px;

   
}
#nitro{
    
  margin-right:350px;
   margin-top: 0px;
}
#navbar {
 border-bottom: 1px solid gray;
width: 100%;
height: 85px;
line-height: 20px;
background-color: #262626;
margin-top: -8px;
 float: left; 
}

li a:hover {
  background-color: #009900;

}
#out{
    float: right; 
 margin-right: 10px;
}
      .avatar {
  vertical-align: middle;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  margin-left: -1000px;
}  
#info{
  
    
   margin-left: 400px;
    margin-top: -300px;
    font-size: 30px;
    padding: 40px ;
    font-family: Arial, Helvetica, sans-serif;
    width: 600px;
    height: 350px;
    text-align: left;
    border: 2px solid grey;
    border-radius: 10px;
} 
#submit{
 background-color:#262626;
 border-radius: 6px;
 color:  #ffffff;
font-size: 20px;
 padding:10px 60px;
}
        </style>
    
         
    <script>
        function getAbout(){ 
        var about=XMLHttpRequest=new XMLHttpRequest();
        about.onreadystatechange = function() {   
        if(this.readyState ===4&& this.status===200){
         document.getElementById("x").innerHTML=this.responseText;
        }
        };
           about.open("GET","EditeProfile.php",true);
           about.send();
        }      
        </script>
    </head>
    <body>
        
      
      <?php

      DEFINE ('DB_USER', 'root');
      DEFINE ('DB_PSWD', '');
      DEFINE ('DB_HOST', 'localhost');
      DEFINE ('DB_NAME', 'book_house');
      
      $dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
          
         session_start();
          $currentMAil = $_SESSION['email'];
             
          $sqlinsert = "select *  from users where users.Email = '$currentMAil' ";
      
          if (!mysqli_query($dbcon, $sqlinsert)) {
              die('error inserting new record');
              } //end of nested if

              $result=mysqli_query($dbcon, $sqlinsert);

                  $row = mysqli_fetch_row($result);
                   $name=$row[0]; 
                   $username=$row[1]; 
                   $email=$row[2]; 
                   $state=$row[4]; 
                  $image=' " ' .$row[5]. '"' ; 
        ?>

<?php   

$state=$_SESSION['gender'] ;

if($state=="Student"){
$curr= "\" home_page.php\" ";
}

else{
  $curr= "\" home_admin.php \"";
}
     ?>
           <ul id ="navbar">
          <div id="ul">
             <li id ="nitro"><img src="logo3.jpg" style="width:120px ;height:105px; " ></li>
             <li>  <a href=<?php echo $curr ?> ><i class="fa fa-home"></i> home</a> </li>
             <li><a  href="about_us.php">about us</a></li>
       <li><a style="background-color: #009900;"  href="profile.php"><i class="fa fa-fw fa-user"></i> profile</a></li>
       <?php  
      if($state=="Student"){
       echo"  <li> <a  href=\"inbox.php\"><i class=\"fa fa-inbox\"></i> inbox</a> </li>";
       }
        ?>
             <li id="out" ><a href="logout.php" ><i class="fa fa-power-off"></i> logout</a></li>
        </div>

           </ul>
        
         <div style="text-align: center; margin-top: 100px;  ">
     

<img src= <?php echo $image ?>   alt="Avatar" class="avatar">            
<h1 style=" margin-left: -1000px;  font-family: Arial, Helvetica, sans-serif; " > <?php echo $name ?>  </h1>
<br>
 <button  onclick="getAbout()" id="submit2" type="submit">Edite account</button>
 <div id="x" >

<div id="info">

<p > username: <?php echo $username  ?></p>
<p>Email: <?php echo $email ?></p>
<p>state: <?php echo $state ?> </p>

<br>

<form action="edit_photo.php" method="post" enctype="multipart/form-data">
  <input type="file" name="fileToUpload"  id="submit">
  <br>
  <input type="submit" value="Upload Image" name="submit" id="submit" >
</form>

</div>      
 </div>
            
           
        </div>
        

    </body>
</html>
