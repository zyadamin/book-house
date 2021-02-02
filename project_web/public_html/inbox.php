<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Student</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>           
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
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}

#tr{

    transform: translate(0%,100%);
}


.badge {
  position: absolute;
  top: 2px;
  right: 380px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
  position:fixed;
}

</style>
        </head>
    <body>
    
    <?php   

session_start();
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
               <li><a   href="about_us.php">about us</a></li>
               <li><a  href="http://localhost/project_web/public_html/profile.php"><i class="fa fa-fw fa-user"></i> profile</a></li>
               <li> <a style="background-color: #009900;" href="inbox.php"><i class="fa fa-inbox"></i> inbox</a> </li>
              <li id="out" ><a href="logout.php" ><i class="fa fa-power-off"></i> logout</a></li>
          </div>
  
             </ul>
  
  

<?php


DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'book_house');

$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);


$currentMAil = $_SESSION['email'];

  $sqlinsert = "select day(date),n_days from borrow where borrow.user_email='$currentMAil' ";
  if (!mysqli_query($dbcon, $sqlinsert)) {
    die('error get day');
    } //end of nested if
    $result=mysqli_query($dbcon, $sqlinsert);
    $row = mysqli_fetch_row($result);


       $mydate=getdate(date("U"));
    $day=$mydate['mday'];

if($day==$row[0]+$row[1]){

echo "
<div  id=\"tr\" >
<br><br>
<div class=\"alert\">
<span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
<strong>you are late you must return the book</strong> 
</div>
</div>";
echo"<span class=\"badge\">1</span>";
}

?>

  
</body>
</html>