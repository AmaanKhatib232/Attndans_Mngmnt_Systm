<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>

<?php
    include('connect.php');
    try{
      
    if(isset($_POST['att'])){

      $course = $_POST['whichcourse'];

      foreach ($_POST['st_status'] as $i => $st_status) {
        
        $stat_id = $_POST['stat_id'][$i];
        $dp = date('Y-m-d');
        $course = $_POST['whichcourse'];
        
        $stat = mysql_query("insert into attendance(stat_id,course,st_status,stat_date) values('$stat_id','$course','$st_status','$dp')");
        
        $att_msg = "Attendance Recorded.";

      }



    }
  }
  catch(Execption $e){
    $error_msg = $e->$getMessage();
  }
 ?>

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


<style type="text/css">
  .status{
    font-size: 10px;
  }

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

<h3 style="color: white;"><b>Attendance of <?php echo date('Y-m-d'); ?></b></h3>
    <br>

    <center><p><?php if(isset($att_msg)) echo $att_msg; if(isset($error_msg)) echo $error_msg; ?></p></center> 
    
    <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">

     <div class="form-group">

               <!-- <label>Select Batch</label>
                
                <select name="whichbatch" id="input1">
                      <option name="eight" value="38">38</option>
                      <option name="seven" value="37">37</option>
                </select>-->


                <label>Enter Batch</label>
                <input type="text" name="whichbatch" id="input2" placeholder="Only 2020">
              </div>
               
     <input type="submit" class="btn btn-success col-md-3 col-md-offset-7" style="border-radius:0%" value="Search" name="batch" />

    </form>

    <div class="content"></div>
    <form action="" method="post">

      <div class="form-group">

        <label  style="color: white;">Select Subject</label>
              <select name="whichcourse" id="input1">
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

      </div>

    <table class="table table">
      <thead>
        <tr>
          <th scope="col" style="color: white;">Reg. No.</th>
          <th scope="col" style="color: white;">Name</th>
          <th scope="col" style="color: white;">Department</th>
          <th scope="col" style="color: white;">Batch</th>
          <th scope="col" style="color: white;">Semester</th>
          <th scope="col" style="color: white;">Email</th>
          <th scope="col" style="color: white;">Status</th>
        </tr>
      </thead>
   <?php

    if(isset($_POST['batch'])){

     $i=0;
     $radio = 0;
     $batch = $_POST['whichbatch'];
     $all_query = mysql_query("select * from students where students.st_batch = '$batch' order by st_id asc");

     while ($data = mysql_fetch_array($all_query)) {
       $i++;
     ?>
  <body>
     <tr>
       <td style="color: white;"><?php echo $data['st_id']; ?> <input type="hidden" name="stat_id[]" value="<?php echo $data['st_id']; ?>"> </td>
       <td style="color: white;"><?php echo $data['st_name']; ?></td>
       <td style="color: white;"><?php echo $data['st_dept']; ?></td>
       <td style="color: white;"><?php echo $data['st_batch']; ?></td>
       <td style="color: white;"><?php echo $data['st_sem']; ?></td>
       <td style="color: white;"><?php echo $data['st_email']; ?></td>
       <td style="color: white;">
         <label style="color: white;">Present</label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Present" >
         <label style="color: white;">Absent </label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Absent" checked>
       </td>
     </tr>
  </body>

     <?php

        $radio++;
      } 
}
      ?>
    </table>

    <center><br>
    <input type="submit" class="btn btn-success col-md-3 col-md-offset-7" value="Save!" name="att" />
  </center>

</form>
  </div>



  <!-- <div class="content">
    </div> -->

</center>

</body>
</html>
