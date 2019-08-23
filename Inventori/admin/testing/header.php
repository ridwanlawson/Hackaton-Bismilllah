<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
  session_start();
  date_default_timezone_set('Asia/Jakarta');
  include 'cek.php';
  include 'config.php';
  ?>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>UD SARANA KERINCI</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="assets/modules/jquery-selectric/selectric.css">
    <!-- CSS Libraries -->
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
          </ul>
          
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="barang_masuk_tambah.php">Tambah Barang Masuk</a>
                </div>
              </div>

              <div class="dropdown-list-content dropdown-list-icons">
                  
                <?php
                
                  $isi = mysql_query("SELECT COUNT(id_pesanan) FROM pesanan");
                  $datas = mysql_fetch_array($isi);
                  if ($datas[0]>0) {
                    # code...
                    echo "<a href='pesanan.php' class='dropdown-item'>
                  <div class='dropdown-item-icon bg-info text-white'>
                    <i class='fas fa-bell'></i>
                  </div>
                  <div class='dropdown-item-desc'>
                      Pesanan Masuk!! Mohon di Cek 
                    <div class='time'>Yesterday</div>
                  </div>
                </a>";
                  }
                
                  // $totals_brg_msk = mysql_query("SELECT SUM(jumlah) as total_brg_msk from barang_masuk GROUP BY id_brg");
                  // while ($total = mysql_fetch_array($totals_brg_msk)) {
                  //   # code...

                  // }

                  $periksa=mysql_query("select barang_masuk.*, barang.id_brg, barang.nm_brg from barang_masuk, barang where sisa <=100 and barang_masuk.id_brg = barang.id_brg GROUP BY barang_masuk.id_brg, barang_masuk.letak_brg");
                  while($q=mysql_fetch_array($periksa)){  
                    if($q['sisa']<=100){      
                     echo "<a href='#' class='dropdown-item'>
                  <div class='dropdown-item-icon bg-info text-white'>
                    <i class='fas fa-bell'></i>
                  </div>
                  <div class='dropdown-item-desc'>
                      Warning!! <b>". $q['nm_brg']."</b> yang tersisa kurang dari <b>100</b> $q[satuan];
                    <div class='time'>Yesterday</div>
                  </div>
                </a>"; 
                       }
                  }
                ?>
              </div>


<!--  
              <div class="dropdown-footer text-center">
                <a href="barang_tambah.php">Tambah Barang Masuk<i class="fas fa-chevron-right"></i></a>
              </div> -->
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?php $uname = $_SESSION['uname']; echo ucwords($uname);  ?>
            <?php 
                $query=mysql_query("select * from admin where uname='$uname' ")or die(mysql_error());
                $row = mysql_fetch_assoc($query);
                  $level = $row['level'];
                  echo " as ".$level;  
            ?></div></a>
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
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.php">UD SARANA KERINCI</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <!-- <a href="index.html">St</a> -->
          </div>
          <?php if ($level == "Admin") {
            # code...
           ?>
          <ul class="sidebar-menu">
            <li class="menu-header">Beranda</li>
            <li><a class="nav-link" href="index.php"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
            <li class="menu-header">Entri Data</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Entri Data</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="user.php">Pengguna</a></li>
                <li><a class="nav-link" href="pelanggan_tambah.php">Pelanggan</a></li>
                <li><a class="nav-link" href="supplier_tambah.php">Supplier</a></li>
                <li><a class="nav-link" href="barang_tambah.php">Barang</a></li>
              </ul>
            </li>
            <li class="menu-header">Transaksi</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Transaksi</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="barang_masuk_tambah.php">Barang Masuk</a></li>
                <li><a class="nav-link" href="penjualan_tambah.php">Penjualan</a></li>
              </ul>
            </li>
            <li class="menu-header">Laporan</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Laporan</span></a>
              <ul class="dropdown-menu">
                <!--<li><a class="nav-link" href="pesanan.php">Pesanan Masuk</a></li>-->
                <li><a class="nav-link" href="barang1.php">Daftar Barang</a></li>
                <li><a class="nav-link" href="pelanggan1.php">Pelanggan</a></li>
                <li><a class="nav-link" href="supplier1.php">Supplier</a></li>
                <li><a class="nav-link" href="barang_masuk.php">Barang Masuk</a></li>
                <li><a class="nav-link" href="barang_keluar.php">Barang Terjual</a></li>
                <li><a class="nav-link" href="stok.php">Stok Barang</a></li>
                <li><a class="nav-link" href="faktur_view.php">Faktur</a></li>
              </ul>
            </li>
            
             <li><a class="nav-link" href="logout.php"><i class="fas fa-pencil-ruler"></i> <span>Logout</span></a></li>
          </ul>
        <?php }elseif ($level == "Pimpinan") {
?>          <ul class="sidebar-menu">
              <li class="menu-header">Beranda</li>
              <li><a class="nav-link" href="index.php"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
              <li class="menu-header">Laporan</li>
              <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Laporan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="barang1.php">Daftar Barang</a></li>
                  <li><a class="nav-link" href="pelanggan1.php">Pelanggan</a></li>
                  <li><a class="nav-link" href="supplier1.php">Supplier</a></li>
                  <li><a class="nav-link" href="barang_masuk.php">Barang Masuk</a></li>
                  <li><a class="nav-link" href="barang_keluar.php">Barang Terjual</a></li>
                  <li><a class="nav-link" href="stok.php">Stok Barang</a></li>
                </ul>
              </li>
              
               <li><a class="nav-link" href="logout.php"><i class="fas fa-pencil-ruler"></i> <span>Logout</span></a></li>
            </ul>

<?php
        }elseif ($level == "Sales") {
?>          <ul class="sidebar-menu">
                <li class="menu-header">Beranda</li>
                <li><a class="nav-link" href="index.php"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
                <li class="menu-header">Transaksi</li>
                <li class="dropdown">
                  <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Transaksi</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="penjualan_tambah.php">Penjualan</a></li>
                  </ul>
                </li>
                <li class="menu-header">Laporan</li>
                <li class="dropdown">
                  <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Laporan</span></a>
                  <ul class="dropdown-menu">
                    <li><a class="nav-link" href="pesanan.php">Pesanan Masuk</a></li>
                    <li><a class="nav-link" href="barang1.php">Daftar Barang</a></li>
                    <li><a class="nav-link" href="stok.php">Stok Barang</a></li>
                  </ul>
                </li>
                
                 <li><a class="nav-link" href="logout.php"><i class="fas fa-pencil-ruler"></i> <span>Logout</span></a></li>
            </ul>
 <?php       }else { ?>
                <li class="menu-header">Beranda</li>
                <li><a class="nav-link" href="index.php"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
       <?php } ?>

          <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <!-- <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
              <i class="fas fa-rocket"></i> Documentation
            </a> -->
          </div>        </aside>
      </div>
