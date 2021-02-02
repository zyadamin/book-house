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
   transform: translate(122%,250%);
   position:fixed;
}
#submit2:hover {
  background-color:#009900 ;
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
  
    margin-top:-55px; 
    
   margin-left: 400px;
    padding: 40px ;
    width: 600px;
    height: 500px;
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

#input {
 
 border-radius: 6px;
 width: 370px;
 height: 30px;
}

#text2{
font-size: 20px;
color:  #404040; 
font-family: Arial, Helvetica, sans-serif;
}

body {
 background-image: url("");
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
           about.open("GET","edit_book.php",true);
           about.send();
        }      
        </script>
    </head>
    <body>


           <ul id ="navbar">
          <div id="ul">
             <li id ="nitro"><img src="logo3.jpg" style="width:120px ;height:105px; " ></li>
             <li>  <a  style="background-color: #009900;" href="home_admin.php"><i class="fa fa-home"></i> home</a> </li>
             <li><a  href="about_us.php">about us</a></li>
             <li><a   href="profile.php"><i class="fa fa-fw fa-user"></i> profile</a></li>
            <li id="out" ><a href="logout.php" ><i class="fa fa-power-off"></i> logout</a></li>
        </div>

           </ul>
        
         <div style="text-align: center; margin-top: 100px;  ">
     


 <button  onclick="getAbout()" id="submit2" type="submit">Edit Book</button>
 <div id="x" >
   <br>
 <h1 style=" font-family: Arial, Helvetica, sans-serif; font-size:30px; ; margin-top:-30px;">Add New Book<h1>
     <br><br>
<div id="info">

<form action="add_book.php" method="post" enctype="multipart/form-data">

           <label id="text2"  style="margin-right: 30px">Book Name</label>
           <br>
           <input id="input" name="Book_Name" type="text">
           <br>    
          <label id="text2">  author</label>
          <br>
          <input id="input" name="author" type="text">
          <br>
          <label id="text2" >number of copies</label> <br>
          <input id="input" name="n_copies" type="text">
          <br>
          <label id="text2"  >Language</label> <br>
          <input id="input" name="Language" type="text">
          <br>
          <label id="text2" >Category</label> <br>
          <input id="input" name="Category" type="text">
 <br><br>

  <input type="file" name="fileToUpload"  id="submit">
  <br>
  <input type="submit" value="Add Book" name="submit" id="submit" >
</form>

</div>      
 </div>
            
           
        </div>
        

    </body>
</html>
