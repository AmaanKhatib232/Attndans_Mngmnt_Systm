


<?php 
  
  include('connect.php');


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<style>
    body  {
      background-image: url("background.jpeg");
      /* background-color: #cccccc; */
    }
</style>

<body>

<header>

  <h1 style="color: white;">Attendance Management System</h1>
  <div class="navbar">
  <a href="index.php">Login</a>

</div>

</header>

<center>

<!-- <div class="content" >
  

</div> -->

<div class="row">

<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
<h3 style="color: white;">Recover your password</h3>

  <div class="form-group">

      <label for="input1" class="col-sm-2 control-label" style="color: white;">Email</label>
      <div class="col-sm-10">
        <input type="email" name="email"  class="form-control" id="input1" placeholder="your email" />
      </div>
  </div>

  <input type="submit" class="btn btn-success col-md-3 col-md-offset-7" value="Go" name="reset" />
  <br></br>
  <br></br>
  
</form>

  <br>

  <?php

      if(isset($_POST['reset'])){

      $test = $_POST['email'];
      $row = 0;
      $query = mysql_query("select password from admininfo where email = '$test'");
      $row = mysql_num_rows($query);

      if($row == 0){
?>
  <div  class="content"><p  style="color: black;">Email is not associated with any account. Contact SY-20 Group</p></div>

<?php
      }

      else{

        $query = mysql_query("select password from admininfo where email = '$test'");
        $i =0;
        while($dat = mysql_fetch_array($query)){
            $i++;
?>
<strong>
<p style="text-align: left;">Hi there!<br>You requested for a password recovery. You may <a href="index.php">Login here</a> and enter this key as your password to login. Recovery key: <mark><?php echo $dat['password']; ?></mark><br>Regards,<br>Attendance Management System</p></strong>
<?php
  }
      }
}


   ?>

</div>

</center>

</body>
</html>
