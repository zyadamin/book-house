
        <?php

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PSWD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'book_house');

$dbcon = mysqli_connect(DB_HOST, DB_USER, DB_PSWD, DB_NAME);

        $name=$_POST['Name']; 
        $username=$_POST['Username'];
        $email=$_POST['Email'];
        $password=$_POST['password'];
        $state=$_POST['gender'];
       
    $sqlinsert = "INSERT INTO users ( user_name,name ,Email ,PASSWORD ,state ) VALUES ( '$username','$name', '$email','$password','$state')";

    if (!mysqli_query($dbcon, $sqlinsert)) {
        die('error inserting new record');
        } //end of nested if

        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['gender'] = $state;

        if($state=="Student"){
                header("Location: home_page.php?signup=success");
                 }
         
                 else{
                     header("Location: home_admin.php?signup=success");
                 }



 // end of the main if statement

 mysqli_close($dbcon);


?>



        
