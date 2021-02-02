<?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'book_house');

$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

session_start();
$currentMAil = $_SESSION['email'];

$target_file = "images/".basename($_FILES["fileToUpload"]["name"]);
$book_name=$_POST['old_name'];
$n_name=$_POST['n_name'];
$author=$_POST['author'];
$n_copies=$_POST['n_copies'];
$Language=$_POST['Language'];
$Category=$_POST['Category'];


$sqlinsert = "UPDATE book SET book_image='$target_file', name='$n_name' , o_name ='$author', no_copies='$n_copies',
Category='$Category', Language='$Language'
WHERE name='$book_name' "; 

    if (!mysqli_query($dbcon, $sqlinsert)) {
        die('error inserting new record');
        } //end of nested if

     header("Location: home_admin.php?signup=success");

 // end of the main if statement
 mysqli_close($dbcon);

?>
