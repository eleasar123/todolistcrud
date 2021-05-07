<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Notes</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<?php
$id=$_GET['id'];
include_once('connection.php');

$sql = "SELECT * FROM `notes` WHERE `noteId` = '".$id."'";
// $result = $conn->query($sql);
$result = mysqli_query($conn,$sql);
$num_row = mysqli_num_rows($result);
$row=mysqli_fetch_array($result);
?>
<div class="card" style="margin-left:auto;margin-right:auto;width:50rem;border:solid 5px black;border-radius:20%;padding:50px;">
<form method="POST">
<h4 >Take down notes</h4>
                <h5>Title:</h5>
                
                <input id="title" type="text" name="title" placeholder="Enter title here" value="<?php echo $row['Title'];?>"><br>
                <h5>Body:</h5>
                <textarea class="form-control" id="noteBody" rows="4" cols="45" name="noteBody">
                <?php echo $row['Body'];?></textarea>
                <input id="body" name="body" type ="text" style="visibility:hidden;height:20px;width:20px;margin:0px" value="<?php echo $row['Body'];?>">
                <h5>Status:</h5>
                <input type="checkbox" id="done"  value="Done"><label>Done</label><br>
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <input id="status" name="status" type ="text" style="visibility:hidden;height:20px;width:20px;margin:0px" value="<?php echo $row['Status'];?>">
                <input type="submit" name ="submitButton" value="Edit Note"><br><br>
</form>
</div>
<script>
$('#noteBody').keyup(function(){
        $('#body').val($(this).val())
      
    })
    x=0;
    $("#status").val("Not Done");
    $('#done').click(function(){
      if(x%2==0){
      $(this).attr("checked",true);
      $("#status").val("Done");
      
      x++;
      }else{
        $(this).attr("checked",false);
      $("#status").val("Not Done");
      
      x++;
      }
      
    })
</script>
<!-- <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
</script> -->
<?php
 include_once("connection.php");
 // Check connection
 if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
 }

if(isset($_POST['submitButton'])){
  $id=$_POST['id'];
  $title=$_POST['title'];
  $body=trim($_POST['body'],' ');
  $status=$_POST['status'];
echo "<script>alert('$id+$title+$body+$status')</script>";
if($title!="" && $body!="" && $status!=""){
      $sql = "UPDATE notes set Title='".$title."', Body='".$body."', Status='".$status."' where noteId='".$id."'";
      if ($conn->query($sql) === TRUE) {
        header("Location:notes.php");
      }
    }
  
}
?>

</body>
</html>
