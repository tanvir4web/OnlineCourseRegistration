<?php
session_start();
include('includes/config.php');

  if(strlen($_SESSION['alogin'])==0)
    {   
      header('location:index.php');
    }
  else
    {
  if(isset($_POST['submit']))
    {
      $studentname=$_POST['studentname'];
      $studentregno=$_POST['studentregno'];
      $password=md5($_POST['password']);
      $pincode = rand(1000,9999);
      $ret=mysqli_query($con,"insert into students(studentName,StudentRegno,password,pincode) values('$studentname','$studentregno','$password','$pincode')");
      if($ret)
        {
          $_SESSION['msg']="Student Registered Successfully !!";
          header('location:Manage-Students.php');
        }
      else
        {
          $_SESSION['msg']="Error : Student  Not Register";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Teacher | Student Registration</title>
    <link rel="icon" href="../MDB/img/favicon.png" />
       <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    />
    <!-- Bootstrap core CSS -->
    <link href="/MDB/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="/MDB/css/mdb.min.css" rel="stylesheet" />
    <!-- Your custom styles (optional) -->
    <link href="/MDB/css/mdb.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/21dd78019e.js"></script>

</head>

<body>

<?php 
  if($_SESSION['alogin']!="")
    {
      include('includes/menubar.php');
    }
?>
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <h3 class="page-head-line text-center">Student Registration  </h3>
                        <hr>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                        Register Student 
                        </div>
      <font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>

                        <div class="panel-body">
                       <form name="dept" method="post">
   <div class="form-group">
    <label for="studentname">Student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" placeholder="Example : Tanvir Ahmed" required />
  </div>

 <div class="form-group">
    <label for="studentregno">Student Reg No   </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" onBlur="userAvailability()" placeholder="Example : 161-15-879" required />
     <span id="user-availability-status1" style="font-size:12px;">
  </div>

<div class="form-group">
    <label for="password">Password  </label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required />
  </div>   

 <button type="submit" name="submit" id="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> Submit</button>
</form>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
    
  <?php include('includes/footer.php');?>
    

  <script>
    function userAvailability() 
    {
      $("#loaderIcon").show();
      jQuery.ajax(
        {
          url: "check_availability.php",
          data:'regno='+$("#studentregno").val(),
          type: "POST",success:function(data)
              {
                $("#user-availability-status1").html(data);
                $("#loaderIcon").hide();
              },
          error:function ()
          {

          }
        });
    }
  </script>

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="/MDB/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/MDB/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/MDB/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/MDB/js/mdb.min.js"></script>
</body>
</html>
  <?php 
} 
  ?>
