<?php
session_start();
include('includes/config.php');
error_reporting(0);

  if(strlen($_SESSION['alogin'])==0)
      {   
        header('location:index.php');
      }
  else
      {
        if(isset($_GET['del']))
            {
              mysqli_query($con,"delete from students where StudentRegno = '".$_GET['id']."'");
              $_SESSION['delmsg']="Student record deleted !!";
            }
        if(isset($_GET['pass']))
            {
              $password="Tanvir4x";
              $newpass=md5($password);
              mysqli_query($con,"update students set password='$newpass' where StudentRegno = '".$_GET['id']."'");
              $_SESSION['delmsg']="Password Reset,New Password is ' Tanvir4x '";
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
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Teacher | Manage Student</title>
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
            <h3 class="page-head-line text-center">Manage Students</h3>
            <hr>
          </div>
        </div>
        <br><br><br>

        <div class="row">
          <font color="red" align="center"
            ><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font
          >
          
          <div class="col-md-12">
            <!--    Bordered Table  -->
            <div class="panel panel-primary">
              <div class="panel-body">
                <div class="table-responsive table-bordered text-center">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Pincode</th>
                        <th>Reg Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      
<?php
    $sql=mysqli_query($con,"select * from students");
    $cnt=1;
    while($row=mysqli_fetch_array($sql))
        {
?>

                      <tr>
                        <td><?php echo $cnt;?></td>
                        <td>
                          <?php echo htmlentities($row['StudentRegno']);?>
                        </td>
                        <td><?php echo htmlentities($row['studentName']);?></td>
                        <td><?php echo htmlentities($row['pincode']);?></td>
                        <td>
                          <?php echo htmlentities($row['creationdate']);?>
                        </td>
                        <td>
                          <a
                            href="Edit-StudentProfile.php?id=<?php echo $row['StudentRegno']?>"
                          >
                            <button class="btn btn-primary">
                              <i class="fa fa-edit "></i> Edit
                            </button>
                          </a>
                          <a
                            href="Manage-Students.php?id=<?php echo $row['StudentRegno']?>&del=delete"
                            onClick="return confirm('Are You Sure To Delete Student Account?')"
                          >
                            <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>  Delete</button>
                          </a>
                          <a
                            href="Manage-Students.php?id=<?php echo $row['StudentRegno']?>&pass=update"
                            onClick="return confirm('Are You Sure To Reset Password?')"
                          >
                            <button
                              type="submit"
                              name="submit"
                              id="submit"
                              class="btn btn-primary"
                            ><i class="fas fa-history"></i> Reset Password
                            </button>
                          </a>
                        </td>
                      </tr>
<?php 
      $cnt++;
} ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!--  End  Bordered Table  -->
          </div>
        </div>
      </div>
    </div>

<br><br><br><br>
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
<?php } ?>
