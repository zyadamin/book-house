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
    margin-left: -270px; 
    color:   #404040; 
 font-family: Arial, Helvetica, sans-serif;
    
}         
   #submit {
 background-color:#262626;
  border-radius: 6px;
 color:  #ffffff;
font-size: 20px;
 padding:10px 120px;


   }    #condition{
      color: #a6a6a6;
       font-family: Arial, Helvetica, sans-serif;
       font-size: 15px;
           margin-left: -70px; 
   }     
   #edit{
       
      text-align: center; 
      margin-top: -300px;  
      margin-left: 70px;
   }
   
        </style>
        
        <script>
          function validateForm() {
            var x = document.forms["myForm"]["n_password"].value;
            if ( x.length<6) {
              alert("Passwords must be at least 6 characters.");
              return false;
            }

            var y = document.forms["myForm"]["n_email"].value;
            var count=0;
            var i;
            for(i=0;i<y.length;i++){
              if(y[i]=='@'){count++;}
            }

            if (count==0) {
              alert("invalid Email");
              return false;
            }

            
          }

          </script>
  
    </head>
 <body style= "background-color:#ffffff;">
        
      <div  id="edit" >
          <form name="myForm" action="edit.php"  method="POST">
          <h1 style=" font-family: Arial, Helvetica, sans-serif;">Update your account<h1>
              
            <label id="text">Change Name</label>
            <br>
          <input id="input" name="name" type="text">
          <br>
          <label id="text" style="margin-right: -30px">Change Username</label>
          <br>
          <input id="input" name="Username" type="text">
          <br>
          <label id="text"  >Change Email</label> <br>
          <input id="input" name="n_email" type="text">
          <br>
          <label id="text"   >Old Password</label>
          <br>
          <input id="input"  name="o_password" type="password">
          
              <br>
          <label id="text" >New Password</label>
          <br>
          <input id="input" name="n_password" type="password">
      
          <p id="condition">Passwords must be at least 6 characters.</p>
         
          <br>   
            <button id="submit"  type="submit">Update account</button>
    </form>
             </div>
</body>
</html>
