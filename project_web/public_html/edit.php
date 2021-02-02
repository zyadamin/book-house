<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'book_house');

$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);


        session_start();
        $currentMAil = $_SESSION['email'];  

        $username=$_POST['Username'];
        $name=$_POST['name'];
        $n_email=$_POST['n_email'];
        $o_password=$_POST['o_password'];
        $n_password=$_POST['n_password'];

    $sqlinsert = "select password from users where   users.Email='$currentMAil' ";

    
    if (!mysqli_query($dbcon, $sqlinsert)) {
        die('error inserting new record');
        } //end of nested if

        $result=mysqli_query($dbcon, $sqlinsert);
        $row = mysqli_fetch_row($result);
        $password=$row[0];

        if($password!=$o_password){
            echo "invalid username or password";
           // header("Location: index.html");
        }
else{

    $sqlinsert = "UPDATE users SET name='$name' , user_name ='$username' , Email ='$n_email' ,PASSWORD  ='$n_password' 
    WHERE  users.Email='$currentMAil'  "; 

$_SESSION['email']=$n_email;

if (!mysqli_query($dbcon, $sqlinsert)) {
    die('error inserting new record');
    } //end of nested if

 header("Location: profile.php?Edit=success");

}
 mysqli_close($dbcon);

?>
