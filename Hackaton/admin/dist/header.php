<!DOCTYPE html>
<html lang="en">
<head>
<?php 
  session_start();
  if(!isset($_SESSION['uname'])){ 
    header("location:../index.php");
  }
  include 'koneksi.php';
  include 'tes6.php';
?>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <!-- <title>Forms &rsaquo; Editor &mdash; Stisla</title> -->
  <title>Premium</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/dropzonejs/dropzone.css">
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/modules/codemirror/lib/codemirror.css">
  <link rel="stylesheet" href="assets/modules/codemirror/theme/duotone-dark.css">
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="assets/modules/prism/prism.css">
  <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
              <?php 
                  include 'koneksi.php';
                  $query = mysqli_query($conn, "SELECT * FROM pengiriman WHERE id_pengirim = '$_SESSION[id]'");
                  while ($data = mysqli_fetch_array($query)) { 
                    if ($data['status'] == "sampai" && empty($data['click'])) { ?>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                      <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-bell"></i>
                      </div>
                      <div class="dropdown-item-desc">
                        Barang Anda Telah Sampai!
                        <div class="time text-primary">2 Jam Lalu</div>
                      </div>
                    </a>
               <?php     
                  }
                }
               ?>

              <?php 
                  include 'koneksi.php';
                  $query = mysqli_query($conn, "SELECT * FROM pengiriman WHERE id_pengirim = '$_SESSION[id]'");
                  while ($data = mysqli_fetch_array($query)) { 
                    if ($data['status'] == "sampai" && empty($data['click'])) { ?>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                      <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-bell"></i>
                      </div>
                      <div class="dropdown-item-desc">
                        Cetak PO Sekarang untuk Transaksi Lanjutan!
                        <div class="time text-primary">2 Jam Lalu</div>
                      </div>
                    </a>
               <?php     
                  }
                }
               ?>

                
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">10 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">12 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">17 Hours Ago</div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">Yesterday</div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php echo $_SESSION['nama']; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <?php 
          if ($_SESSION['level']==9) {
            # code...
       ?> 
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">Premium</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">Prm</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link active" href="home.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Menus</li>
            <li><a class="nav-link active" href="index_admin.php"><i class="fas fa-archive"></i> <span>Cek Ketersediaan</span></a></li>
            <li><a class="nav-link active" href="kirim.php"><i class="fas fa-pencil-ruler"></i>  <span>Pesan Barang </span></a></li>
            <li><a class="nav-link active" href="kontrak.php"><i class="far fa-file-alt"></i> <span>Kontrak</span></a></li>
            <li><a class="nav-link active" href="keranjang.php"><i class="far fa-file-alt"></i> <span>Keranjang</span></a></li>
            <li><a class="nav-link active" href="cekstat.php"><i class="fas fa-calendar-check"></i> <span>Cek Status Pengiriman</span></a></li>
          </ul>
        </aside>
      </div>
    <?php  }elseif ($_SESSION['level']== 1) {?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">Premium</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.php">Prm</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link active" href="home_p.php"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Menus</li>
            <li><a class="nav-link active" href="approval.php"><i class="fas fa-pen-fancy"></i> <span>Approval</span></a></li>
            <li><a class="nav-link active" href="index_admin.php"><i class="fas fa-archive"></i> <span>Cek Ketersediaan</span></a></li>
<!--             <li><a class="nav-link active" href="kirim.php"><i class="fas fa-pencil-ruler"></i>  <span>Pesan Barang </span></a></li>
            <li><a class="nav-link active" href="keranjang.php"><i class="far fa-file-alt"></i> <span>Keranjang</span></a></li> -->
            <li><a class="nav-link active" href="cekstat.php"><i class="fas fa-calendar-check"></i> <span>Cek Status Pengiriman</span></a></li>
          </ul>
        </aside>
      </div>
    <?php    }
     ?>