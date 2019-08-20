<?php
session_start();
include('includes/config.php');

  if(strlen($_SESSION['alogin'])==0)
    {   
      header('location:index.php');
    }
  else{
      if(isset($_POST['submit']))
        {
          $sql=mysqli_query($con,"SELECT password FROM  admin where password='".md5($_POST['cpass'])."' && username='".$_SESSION['alogin']."'");
          $num=mysqli_fetch_array($sql);
          if($num>0) 
            { 
              $con=mysqli_query($con,"update admin set password='".md5($_POST['newpass'])."', updationDate='$currentTime' where username='".$_SESSION['alogin']."'"); $_SESSION['msg']="Password Changed Successfully !!"; } else { $_SESSION['msg']="Old Password not match !!"; 
            } 
        } 
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <title>Teacher | Change Password</title>
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

  <script type="text/javascript">
    function valid() {
      if (document.chngpwd.cpass.value == "") {
        alert("Current Password Filed is Empty !!");
        document.chngpwd.cpass.focus();
        return false;
      } else if (document.chngpwd.newpass.value == "") {
        alert("New Password Filed is Empty !!");
        document.chngpwd.newpass.focus();
        return false;
      } else if (document.chngpwd.cnfpass.value == "") {
        alert("Confirm Password Filed is Empty !!");
        document.chngpwd.cnfpass.focus();
        return false;
      } else if (
        document.chngpwd.newpass.value != document.chngpwd.cnfpass.value
      ) {
        alert("Password and Confirm Password Field do not match  !!");
        document.chngpwd.cnfpass.focus();
        return false;
      }
      return true;
    }
  </script>

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
            <h3 class="page-head-line text-center">Change Password</h3>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading text-center">
                Changing Your password
              </div>
              <font color="green" align="center"
                ><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font
              >

              <div class="panel-body">
                <form name="chngpwd" method="post" onSubmit="return valid();">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="exampleInputPassword1"
                      name="cpass"
                      placeholder="Enter Current Password"
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="exampleInputPassword2"
                      name="newpass"
                      placeholder="Enter New Password"
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="exampleInputPassword3"
                      name="cnfpass"
                      placeholder="Enter New Password Again"
                    />
                  </div>

                  <button type="submit" name="submit" class="btn btn-primary"><i class="far fa-check-circle"></i>  Submit
                  </button>
                  <hr />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include('includes/footer.php');?>

    
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
<?php } 
?>
