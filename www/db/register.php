<?php
require_once('conn.php');
if(isset($_POST['email']))
{
    $username = trim($_POST['email']);
    $password = md5(trim($_POST['password']));
    $query = "SELECT email FROM users WHERE email='$username'";
    $result = mysqli_query($conn,$query)or die(mysqli_error());
    $num_row = mysqli_num_rows($result);
    $row=mysqli_fetch_array($result);
    if( $num_row > 0 )
    {
        $_SESSION["registerDuplicateEmail"] =1;
        header("location: ../register.php");
        exit;
    }
    else
    {

        $query = "INSERT INTO `users`(`email`, `password`) VALUES ('$username','$password')";
        $result = mysqli_query($conn,$query)or die(mysqli_error());
        $userId = mysqli_insert_id($conn);
    
        $_SESSION['userid']=$userId;
        header("location: ../home.php");
        exit;
    }
}
 ?>