<?php
require_once('conn.php');

    if(isset($_POST['delete'])){

        $id=$_POST['deleteId'];

        $sql = "DELETE FROM categories WHERE id=$id";

if ($conn->query($sql) === TRUE) {
  // echo "Record deleted successfully";
  header('location:../catagory.php');
} else {
  // echo "Error deleting record: " . $conn->error;
  header('location:../catagory.php');
}


    }
?>