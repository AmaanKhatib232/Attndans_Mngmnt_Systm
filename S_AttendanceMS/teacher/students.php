<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</style>

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
  <a href="index.php" style="text-decoration:none;">Home</a>
  <a href="students.php" style="text-decoration:none;">Students</a>
  <a href="teachers.php" style="text-decoration:none;">Faculties</a>
  <a href="attendance.php" style="text-decoration:none;">Attendance</a>
  <a href="report.php" style="text-decoration:none;">Report</a>
  <a href="../logout.php" style="text-decoration:none;">Logout</a>


</div>

</header>

<center>

<div class="demo">
<h3 style="color: white;"><b>Student List</b></h3>
    <br>
    <form method="post" action="">
      <label style="color: white;">Batch</label>
      <input type="text" name="sr_batch">
      <input type="submit" name="sr_btn" class="btn btn-success col-md-3 col-md-offset-7" style="border-radius:0%" value="Search" >
    </form>
    <br>
    <table class="table table table">
      <thead>
        <tr>
          <th scope="col" style="color: white;">Registration No.</th>
          <th scope="col" style="color: white;">Name</th>
          <th scope="col" style="color: white;">Department</th>
          <th scope="col" style="color: white;">Batch</th>
          <th scope="col" style="color: white;">Semester</th>
          <th scope="col" style="color: white;">Email</th>
        </tr>
      </thead>

   <?php

    if(isset($_POST['sr_btn'])){
     
     $srbatch = $_POST['sr_batch'];
     $i=0;
     
     $all_query = mysql_query("select * from students where students.st_batch = '$srbatch' order by st_id asc ");
     
     while ($data = mysql_fetch_array($all_query)) {
       $i++;
     
     ?>
  <tbody>
     <tr>
       <td style="color: white;"><?php echo $data['st_id']; ?></td>
       <td style="color: white;"><?php echo $data['st_name']; ?></td>
       <td style="color: white;"><?php echo $data['st_dept']; ?></td>
       <td style="color: white;"><?php echo $data['st_batch']; ?></td>
       <td style="color: white;"><?php echo $data['st_sem']; ?></td>
       <td style="color: white;"><?php echo $data['st_email']; ?></td>
     </tr>
  </tbody>

     <?php 
          } 
              }
      ?>
      
    </table>

  </div>

  <!-- <div class="content">
    

</div> -->

</center>

</body>
</html>
