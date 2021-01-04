<?php
require_once('conn.php');
if(isset($_POST["submit"]) && $_POST["submit"]){

        
$name=$_POST['name'];
$description=$_POST["description"];
$date=$_POST["date"];
$hours=$_POST["hours"];
$minutes=$_POST["minutes"];
$userid=$_SESSION['userid'];
$categoryid=$_POST['cateselect'];


// user can type only hours too
  if(empty($minutes))
    {$duration=$hours.'h';}
  else
    {$duration=$hours.'h '.$minutes.'m';}
//


$sql = "INSERT INTO `activities`(`userId`, `categoryId`, `name`, `description`, `date`, `duration`) VALUES ($userid,$categoryid,'$name','$description','$date','$duration')";

// echo $sql;
if ($conn->query($sql) ) {
    // echo "<script>alert('Data inserted')</script>";
    header("Location:../home.php");
  } else {
    // echo "<script>alert('Problem to insert data try after some time')</script>";
    header("Location:../home.php");
  }


}