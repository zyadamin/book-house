<?php

session_start();
?>
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

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 175px;
  margin: auto;
  text-align: center;
  font-family: arial;
  margin-top:120px;
}

.outher {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #262626;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
  
}

/* Remove extra left and right margins, due to padding in columns */
.row {margin: 0 60px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}


/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }

}* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

form.example input[type=text] {
  font-size: 17px;
  border: 1px solid grey;
  background: #f1f1f1;
  border-radius: 6px;
  width: 300px;
  height: 40px;
}

form.example button {

 width:80px;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
  background-color:#262626;
  border-radius: 6px;
 padding: 9px;
}

.example{
transform: translate(243%,200%);
position:fixed;
}

.btn {
border: none;
outline: none;
background-color: #262626;
transform: translate(284%,430%);
width:350px;
height:45px;
color: white;
}

#myBtnContainer{
  position:fixed;

}

/* Add a light grey background on mouse-over */
.btn:hover {
  background-color:#009900 ;
}

/* Add a dark background to the active button */
.btn.active {
  background-color: #009900;
  color: white;
}

.btn1 {
  border: none;
  outline: none;
background-color: #262626;
transform: translate(284%,900%);
width:350px;
height:45px;
color: white;
}

#my{
  position:fixed;

}

/* Add a light grey background on mouse-over */
.btn1:hover {
  background-color:#009900 ;
}

/* Add a dark background to the active button */
.btn1.active {
  background-color: #009900;
  color: white;
}

#extend{
font-size: 17px;
border: 1px solid grey;
background: #262626;
width:350px;
height:45px;
color:white;
transform: translate(184%,998%);
position:fixed;
}


.badge {
  position: absolute;
  top: 2px;
  right: 370px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
  position:fixed;
}

#not{

  transform: translate(32%,400%);
  font-family: Arial, Helvetica, sans-serif;
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
           about.open("GET","profile.html",true);
           about.send();
        }      
        </script>

</head>
    <body >

      <?php

      DEFINE ('DB_USER', 'root');
      DEFINE ('DB_PSWD', '');
      DEFINE ('DB_HOST', 'localhost');
      DEFINE ('DB_NAME', 'book_house');
      
      $dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

$currentMAil = $_SESSION['email'];
// to popup notification
$sqlinsert = "select day(date),n_days from borrow where borrow.user_email='$currentMAil' ";
if (!mysqli_query($dbcon, $sqlinsert)) {
  die('error get day');
  } //end of nested if
  $result3=mysqli_query($dbcon, $sqlinsert);
  $row3 = mysqli_fetch_row($result3);


     $mydate=getdate(date("U"));
     $day=$mydate['mday'];
//search in page
      if(isset($_POST['search'])){

        $search=$_POST['word'];
        $sqlinsert = "select *  from book where book.name='$search' ";
        if (!mysqli_query($dbcon, $sqlinsert)) {
          die('error inserting new record');
          } //end of nested if
          $result=mysqli_query($dbcon, $sqlinsert);

      }

      else if(isset($_POST['Arabic'])){
          $sqlinsert = "select *  from book where book.Language='Arabic' ";
          if (!mysqli_query($dbcon, $sqlinsert)) {
            die('error inserting new record');
            } //end of nested if

            $result=mysqli_query($dbcon, $sqlinsert);
          }

         else if(isset($_POST['English'])){
            $sqlinsert = "select *  from book where book.Language='English' ";
            if (!mysqli_query($dbcon, $sqlinsert)) {
              die('error inserting new record');
              } //end of nested if
  
              $result=mysqli_query($dbcon, $sqlinsert);
            }
            else if(isset($_POST['Kids'])){
              $sqlinsert = "select *  from book where book.Category='Kids' ";
              if (!mysqli_query($dbcon, $sqlinsert)) {
                die('error inserting new record');
                } //end of nested if
    
                $result=mysqli_query($dbcon, $sqlinsert);
              }

        else{


          $sqlinsert = "select *  from book ";
      
          if (!mysqli_query($dbcon, $sqlinsert)) {
              die('error inserting new record');
              } //end of nested if
  
              $result=mysqli_query($dbcon, $sqlinsert);

        }

        ?>
       
                <ul id ="navbar">
          <div id="ul">
             <li id ="nitro"><img src="logo3.jpg" style="width:120px ;height:105px; " ></li>
             <li>  <a style="background-color: #009900;" href="home_page.php"><i class="fa fa-home"></i> home</a> </li>
             <li><a  href="about_us.php">about us</a></li>
             <li><a  href="http://localhost/project_web/public_html/profile.php"><i class="fa fa-fw fa-user"></i> profile</a></li>
             <li> <a  href="inbox.php"><i class="fa fa-inbox"></i> inbox</a> </li>
            <li id="out" ><a href="logout.php" ><i class="fa fa-power-off"></i> logout</a></li>
        </div>

           </ul>
<?php
if($day==$row3[0]+$row3[1]){
      echo"<span class=\"badge\">1</span>";
}
?>


<form   class="example" action="home_page.php" method="post">
  <input type="text" placeholder="Search.." name="word">
  <button type="submit" name="search"><i class="fa fa-search"></i></button>
</form>


<div id="myBtnContainer">
  <form   action="home_page.php" method="post">
  <button class="btn active" > Show all</button>
  <br>
  <button class="btn" name="Arabic" >Arabic</button>
  <br>
  <button class="btn" name="English">English</button>
  <br>
  <button class="btn" name="Kids"  >Kids</button>
</form>
</div>
<?php

$currentMAil = $_SESSION['email'];
$sqlinsert = "select *  from borrow where borrow.user_email='$currentMAil' ";

if (!mysqli_query($dbcon, $sqlinsert)) {
  die('error search ');
  } //end of nested if
  $result1=mysqli_query($dbcon, $sqlinsert);
  $row1 = mysqli_fetch_row($result1);
if($row1[0]!=null){
  echo "
<div id=\"my\">
<button class=\"btn1 active\" >Book</button>
  <form   action=\"edit_borrow.php\" method=\"post\">
  <button class=\"btn1\" name=\"Return\">Return</button>
  <br>
  <button class=\"btn1\" name=\"Extend\"  >Extend</button>
  <input id=\"extend\" type=\"text\" placeholder=\"Extend..\" name=\"day\">
</form>
</div>";
}
?>


<form action="Borrow.php" method="post">";
<?php  

$num = mysqli_num_rows($result);
$x=null;
if($num>0){
while($num>0)   {
  if($num>3||$num==3){
    $x=3;
  }
  else{$x=$num;}
  echo  "  <div class=\"row\">";
  for($w=0;  $w<$x;  $w++){
  echo  "   <div class=\"column\" >";
  echo  "  <div class=\"card\">";
       $row = mysqli_fetch_row($result);
       echo  " <img style=\"width: 75%;  \" src=" .'"'.$row[0].'"' ." > "  ; 
       echo "<br>";
       echo  " <h2>".$row[1]."</h2> ";
       echo  "<p class= \"outher\">"."by: ".$row[2]."</p> ";
       echo" <button name=\"Borrow\" value=".$row[6]." type=\"submit\" >Borrow</button>";      
       echo" </div>";
       echo" </div> ";

}
echo" </div> "; 
$num-=$x;  
}
}

else{echo "<h1 id=\"not\"> Not Found  <i class=\"fa fa-search\"></i>  </h1> "; }


?>
</form>



  </body>
</html>
