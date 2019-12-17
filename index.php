<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="css/hr.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-interaction/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-bootstrap/main.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    <!-- code PHP -->
    <?php 
        require("connect.php");
         session_start();
         //session_destroy();
         //var_dump($_SESSION['User']);
         //session_destroy();
         if(isset($_SESSION['User']))
         {


    ?>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">                
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
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">      
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Lịch Công Tác
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="create_lct.php" class="nav-link">
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
                                <!-- <li class="nav-item">
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
            </div>
        </aside>
        <aside class="control-sidebar control-sidebar-dark">

        </aside>
        <div class="content-wrapper">          
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-12">
                    <h1 class="m-0 text-dark">QUẢN LÍ LỊCH NGHỈ NHÂN VIÊN</h1>
                  </div>
                </div>
              </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sx-12">
                           <!--  <div class="row"> -->
                                <div class="card card-primary">
                                    <div class="card-body p-0">
                                        <div id="calendar" class="calendar"></div>
                                    </div>
                                </div>  
                            <!-- </div> -->
                           <!--  <div class="row">
                                Thông báo !
                            </div>  -->                 
                        </div>
                        <div class="col-lg-6 col-md-12  col-sx-12 infor">
                            <div class="row image">
                                <?php 
                                    if(isset($_SESSION['User']))
                                    {
                                ?>
                                    <img src="img/<?php echo $hinhanh; ?>"  alt="" width="100px" height="100px">
                                <?php 
                                    }
                                 ?>
                                
                            </div>
                            <div class="row">
                                <?php
                                    
                                    if(isset($_SESSION['User']))
                                    {
                                        $user = $_SESSION['User'];
                                         $sql = "select nhanvien.HoTen,nhanvien.MaNV,quantri.Quyen from nhanvien
													join quantri on nhanvien.Id = quantri.Id
													where quantri.UserName = '$user'";
										
									  $result = mysqli_query($conn,$sql) or die('could not seclect');
									  if(mysqli_num_rows($result)==0)
											echo "Chua co du lieu";
									  else
										{
											echo "<table>";
											while ($row = mysqli_fetch_array($result))
											{
												?>
												<table>
                                                <tr>
                                                    <td>Mã nhân viên :</td>
                                                    <td><?php echo "{$row['MaNV']}"; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Họ tên :</td>
                                                    <td><?php echo "{$row['HoTen']}"; ?></td>
                                                </tr>
                                                 <tr>
                                                    <td>Quyền :</td>
                                                    <td><?php echo "{$row['Quyen']}"; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email :</td>
                                                    <td><?php echo $_SESSION['User']; ?></td>
                                                </tr>
                                            </table>
												<?php
												/*echo "<tr>
														<td>Mã nhân viên :</td>
														<td>{$row['MaNV']}</td>
													 </tr>
													 <tr>
														<td>Họ tên :</td>
														<td>{$row['HoTen']}</td>
													 </tr>
													 <tr>
														<td>Quyền :</td>
														<td>{$row['Quyen']}</td>
													 </tr>
													 <tr>
														<td>Gmail :</td>
														<td>{$_SESSION['User']}</td>
													 </tr>";*/
											}
											echo "</table>";
										}
									}
                                    else
                                    {
                                        echo "<marquee>Xin chao !!</marquee>";
                                    }
                                ?>

                                
                            </div>
                        </div>
                    </div>


                    <div class="row dl-none">                       
                        <div id="sparkline-1"></div>Thông báo !<br>
                        <div id="sparkline-2"></div>
                        <?php
                            $date = getdate();
                            $ngayhientai = $date['year']."/".$date['mon']."/".$date['mday'];
                            //echo $ngayhientai;

                            $sqll="SELECT lichnghi.SoNgayNghi,lichnghi.LyDo,lichnghi.ChoPhepNghi FROM lichnghi
                                    JOIN nhanvien ON lichnghi.MaNV = nhanvien.MaNV
                                    JOIN quantri ON nhanvien.Id = quantri.Id
                                    WHERE quantri.UserName='".$_SESSION['User']."' AND lichnghi.NgayNghi = '".$ngayhientai."'";
                            $result = mysqli_query($conn,$sqll) or die('could not seclect');
                              if(mysqli_num_rows($result)==0)
                               {
                                 //echo "<script>alert('ko co du lieu');</script>";
                                 $songaynghi = '';
                                 $lydo = '';
                                 $chophepnghi = '';
                               }
                               else
                               {
                                    //echo "<script>alert(' co du lieu');</script>";
                                    $row = mysqli_fetch_array($result);
                                    //var_dump($row);
                                        if(empty($row['songaynghi']) == '')
                                        {   
                                                //echo "<script>alert('ko');</script>";
                                                $songaynghi = '';
                                                $lydo = '';
                                                $chophepnghi = '';
                                                //$thongbao = "không có lịch nghỉ ngày hôm nay !!";
                                         }     
                                        else if(empty($row['songaynghi']) != '')
                                        {
                                           //echo "<script>alert('co');</script>";
                                           $songaynghi = $row['SoNgayNghi'];
                                           $lydo = $row['LyDo'];
                                           $chophepnghi = $row['ChoPhepNghi'];
                                        }
                                            
                                        
                               }
                               // if(isset($songaynghi))
                               //      echo "<script>alert('co');</script>";
                               //  else
                               //       echo "<script>alert('ko');</script>";
                                if($chophepnghi=='yes')
                                {
                                        echo "<div style='color:red'>CHO PHÉP NGHỈ</div>";
                                ?>
                                 <div id="sparkline-3"></div><?php   echo "số ngày xin nghỉ :".$songaynghi."<br>";
                                                            echo "lý do :".$lydo."<br>";
                                                            
                                                    ?>
                                <?php

                                }
                                else if($chophepnghi=='')
                                        echo "<div style='color:red'>Chưa xin nghỉ !</div>";
                                else if($chophepnghi=='no')
                                {
                                     echo "<div style='color:red'>KHÔNG CHO NGHỈ</div>";

                                ?>
                                    <div id="sparkline-3"></div><?php   echo "số ngày xin nghỉ :".$songaynghi."<br>";
                                                            echo "lý do :".$lydo."<br>";
                                                                    ?>
                                <?php
                                }
                        ?>
                        <div id="sparkline-3"></div>
                       
                     
                    </div>
                    <!-- <div class="row">
                            sdaaaaaaaaaaa
                    </div> -->
                </div>
            </section>
        </div>


    </div>
    <?php 
        }
        else
        {
            header('Location:login.php');
        }
    ?>









    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="plugins/sparklines/sparkline.js"></script>
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="dist/js/demo.js"></script>
</body>
</html>
