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

/* Float four columns side by side */
.column {
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


#input {
 
 border-radius: 6px;
 width: 370px;
 height: 30px;
}
#text{
   font-size: 25px;
   color:   #404040; 
font-family: Arial, Helvetica, sans-serif;
   
}

#submit {
background-color:#262626;
 border-radius: 6px;
color:  #ffffff;
font-size: 20px;
padding:10px 120px;
}   

#move{

    transform: translate(40%,-170%);

}

#invalid{
    transform: translate(0%,-300%);
  
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

        </style>
    
    </head>
    <body>
 
    <?php

      DEFINE ('DB_USER', 'root');
      DEFINE ('DB_PSWD', '');
      DEFINE ('DB_HOST', 'localhost');
      DEFINE ('DB_NAME', 'book_house');
      
      $dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);
      
        session_start();
        $currentMAil=$_SESSION['email'];
        
      if(isset($_POST['Borrow'])){

       $_SESSION['id']=$_POST['Borrow'];

      }

      $book_id=$_SESSION['id'];
        // to check user borrow or not
        $sqlinsert = "select *  from Borrow where Borrow.user_email='$currentMAil' ";
        if (!mysqli_query($dbcon, $sqlinsert)) {
          die('error select from borrow');
          } //end of nested if
          $result1=mysqli_query($dbcon, $sqlinsert);
          $row1 = mysqli_fetch_row($result1);

          //check number of copies
          $sqlinsert = "select no_copies  from Book where book.id='$book_id' ";
          if (!mysqli_query($dbcon, $sqlinsert)) {
            die('error select no_copies ');
            } //end of nested if
            $result2=mysqli_query($dbcon, $sqlinsert);
            $row2 = mysqli_fetch_row($result2);

            // to print the book in page
            $sqlinsert = "select * from book where book.id='$book_id' ";
            if (!mysqli_query($dbcon, $sqlinsert)) {
             die('error seclect book id');
             } //end of nested if
             $result=mysqli_query($dbcon, $sqlinsert);
             $erorr=null;

          if($row1[0]!=null){
          
        $erorr="You have already borrow book";        
        
        }

        if($row2[0]==0){
          
            $erorr="book unavailable";        
            
            }


        if($row1[0]==null&&$row2[0]>0 &&isset($_POST['submit'])){

          //update number of copies
            $sqlinsert = "UPDATE book SET book.no_copies=book.no_copies-'1' where book.id='$book_id' ";
            if (!mysqli_query($dbcon, $sqlinsert)) {
             die('error inserting new record');
             } //end of nested if

            // insert in database
             $n_days=$_POST['n_days'];
             $sqlinsert = "insert into Borrow(book_id,user_email,n_days) values('$book_id','$currentMAil',' $n_days') ";
             if (!mysqli_query($dbcon, $sqlinsert)) {
              die('error inserting new record');
              } //end of nested if
 
       $erorr="Done";
        }  


        mysqli_close($dbcon);

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
             <li>  <a  style="background-color: #009900;" href=<?php echo $curr ?> ><i class="fa fa-home"></i> home</a> </li>
             <li><a  href="about_us.php">about us</a></li>
             <li><a   href="profile.php"><i class="fa fa-fw fa-user"></i> profile</a></li>
             <li> <a  href="inbox.php"><i class="fa fa-inbox"></i> inbox</a> </li>
            <li id="out" ><a href="logout.php" ><i class="fa fa-power-off"></i> logout</a></li>
        </div>

           </ul>
        
        
           <?php  
             echo  "  <div class=\"row\">";            
             echo  "   <div class=\"column\" >";
             echo  "  <div class=\"card\">";
             $row = mysqli_fetch_row($result);
              echo  " <img style=\"width: 75%;  \" src=" .'"'.$row[0].'"' ." > "  ; 
              echo "<br>";
             echo  " <h2>".$row[1]."</h2> ";
                  echo  "<p class= \"outher\">"."by: ".$row[2]."</p> ";     
                  echo" </div>";
                  echo" </div> ";
           echo" </div> ";

           ?>

         <div id="move">
         <form action="Borrow.php" method="post">
         <label id="text"  >how many days do you want to borrow the book?</label>
           <br>
           <br>
           <input id="input" name="n_days" type="text">

           <br><br><br>
            <button id="submit" name="submit"   type="submit">Borrow</button>
</form>
</div>           
        
           <?php   
if($erorr!=null){



  echo "
<div  id=\"invalid\" >
<div class=\"alert\">
<span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
<strong>$erorr</strong> 
</div>
</div>";
}

            ?> 
    </body>
</html>
