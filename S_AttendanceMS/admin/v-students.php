<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{

  header('location: ../index.php');
}
?>


<?php

//establishing connection
include('connect.php');

  try{

    //validation of empty fields
      if(isset($_POST['signup'])){

        if(empty($_POST['email'])){
          throw new Exception("Email cann't be empty.");
        }

          if(empty($_POST['uname'])){
             throw new Exception("Username cann't be empty.");
          }

            if(empty($_POST['pass'])){
               throw new Exception("Password cann't be empty.");
            }
              
              if(empty($_POST['fname'])){
                 throw new Exception("Username cann't be empty.");
              }
                if(empty($_POST['phone'])){
                   throw new Exception("Username cann't be empty.");
                }
                  if(empty($_POST['type'])){
                     throw new Exception("Username cann't be empty.");
                  }

        //insertion of data to database table admininfo
        $result = mysql_query("insert into admininfo(username,password,email,fname,phone,type) values('$_POST[uname]','$_POST[pass]','$_POST[email]','$_POST[fname]','$_POST[phone]','$_POST[type]')");
        $success_msg="Signup Successfully!";

  
  }
}
  catch(Exception $e){
    $error_msg =$e->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="en">

<!-- head started -->
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
<!-- head ended -->
<style>
    body  {
      background-image: url("background.jpeg");
      /* background-color: #cccccc; */
    }
</style>
<!-- body started -->
<body>

    <!-- Menus started-->
    <header>

      <h1 style="color: white;">Attendance Management System</h1>
      <div class="navbar">
        <a href="signup.php" style="text-decoration:none;">Create Users</a>
        <a href="index.php" style="text-decoration:none;">Add Student/Teacher</a>
        <a href="v-students.php" style="text-decoration:none;">View Students</a>
      <a href="v-teachers.php" style="text-decoration:none;">View Teachers</a>
        <a href="../logout.php" style="text-decoration:none;">Logout</a>
      </div>

    </header>
    <!-- Menus ended -->

<center>
<h1 style="color: white;">All Students</h1>

<!-- <div class="content">

</div> -->

<div class="demo1">
   
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
       
       $i=0;
       
       $all_query = mysql_query("SELECT * from students ORDER BY st_id asc");
       
       while ($data = mysql_fetch_array($all_query)) {
         $i++;
       
       ?>
  
       <tr>
         <td style="color: white;"><?php echo $data['st_id']; ?></td>
         <td style="color: white;"><?php echo $data['st_name']; ?></td>
         <td style="color: white;"><?php echo $data['st_dept']; ?></td>
         <td style="color: white;"><?php echo $data['st_batch']; ?></td>
         <td style="color: white;"><?php echo $data['st_sem']; ?></td>
         <td style="color: white;"><?php echo $data['st_email']; ?></td>
       </tr>
  
       <?php 
            } 
              
        ?>
      </table>
    
  </div>

</center>

</body>
<!-- Body ended  -->

</html>
