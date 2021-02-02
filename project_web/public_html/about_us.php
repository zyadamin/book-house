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

* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
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
               <li><a  style="background-color: #009900;" href="about_us.php">about us</a></li>
               <li><a  href="http://localhost/project_web/public_html/profile.php"><i class="fa fa-fw fa-user"></i> profile</a></li>
               <?php  
      if($state=="Student"){
       echo"  <li> <a  href=\"inbox.php\"><i class=\"fa fa-inbox\"></i> inbox</a> </li>";
       }
        ?>
              <li id="out" ><a href="logout.php" ><i class="fa fa-power-off"></i> logout</a></li>
          </div>
  
             </ul>
  
          </div>
          
<div class="slideshow-container" style=" margin-top :150px">

    <div class="mySlides fade">
      <div class="numbertext">1 / 3</div>
      <img src="images/1.jpeg" style="width: 1000px; height: 400px;">
      <div class="text">Caption Text</div>
    </div>
    
    <div class="mySlides fade">
      <div class="numbertext">2 / 3</div>
      <img src="images/2.jpeg" style="width: 1000px; height: 400px;">
      <div class="text">Caption Two</div>
    </div>
    
    <div class="mySlides fade">
      <div class="numbertext">3 / 3</div>
      <img src="images/3.jpeg" style="width: 1000px; height: 400px;">
      <div class="text">Caption Three</div>
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    
    </div>
    <br>
    
    <div style="text-align:center">
      <span class="dot" onclick="currentSlide(1)"></span> 
      <span class="dot" onclick="currentSlide(2)"></span> 
      <span class="dot" onclick="currentSlide(3)"></span> 
    </div>
    
    <script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
    
    function currentSlide(n) {
      showSlides(slideIndex = n);
    }
    
    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";  
      dots[slideIndex-1].className += " active";
    }
    </script>
  
</body>
</html>