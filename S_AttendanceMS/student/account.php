  <?php

  ob_start();
  session_start();

  //checking if the session is valid
  if($_SESSION['name']!='oasis')
  {
    header('location: ../login.php');
  }
  ?>

  <?php include('connect.php');?>


<?php 
try{

         //checking form data and empty fields
          if(isset($_POST['done'])){

          if (empty($_POST['name'])) {
            throw new Exception("Name cannot be empty");
            
          }
              if (empty($_POST['dept'])) {
               
                throw new Exception("Department cannot be empty");
                
              }
                  if(empty($_POST['batch']))
                  {
                    throw new Exception("Batch cannot be empty");
                    
                  }
                      if(empty($_POST['email']))
                      {
                        throw new Exception("Email cannot be empty");
                        
                      }

  //initializing the student id
  $sid = $_POST['id'];

  //udating students information to database table "students"
  $result = mysql_query("update students set st_name='$_POST[name]',st_dept='$_POST[dept]',st_batch='$_POST[batch]',st_sem='$_POST[semester]', st_email = '$_POST[email]' where st_id='$sid'");
  $success_msg = 'Updated  successfully';
  
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

  <h1 style="color: white;" >Attendance Management System</h1>
  <div class="navbar">
  <a href="index.php" style="text-decoration:none;">Home</a>
  <a href="students.php" style="text-decoration:none;">Students</a>
  <a href="report.php" style="text-decoration:none;">Report Section</a>
  <a href="account.php" style="text-decoration:none;">My Account</a>
  <a href="../logout.php" style="text-decoration:none;">Logout</a>

</div>

</header>
<!-- Menus ended -->

<!-- Content, Tables, Forms, Texts, Images started -->
<center>

<!-- <div class="row">
    
  </div> -->

  <div class="demo1">

          <h3 style="color: white;">Update Account</h3>
          <br>
          
          <!-- Error or Success Message printint started --><p>
      <?php

          if(isset($success_msg))
          {
            echo $success_msg;
          }
          if(isset($error_msg))
          {
            echo $error_msg;
          }

        ?>
          </p><!-- Error or Success Message printint ended -->

          <br>
   
          <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="input1" class="col-sm-3 control-label">Registration No.</label>
                <div class="col-sm-7">
                  <input type="text" name="sr_id"  class="form-control" id="input1" placeholder="enter your reg. no. to continue" />
                </div>
            </div>
            <input type="submit" class="btn btn-success col-md-3 col-md-offset-7" value="Go!" name="sr_btn" />
          </form>
          <div class="content"></div>


      <?php

      if(isset($_POST['sr_btn'])){

      //initializing student ID from form data
       $sr_id = $_POST['sr_id'];

       $i=0;

       //searching students information respected to the particular ID
       $all_query = mysql_query("select * from students where students.st_id='$sr_id'");
       while ($data = mysql_fetch_array($all_query)) {
         $i++;
       
       ?>
<form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">
   <table class="table">
  
          <tr>
            <td style="color: white;">Registration No.:</td>
            <td style="color: white;"><?php echo $data['st_id']; ?></td>
          </tr>

          <tr>
              <td style="color: white;">Student's Name:</td>
              <td><input type="text" name="name" value="<?php echo $data['st_name']; ?>"></input></td>
          </tr>

          <tr>
              <td style="color: white;">Department:</td>
              <td><input type="text" name="dept" value="<?php echo $data['st_dept']; ?>"></input></td>
          </tr>

          <tr>
              <td style="color: white;">Batch:</td>
              <td><input type="text" name="batch" value="<?php echo $data['st_batch']; ?>"></input></td>
          </tr>
          
          <tr>
              <td style="color: white;">Semester:</td>
              <td><input type="text" name="semester" value="<?php echo $data['st_sem']; ?>"></input></td>
          </tr>

          <tr>
              <td style="color: white;">Email:</td>
              <td><input type="text" name="email" value="<?php echo $data['st_email']; ?>"></input></td>
          </tr>
          <input type="hidden" name="id" value="<?php echo $sr_id; ?>">
          
          <tr><td></td></tr>
          <tr>
                <td></td>
                <td><input type="submit" class="btn btn-success col-md-3 col-md-offset-7" value="Update" name="done" /></td>
                
          </tr>

    </table>
</form>
     <?php 
   } 
     }  
     ?>


      </div>


  </center>
<!-- Contents, Tables, Forms, Images ended -->

</body>
<!-- Menus ended -->

</html>
