<?php
session_start();
include('includes/config.php');

  if(strlen($_SESSION['alogin'])==0)
    {   
      header('location:index.php');
    }
  else
    {
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <title>Registrtation History</title>
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
            <h3 class="page-head-line text-center">Students Logs</h3>
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">

            <div class="panel panel-primary">
              <div class="panel-heading text-center">
                Cheack Students Log History
              </div>

              <div class="panel-body">
                <div class="table-responsive table-bordered">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>

                        <th>Student Reg no</th>
                        <th>IP</th>
                        <th>Login Time</th>

                        <th>Logout Time</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
  <?php
        $sql=mysqli_query($con,"select * from userlog");
        $cnt='1';
        while($row=mysqli_fetch_array($sql))
            {
  ?>
                      <tr>
                        <td><?php echo $cnt;?></td>
                        <td>
                          <?php echo htmlentities($row['studentRegno']);?>
                        </td>
                        <td><?php echo htmlentities($row['userip']);?></td>
                        <td><?php echo htmlentities($row['loginTime']);?></td>
                        <td><?php echo htmlentities($row['logout']);?></td>
                        <td><?php echo htmlentities($row['status']);?></td>
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
    <!-- CONTENT-WRAPPER SECTION END-->
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

  <?php 
} 
  ?>
