<?php
session_start();
error_reporting(0);
include("includes/config.php");

  if(isset($_POST['submit']))
      {
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $query=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
        $num=mysqli_fetch_array($query);

        if($num>0) 
            { $extra = "Manage-Students.php";
              $_SESSION['alogin'] = $_POST['username']; 
              $_SESSION['id'] = $num['id'];
              $host = $_SERVER['HTTP_HOST']; 
              $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
              header("location: http://$host$uri/$extra"); 
              exit(); 
            }

        else 
            { $_SESSION ['errmsg'] = "Invalid username or password"; 
              $extra = "index.php"; 
              $host = $_SERVER['HTTP_HOST']; 
              $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
              header("location:http://$host$uri/$extra"); 
              exit(); 
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
    <title>Teacher's Login</title>
    <link href="../MDB/LoginUI/bootstrap.min.css" rel="stylesheet" />
    <link href="../MDB/LoginUI/all.css" rel="stylesheet" />
    <link href="../MDB/LoginUI/LoginStyle.css" rel="stylesheet" />
  </head>

</style>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
             
            <h5 class="card-title text-center">Teacher's Login</h5>
            <hr>
            <br>
            <form method="post" class="form-signin">
              <div class="form-label-group">
                <input name="username" type="text" id="inputEmail" class="form-control" placeholder="Username" required autofocus>
                <label for="inputEmail">ID</label>
              </div>
<br>
              <div class="form-label-group">
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>
<br>
              <button  name="submit" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
              <br>
                 <script src="../MDB/LoginUI/bootstrap.bundle.min.js"></script>
                 <script src="../MDB/LoginUI/jquery.slim.min.js"></script>
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
