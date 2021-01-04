<?php
require_once('conn.php');

    if(isset($_POST['edit'])){

        $name=$_POST['editName'];
        $id=$_POST['edit-id'];
        // echo $id;


        $sql = "UPDATE `categories` SET `name`='$name' WHERE id=$id";
        // echo $sql;
if ($conn->query($sql) === TRUE) {
  // echo "Record updated successfully";
  header('location:../catagory.php');
} else {
  // echo "Error updating record: " . $conn->error;
  header('location:../catagory.php');
}

    }

?>

