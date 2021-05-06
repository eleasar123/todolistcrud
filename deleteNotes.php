<?php
session_start();
include_once('connection.php');
$noteId=$_GET['id'];
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql= "select * from notes where noteId='".$noteId."'";
$result = $conn->query($sql);
$row=mysqli_fetch_array($result);
$title=$row['Title'];
$body=$row['Body']; 
$status=$row['Status'];
$sql3="insert into trash(title,body,status)values('".$title."', '".$body."', '".$status."')";
$sql2 = "DELETE FROM notes WHERE noteId = '".$noteId."'";
if ($conn->query($sql) == TRUE) {
  if($conn->query($sql3) === TRUE){
    $conn->query($sql2);
  }
   

  header( 'Location: notes.php' ) ;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>