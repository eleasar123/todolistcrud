
  
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Notes</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    <style>
        body{
            color: white;
        }
        a{
          text-decoration: none;
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

.sidenav a{
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  /* color: #818181; */
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
.modal{
            color:black;
            border: solid 2px white; 
            display:none; 
        }
        #button1{
          background-color: blue;
          border-style: none;
          border-radius: 15%;
          color:skyblue;
          font-size: 20px;
        }
        #button1:hover{
          color: white;
        }

      
    </style>
</head>

<body bgColor="black">

<div class="sidenav">
  <a href="notes.php">Home</a>
  <button id="button1" style="margin-left: 30px">Add New</button>
  <a href="trash.php">Trash</a>
</div>

<div class="container" style="margin-left:20%;backgground-color:black">
  <div class="row" style=" padding:20px;">

      <?php
    include_once('connection.php');
    // echo $_SESSION['UserId'];
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }else{
     
      $sql="select * from notes";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()){
          
      ?>

      <div class="card col-sm-4" style=" width:15rem;height:fit-content;font-size:20px; border-radius:10%;border:solid black 2px;color:black;padding:10px;color:white;border-radius: 10px;border:solid 2px white">
        <form method="POST">
            <h3><?php echo $row['Title'] ?></h3>
            <div class="container"><?php echo $row['Body'] ?></div>
            <span><?php echo $row['Status'] ?></span><br>
            <?php
                // if($row['Status']=="Done"){
                //   echo "<script></script>";
                // }
            ?>
              <br>
              <button class="update"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button>
              <a href="deleteNotes.php?id=<?php echo $row['noteId']; ?>">
              <button id="<?php echo $row['noteId']; ?>" type="button" class="btn btn-outline-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                </svg>
                  Delete
                </button>
                </a>
                <a href="done.php?id=<?php echo $row['noteId']; ?>">
                  <button style="font-size:15px"><i class="fa fa-check" aria-hidden="true"></i>Done</button>
                </a>
            
        </form>
    </div>
        
 
          <?php
          }
        }
      }
          ?>
  </div>
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
                <input id="title" type="text" name="title" placeholder="Enter title here"><br>
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
                <input id="title" type="text" name="title" placeholder="Enter title here"><br>
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

    (".update").click(function(){
      var title=$(this).siblings('h3').html();
      var body=$(this).siblings('div.container').html();
      var status=$(this).siblings('span').html();
      var date_created=$(this).siblings('p').html();  

      $('#note').modal({ backdrop: 'static', keyboard: false })
      $('#note').modal('show');
      $('#title').val(title);
      $('#noteBody').val(body);
      $('status').val(status);
      $("date").val(date_created);
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

  <script>

  

  </script>
<?php

  if(isset($_POST['orderButton'])){
    $cart=$_POST['cartId'];
    $id=$_POST['userId'];
    // echo "<script>alert('$cart+$id');</script>";
    if($cart!="" && $id!=""){
      $sql = "insert into orders(CartId,UserId) VALUES('".$cart."','".$id."') ";
      if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Thank you for your order!');
        </script>";
        echo "inserted successfully";
    } else {
      echo "<script>
      alert('Cart already placed to order!');
      </script>";
      // echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
  }
?>
</body>
</html>
