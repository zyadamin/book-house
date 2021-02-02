
      <?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'book_house');

$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

session_start();
$currentMAil = $_SESSION['email'];


$sqlinsert = "select book_id FROM borrow WHERE borrow.user_email='$currentMAil' ";
if (!mysqli_query($dbcon, $sqlinsert)) {
  die('error get id');
  } //end of nested if

$result=mysqli_query($dbcon, $sqlinsert);
 $row = mysqli_fetch_row($result);
 $id=$row[0];

if(isset($_POST['Return'])){

  $sqlinsert = "DELETE FROM borrow WHERE borrow.user_email='$currentMAil' ";
  if (!mysqli_query($dbcon, $sqlinsert)) {
    die('error delete borrow');
    } //end of nested if
    
       
     $sqlinsert = "UPDATE book SET no_copies=no_copies+'1'  WHERE book.id='$id' ";
  if (!mysqli_query($dbcon, $sqlinsert)) {
    die('error update book');
    } //end of nested if
    
      header("Location: home_page.php");
  }


if(isset($_POST['Extend'])){
$n_days=$_POST['day'];

    $sqlinsert = "UPDATE borrow SET borrow.n_days=borrow.n_days+'$n_days'  WHERE borrow.book_id='$id' ";
    if (!mysqli_query($dbcon, $sqlinsert)) {
      die('error updae day');
      } //end of nested if
      
        header("Location: home_page.php");
    }
  

?>