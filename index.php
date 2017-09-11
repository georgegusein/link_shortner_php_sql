<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid text-center">
  <p>
  <?php
  if(isset($_SESSION['feedback'])){
      echo $_SESSION['feedback'];
      unset($_SESSION['feedback']);
  }
  ?>
  </p>
  <p id="shortenedUrl"></p>
    <div class="row">
        <form action="shorten.php" method="post"> 
            <div class="col-sm-2"  >.col-sm-4</div>
            <div class="col-sm-6"  >   
                 <input type="url" class="form-control" id="url" placeholder="Enter url" name="url" autocomplete="off">
            </div>
            <div class="col-sm-2"  > 
                 <button type="submit" class="btn btn-default">Submit</button>
            </div>
            <div class="col-sm-2"  >.col-sm-4</div>
        </form>
    </div>
</div>

</body>
</html>