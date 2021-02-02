
    <?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'book_house');

$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

session_start();
$currentMAil = $_SESSION['email'];
      
$target_file = "images/".basename($_FILES["fileToUpload"]["name"]);


$sqlinsert = "UPDATE users SET image= '$target_file'   WHERE  users.Email='$currentMAil'  "; 

    if (!mysqli_query($dbcon, $sqlinsert)) {
        die('error inserting new record');
        } //end of nested if


     header("Location: profile.php?signup=success");

 // end of the main if statement

 mysqli_close($dbcon);

?>

