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
                    $sesssion=$_POST['sesssion'];
                    $ret=mysqli_query($con,"insert into session(session) values('$sesssion')");
                    if($ret)
                        {   
                            $_SESSION['msg']="Session Created Successfully !!";
                        }
                    else
                        {
                            $_SESSION['msg']="Error : Session not created";
                        }
                }
            
            if(isset($_GET['del']))
                {
                    mysqli_query($con,"delete from session where id = '".$_GET['id']."'");
                    $_SESSION['delmsg']="Session Deleted !!";
                }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Teacher | Session</title>
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
                        <h3 class="page-head-line text-center">Sessions  </h3>
                        <hr>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                        <div class="panel-heading text-center">
                           Add Sessions
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="session" method="post">
   <div class="form-group">

    <input type="text" class="form-control" id="sesssion" name="sesssion" placeholder="Example : 2019" />
  </div>
 <button type="submit" name="submit" class="btn btn-primary"><i class="far fa-check-circle"></i> Submit</button>
</form>
        </div>
    </div>
</div> 
          </div>
                <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
               <br><br>
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
                                            <th>Session</th>
                                            <th>Creation Date & Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
    $sql=mysqli_query($con,"select * from session");
    $cnt=1;
    while($row=mysqli_fetch_array($sql))
        {
?>

            <tr>
                <td><?php echo $cnt;?></td>
                <td><?php echo htmlentities($row['session']);?></td>
                <td><?php echo htmlentities($row['creationDate']);?></td>
                <td>
                    <a href="Add-Session.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are You Sure To Delete This Session?')">
                       <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>  Delete </button>
                    </a>
                </td>
            </tr>
<?php 
    $cnt++;
} 
?>                                        
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
    <?php 
}   ?>
