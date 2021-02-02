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
  padding:8px 100px;

}
#text{
    font-size: 15px;
    margin-left: -520px; 
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
 
   
        </style>
        
        
  
    </head>
 <body style= "background-color:#ffffff;">
        
      <div  id="edit" >
          <form action="edit_book_helper.php"  method="POST"   enctype="multipart/form-data" >
          <h1 style="font-family: Arial, Helvetica, sans-serif; ">Update Book<h1>
              
         <label id="text">Name</label>
         <br>
          <input id="input" name="old_name" type="text">
          <br>
          <label id="text" style="margin-right: -30px">New Name</label>
          <br>
          <input id="input" name="n_name" type="text">
          <br>
          <label id="text"  >author</label> 
          <br>
          <input id="input" name="author" type="text">
          <br>
          <label id="text"  style="margin-left: -450px;"  >number of copies</label>
          <br>
          <input id="input"  name="n_copies" type="text">
          <br>
          <label id="text"  style="margin-left:-500px;">Language</label>
          <br>
          <input id="input" name="Language" type="text">
          <br>
          <label id="text" style="margin-left:-510px;">Category</label>
          <br>
          <input id="input" name="Category" type="text">

              <br><br>

  <input type="file" name="fileToUpload"  id="submit">
  <br>
  <input type="submit" value="Update Book" name="submit" id="submit" >

    </form>
             </div>
</body>
</html>
