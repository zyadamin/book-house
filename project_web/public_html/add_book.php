 <?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'book_house');

$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

session_start();
$currentMAil = $_SESSION['email'];
      
$book_name=$_POST['Book_Name'];
 $author=$_POST['author'];
$n_copies=$_POST['n_copies'];
$target_file = "images/".basename($_FILES["fileToUpload"]["name"]);
$Language=$_POST['Language'];
$Category=$_POST['Category'];

$sqlinsert = "insert into book(book_image,name,o_name,no_copies,Language,Category) values ('$target_file','$book_name',' $author','$n_copies','$Language','$Category')"; 

    if (!mysqli_query($dbcon, $sqlinsert)) {
        die('error inserting new record');
        } //end of nested if

     header("Location: home_admin.php?signup=success");

 // end of the main if statement

 mysqli_close($dbcon);

?>
