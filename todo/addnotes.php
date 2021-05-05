<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoLists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <style>
        body{
            color: white;
        }
        .modal{
            color:black;
            
            
        }
        .sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


    </style>
</head>


<body bgColor="black">

<div class="sidenav">
  <a href="notes.php">Home</a>
  <a href="addnotes.php" id="button1">Add New</a>
  <a href="trash.php">Trash</a>
</div>



<div class="modal" id="note" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="width:80%; margin-left:auto; margin-right:auto; text-align:left;padding: 10px;">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Notes</h5>
            <button type="button" class="close" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form method="POST">
                <h4 >Take down notes</h4>
                <h5>Title:</h5>
                <input type="text" name="title" placeholder="Enter title here"><br>
                <h5>Body:</h5>
                <textarea id="noteBody" rows="4" cols="45" name="noteBody">
                Enter text body here...</textarea>
                <input id="body" name="body" type ="text" style="visibility:hidden;height:20px;width:20px;margin:0px" value="">
                <h5>Status:</h5>
                <input type="radio" id="done"  value="Done"><label>Done</label>
                <input type="radio" id="not"  value="Not Done"><label>Not Done</label><br>
                
                <input id="status" name="status" type ="text" style="visibility:hidden;height:20px;width:20px;margin:0px" value="">
                <input type="submit" name ="submit" value="Add Note"><br><br>
            </form>    
            </div> 
            <div class="modal-footer">
              <button  type="button" class="close">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>
 $(document).ready(function(){
    $('#noteBody').keyup(function(){
        $('#body').val($(this).val())
      
    })
    $('#done').click(function(){
        $("#status").val("Done");
    })
    $('#not').click(function(){
        $("#status").val("Not Done");
    })
    $("#button1").click(function(){
      
      $('#note').modal({ backdrop: 'static', keyboard: false })
      $('#note').modal('show');

      $(".close").click(() => {
          $('#note').modal('hide');

        })
    })
    
 })
</script>
<script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
</script>
<?php
    include_once("connection.php");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
    if(isset($_POST['submit'])){
        $title=$_POST['title'];
        $body=$_POST['body'];
    
        $status=$_POST['status'];
        echo "<script>
              alert('$title+$body+$status');
              </script>";
        if($title!="" && $body!="" && $status!=""){
            $sql = "insert into notes(Title,Body,Status) VALUES('".$title."','".$body."','".$status."') ";
            if ($conn->query($sql) === TRUE) {
            echo "<script>
            alert('Note added!');
            </script>";
                
            }
        } 
        
    }
?>
</body>
</html>