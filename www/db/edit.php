<?php
require_once('conn.php');

    if(isset($_POST['edit'])){

        $name=$_POST['editName'];
        $date=$_POST['editDate'];
        $desc=$_POST['editDescription'];
        
        
        if(empty($_POST['editMinutes']))
         {$duration=$_POST['editHours'].'h ';}
        else
         {$duration=$_POST['editHours'].'h '.$_POST['editMinutes'].'m';}

        $id=$_POST['edit-id'];
        $category = $_POST['editcatselect'];
        //echo $id;


        $sql = "UPDATE `activities` SET `categoryId`=$category,`name`='$name',`description`='$desc',`date`='$date',`duration`='$duration' WHERE id=$id";
        // echo $sql;
if ($conn->query($sql) === TRUE) {
  // echo "Record updated successfully";
  header('location:../home.php');
} else {
  // echo "Error updating record: " . $conn->error;
  header('location:../home.php');
}

    }

?>

