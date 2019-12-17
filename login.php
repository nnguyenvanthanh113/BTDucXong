<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>HR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- icheck bootstrap -->
  <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="css/hr.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


<body class="hold-transition login-page">
  <!-- code PHP -->
<?php 
  require("connect.php");
  if(isset($_POST["username"])) $username = $_POST["username"];else $username="";
  if(isset($_POST["password"])) $password = $_POST["password"];else $password="";
  if(isset($_POST['dangnhap'])) 
  { 
    if($_POST['username'] == NULL) 
    { 
      echo "<script>alert('Vui lòng nhập username');</script>";
      //echo "Please enter your username<br />"; 
    } 
    else
    { 
      $u=$_POST['username']; 
      if($_POST['password'] == NULL)
      { 
        echo "<script>alert('Vui lòng nhập password');</script>";
        //echo "Please enter your password<br />"; 
      } 
      else
      {
        $p=$_POST['password'];
        if($u && $p) 
        { 
          $sql = "SELECT * FROM quantri WHERE UserName='".$u."' AND Password='".$p."'"; 
          $result = mysqli_query($conn,$sql); 
          if(mysqli_num_rows($result) == 0) 
          { 
            echo "<script>alert('Tài khoản không có trong database.Vui lòng đăng ký !!');</script>";
            //echo "Username or password is not correct, please try again";
          }
          else
          {
            $row = mysqli_fetch_array($result);
                      
            session_start();
            $_SESSION['User'] = $u;
            $_SESSION['Quyen'] = $row['Quyen'];
            echo "<script>alert('xin chao User : ".$_SESSION['User']."');</script>";
            header("Location: index.php");
          }
        } 
      } 
    }
  } 
?>
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Đăng Nhập</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start page home</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" name="username" value="<?php echo $username;?>" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" value="<?php echo $password;?>" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div> 
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name ="dangnhap" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<!-- <script src="../../plugins/jquery/jquery.min.js"></script>
Bootstrap 4 -->
<!-- <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
<!-- AdminLTE App -->
<!-- <script src="../../dist/js/adminlte.min.js"></script>  -->

</body>
</html>
