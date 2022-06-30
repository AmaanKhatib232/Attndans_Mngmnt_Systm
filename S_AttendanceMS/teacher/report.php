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

  <!-- <div class="content"> -->
    <h3 style="color: white;"><b>Individual Report</b></h3>

    <form method="post" action="">

    <label style="color: white;">Select Subject</label>
    <select name="whichcourse">
    <option  value="algo">Data Structures</option>
         <option  value="algolab">Data Structures Lab</option>
        <option  value="dbms">Database Management System</option>
        <option  value="dbmslab">Database Management System Lab</option>
        <option  value="weblab">Theory of Computation Lab</option>
        <option  value="os">Software Engineering</option>
        <option  value="oslab">Software Engineering Lab</option>
        <option  value="obm">Machine Learning</option>
        <option  value="softcomp">Theory of Computation</option>

    </select>

      <p>  </p>
      <label style="color: white;">Student Reg. No.</label>
      <input type="text" name="sr_id">
      <input type="submit" name="sr_btn" value="Go!" >

    </form>

    <!-- <h3 style="color: white;"><b>Mass Report</b></h3>

    <form method="post" action="">

    <label style="color: white;">Select Subject</label>
    <select name="course">
    <option  value="algo">Data Structures</option>
         <option  value="algolab">Data Structures Lab</option>
        <option  value="dbms">Database Management System</option>
        <option  value="dbmslab">Database Management System Lab</option>
        <option  value="weblab">Theory of Computation Lab</option>
        <option  value="os">Software Engineering</option>
        <option  value="oslab">Software Engineering Lab</option>
        <option  value="obm">Machine Learning</option>
        <option  value="softcomp">Theory of Computation</option>

    </select>
    <p>  </p>
      <label style="color: white;">Date ( yyyy-mm-dd )</label>
      <input type="text" name="date">
      <input type="submit" name="sr_date" value="Go!" >
    </form> -->

    <br>

    <br>

   <?php

    if(isset($_POST['sr_btn'])){

     $sr_id = $_POST['sr_id'];
     $course = $_POST['whichcourse'];

     $single = mysql_query("select stat_id,count(*) as countP from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course' and attendance.st_status='Present'");
      $singleT= mysql_query("select count(*) as countT from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course'");
    //  $count_tot = mysql_num_rows($singleT);
  } 

    if(isset($_POST['sr_date'])){

     $sdate = $_POST['date'];
     $course = $_POST['course'];

     $all_query = mysql_query("select * from attendance where reports.stat_date='$sdate' and reports.course = '$course'");

    }
    if(isset($_POST['sr_date'])){

      ?>

    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col" style="color: white;">Reg. No.</th>
          <th scope="col" style="color: white;">Name</th>
          <th scope="col" style="color: white;">Department</th>
          <th scope="col" style="color: white;">Batch</th>
          <th scope="col" style="color: white;">Date</th>
          <th scope="col" style="color: white;">Attendance Status</th>
        </tr>
     </thead>


    <?php

     $i=0;
     while ($data = mysql_fetch_array($all_query)) {

       $i++;

     ?>
        <tbody>
           <tr>
             <td style="color: white;"><?php echo $data['st_id']; ?></td>
             <td style="color: white;"><?php echo $data['st_name']; ?></td>
             <td style="color: white;"><?php echo $data['st_dept']; ?></td>
             <td style="color: white;"><?php echo $data['st_batch']; ?></td>
             <td style="color: white;"><?php echo $data['stat_date']; ?></td>
             <td style="color: white;"><?php echo $data['st_status']; ?></td>
           </tr>
        </tbody>

     <?php 
   } 
  }
     ?>
     
    </table>


    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
    <table class="table table-striped">

    <?php


    if(isset($_POST['sr_btn'])){

       $count_pre = 0;
       $i= 0;
       $count_tot;
       if ($row=mysql_fetch_row($singleT))
       {
       $count_tot=$row[0];
       }
       while ($data = mysql_fetch_array($single)) {
       $i++;
       
       if($i <= 1){
     ?>


     <tbody>
      <tr>
          <td>Student Reg. No: </td>
          <td><?php echo $data['stat_id']; ?></td>
      </tr>

           <?php
         //}
        
        // }

      ?>
      
      <tr>
        <td style="color: white;">Total Class (Days): </td>
        <td style="color: white;"><?php echo $count_tot; ?> </td>
      </tr>

      <tr>
        <td>Present (Days): </td>
        <td><?php echo $data[1]; ?> </td>
      </tr>

      <tr>
        <td style="color: white;">Absent (Days): </td>
        <td style="color: white;"><?php echo $count_tot -  $data[1]; ?> </td>
      </tr>

    </tbody>

   <?php

     }  
    }}
     ?>
    </table>
  </form>

  <!-- </div> -->

</div>

</center>

</body>
</html>
