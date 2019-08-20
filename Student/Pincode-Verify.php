<?php
session_start();
include('includes/config.php');
error_reporting(0);

if(strlen($_SESSION['login'])==0)
    {   
        header('location:index.php');
    }
else
    {
    if(isset($_POST['submit']))
      {
        $sql=mysqli_query($con,"SELECT * FROM  students where pincode='".trim($_POST['pincode'])."' && StudentRegno='".$_SESSION['login']."'");
        $num=mysqli_fetch_array($sql);
      if($num>0) { $_SESSION['pcode']=$_POST['pincode'];
        header("location:Registration.php"); 
      } 
      else 
        { 
          $_SESSION['msg']="Invalid PIN Code Please Contact Your Teacher Or Input Correct PIN"; 
        } 
      } ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pincode Verification</title>
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
    
    <style>
.col-md-6 {
  margin-top: 20%;
}
</style>
    
  </head>

  <body>

    <?php 
          if($_SESSION['login']!="")
              {
                include('includes/menubar.php');
              }
    ?>


    <!---------------------------------------------------------->


      <div class="container">
     
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">

              <font color="red" align="center"
                ><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font
              >
<div class="card">
  <div class="card-body text-center">
              
                <form name="pincodeverifcontent-centery" method="post">
                  <div class="form-group">
                    <label for="pincode">Enter Pincode</label>
                    <br>
                    <input
                      type="password"
                      class="form-control"
                      id="pincode"
                      name="pincode"
                      placeholder="Pincode"
                      required
                    />
                  </div>

                  <button type="submit" name="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> Verify
                  </button>
                 
                </form>
              </div>
               </div>
            </div>
          </div>
        </div>
      </div>





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

<?php } ?>
