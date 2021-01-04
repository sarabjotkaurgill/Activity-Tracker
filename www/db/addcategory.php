<?php
require_once('conn.php');
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $name = $_POST['name'];
    $userid = $_SESSION['userid'];
    $sql1 = "INSERT INTO `categories`(`userId`,`name`) VALUES ($userid,'$name')";
    if ($conn->query($sql1)) {
        // echo "<script>alert('Data inserted')</script>";
        header("Location:../catagory.php");
    } else {
        // echo "<script>alert('Problem to insert data try after some time')</script>";
        header("Location:../catagory.php");
    }
} else {
    $name = $_POST['name'];
    $userid = $_SESSION['userid'];
    // echo "error";
    // echo $userid;
    // echo $name;
}