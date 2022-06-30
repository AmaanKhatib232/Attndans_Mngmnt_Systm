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

<div class="demo1">
<h3 style="color: white;"><b>Teacher List</b></h3>
    
    <table class="table table=stripped">
        <thead>  
          <tr>
            <th scope="col" style="color: white;">Teacher ID</th>
            <th scope="col" style="color: white;">Name</th>
            <th scope="col" style="color: white;">Department</th>
            <th scope="col" style="color: white;">Email</th>
            <th scope="col" style="color: white;">Course</th>
          </tr>
        </thead>

      <?php

        $i=0;
        $tcr_query = mysql_query("select * from teachers order by tc_id asc");
        while($tcr_data = mysql_fetch_array($tcr_query)){
          $i++;

        ?>
          <tbody>
              <tr>
                <td style="color: white;"><?php echo $tcr_data['tc_id']; ?></td>
                <td style="color: white;"><?php echo $tcr_data['tc_name']; ?></td>
                <td style="color: white;"><?php echo $tcr_data['tc_dept']; ?></td>
                <td style="color: white;"><?php echo $tcr_data['tc_email']; ?></td>
                <td style="color: white;"><?php echo $tcr_data['tc_course']; ?></td>
              </tr>
          </tbody>

          <?php } ?>
          
    </table>

  </div>


  <!-- <div class="content">
    
</div> -->

</center>

</body>
</html>
