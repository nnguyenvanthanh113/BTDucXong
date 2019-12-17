
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/hr.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <?php 
  require("connect.php");
    session_start();
  ?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" style="width:130px;">
        <a href="login.php" class="nav-link">Đăng Nhập</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block" style="width:130px;">
        <a href="register.php" class="nav-link">Đăng Kí</a>
      </li>
      <?php
                    if(isset($_SESSION['User']))
                    {
                ?>
                    <li class="nav-item d-none d-sm-inline-block" style="width:130px;">
                         <a href="logout.php" class="nav-link">Đăng xuất</a>
                    </li>
                <?php    
                    }

                ?>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="index3.html" class="brand-link">
      <img src="img/duc.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">HR</span>
    </a> -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <?php
                                if(isset($_SESSION['User']))
                                {
                                    $user = $_SESSION['User'];
                                     $sql = "select nhanvien.HinhAnh from nhanvien
                                                    join quantri on nhanvien.Id = quantri.Id
                                                    where quantri.UserName = '$user'";
                                        
                                      $result = mysqli_query($conn,$sql) or die('could not seclect');
                                      if(mysqli_num_rows($result)==0)
                                        echo "Chua co hinh anh nhan vien";
                                      else
                                      {
                                        while ($row = mysqli_fetch_array($result))
                                        {
                                          $hinhanh = $row['HinhAnh'];
                                        }
                                      }
                            ?>
                                <img src="img/<?php echo $hinhanh;?>" class="img-circle elevation-2" alt="User Image">
                            <?php          

                                }
                            ?>
        </div>
        <div class="info">
           <a href="index.php" class="d-block"><?php if(isset($_SESSION['User'])) echo $_SESSION['User']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Lịch Công Tác
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo Đơn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sửa Đơn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xóa Đơn</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-address-card"></i>  
              <p>
                Nghỉ Phép
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="create_np.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo Đơn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sửa Đơn</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Xóa Đơn</p>
                </a>
              </li>
              
            </ul>
          </li>
          <?php 
                      if(isset($_SESSION['User']) && $_SESSION['Quyen'] == "admin")
                      {


                        ?>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Quản Lý
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="quanly.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thông tin </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="lichnghinhanvien.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lịch nghỉ nhân viên  </p>
                                    </a>
                                </li>
                               <!--  <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Xóa </p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>     
                        <?php 
                                }
                        ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->

  </aside>
<!-- code php -->
<?php 
  

  if(isset($_POST['ngaydi'])) $ngaydi=$_POST['ngaydi'];else $ngaydi="";
  if(isset($_POST['ngayve'])) $ngayve=$_POST['ngayve'];else $ngayve="";
  if(isset($_POST['noicongtac'])) $noicongtac=$_POST['noicongtac'];else $noicongtac="";
  if(isset($_POST['phuongtien'])) $phuongtien=$_POST['phuongtien'];else $phuongtien="";
  if(isset($_POST['noidung'])) $noidung=$_POST['noidung'];else $noidung="";
  if(isset($_POST['send']))
  {
    $sql = "select nhanvien.HoTen,nhanvien.MaNV from nhanvien
                          join quantri on nhanvien.Id = quantri.Id
                          where quantri.UserName = '".$_SESSION['User']."'";
                    
      $result = mysqli_query($conn,$sql) or die('could not seclect');
      if(mysqli_num_rows($result)==0)
        echo "Chua co du lieu";
      else
      {
        while ($row = mysqli_fetch_array($result))
        {
          $manv = $row['MaNV'];
          $hoten = $row['HoTen'];
        }
      }

      //lay ma id tu dong tang o bang lich nghi
      $sqll = "SELECT * FROM lichcongtac ORDER BY Id DESC LIMIT 1";
      $result = mysqli_query($conn, $sqll);
      $row = mysqli_fetch_array($result);
      $mamax = (int)substr($row['Id'],2);
      $mamax++;
      $length = strlen((string)$mamax);
      $maId = "Id";
      for ($i = 1; $i <= 3-$length; $i++)
        $maId .= "0";
      $maId .= $mamax;


      //echo "<script>alert('$maId');</script>";

      //Insert lich nghi vao table
      $sqli = "INSERT INTO lichcongtac(Id,MaNV,TenNV,NgayDi,NgayVe,NoiCongTac,PhuongTienDiChuyen,NoiDung)
                VALUES('$maId','$manv','$hoten','$ngaydi','$ngayve','$noicongtac','$phuongtien','$noidung')";
      if (mysqli_query($conn, $sqli))
            {
              echo "<script>alert('Thêm lịch công tác thành công')</script>";           
            }
            else
              echo "<script>alert('Thêm lịch công tác thất bại')</script>";
  }
?>

  <!-- /.control-sidebar -->
  <div class="content-wrapper">          
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-12">
                    <h1 class="m-0 text-dark">QUẢN LÍ LỊCH CÔNG TÁC NHÂN VIÊN</h1>
                  </div>
                </div>
              </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12  col-sx-12">
                          <form action="#" method="post">
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ngày đi</label>
                                <div class="col-sm-4">
                                  <input type="date" class="form-control" name="ngaydi" required="required">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Ngày về</label>
                                <div class="col-sm-4">
                                  <input type="date" class="form-control" name="ngayve" required="required">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nơi công tác</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="noicongtac" placeholder="nơi công tác" required="required">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Phương tiện di chuyển</label>
                                <div class="col-sm-4">
                                  <input type="text" class="form-control" name="phuongtien" placeholder="phương tiện di chuyển" required="required">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung</label>
                                <div class="col-sm-4">
                                   <div class="form-group">
                                        <textarea class="form-control rounded-0" name="noidung" rows="3" required="required"></textarea>
                                   </div>
                                </div>
                              </div>
                              <div class="form-group row">
                                  <div class="col-2">
                                    <button type="submit" name="send" class="btn btn-primary btn-block">Send</button>
                                  </div>
                              </div>
                          </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
