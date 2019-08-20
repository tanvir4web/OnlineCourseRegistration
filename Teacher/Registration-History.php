<?php
session_start();
error_reporting(0);
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
    <title>Registration History</title>
    
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
    <?php if($_SESSION['alogin']!="")
              {
                include('includes/menubar.php');
              }
    ?>
    <div class="content-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <hr>
            <h3 class="page-head-line text-center">Registration History</h3>
            <hr>
          </div>
          <br><br><br>
        </div>
        <div class="row">
          <div class="col-md-12">
            <!--    Bordered Table  -->
            <div class="panel panel-primary">
              <!-- /.panel-heading -->
              <div class="panel-body">
                <div class="table-responsive table-bordered text-center">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Student Name</th>
                        <th>Reg no</th>
                        <th>Course Name</th>
                        <th>Session</th>

                        <th>Semester</th>
                        <th>Registration Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

        $sql=mysqli_query($con,"select courseenrolls.course as cid, course.courseName as courname,session.session as session,department.department as dept,courseenrolls.enrollDate as edate ,semester.semester as sem,students.studentName as sname,students.StudentRegno as sregno from courseenrolls join course on course.id=courseenrolls.course join session on session.id=courseenrolls.session join department on department.id=courseenrolls.department   join semester on semester.id=courseenrolls.semester join students on students.StudentRegno=courseenrolls.studentRegno ");
        $cnt=1;
        while($row=mysqli_fetch_array($sql))
                {
            ?>

                      <tr>
                        <td><?php echo $cnt;?></td>
                        <td><?php echo htmlentities($row['sname']);?></td>
                        <td><?php echo htmlentities($row['sregno']);?></td>
                        <td><?php echo htmlentities($row['courname']);?></td>
                        <td><?php echo htmlentities($row['dept']);?></td>

                        <td><?php echo htmlentities($row['sem']);?></td>
                        <td><?php echo htmlentities($row['edate']);?></td>
                        <td>
                          <a
                            href="Print-Registration.php?id=<?php echo $row['cid']?>"
                            target="_blank"
                          >
                            <button class="btn btn-primary">
                              <i class="fa fa-print "></i> Print
                            </button>
                          </a>
                        </td>
                        <td>
                          <a>
                            <button class="btn btn-primary">
                            <i class="fas fa-check-circle"></i> Accept
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
          </div>
        </div>
      </div>
    </div>
    <br><br><br><br><br><br><br>
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
} ?>
