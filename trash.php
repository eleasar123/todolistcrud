<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trash</title>
    <link src="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<style>
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


<body bgColor="white">

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
     
      $sql="select * from trash";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()){
          
      ?>

      <div class="card col-sm-4" style=" width:15rem;height:fit-content;font-size:20px; border-radius:10%;border:solid black 2px;color:black;padding: 10px">
        <form method="POST">
            <h3><?php echo $row['title'] ?></h3>
            <div class="container"><?php echo $row['body'] ?></div>
            <span><?php echo $row['status'] ?></span><br>
            
              <br>
              <button id="<?php echo $row['trashId']; ?>" type="button" class="btn btn-outline-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                </svg>
                  Delete
                </button>
                </a>
            
        </form>
      </div>
      <?php
      }
    }
  
      ?>
</div>
</div> 

<?php
}
?>

</body>
</html>