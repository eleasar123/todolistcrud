<?php
$id=$_GET['id'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }else{
    $sql="update notes set Status='Done'";
    if($conn->query($sql)===TRUE){
        header("Location: notes.php");
    }

  }   
?>