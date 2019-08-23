<!DOCTYPE html>
<head>
<title>PEMESANAN UD SARANA KERINCI</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="admin/web/css/style.css" rel='stylesheet' type='text/css' />
<link href="admin/web/css/style-responsive.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="admin/web/css/font.css" type="text/css"/>
<link href="admin/web/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="admin/web/js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">

<center><h2>PEMESANAN UD SARANA KERINCI</h2>
		<form action="" method="post">
			<input type="text" class="ggg" name="id_p" placeholder="ID Kedai Anda, Contoh : 1" value="<?php echo @$_POST['id_p']?>" required="">
			<input type="text" class="ggg" name="uname" placeholder="Nama Kedai Anda, Contoh : UD Sejahtera" value="<?php echo @$_POST['uname']?>" required="">
<!-- 			<input type="password" class="ggg" name="pass" placeholder="PASSWORD" required=""> -->
			<?php
			include "admin/testing/config.php";
			if (isset($_POST['tampil'])) {
				# code...
				$idp = $_POST['id_p'];
				$Kedai = $_POST['uname'];
				$query = mysql_query("SELECT * FROM pelanggan Where nm_plg = '$Kedai' or  id_plg = '$idp'") or die(mysql_error());
				$data = mysql_fetch_array($query);
				if(!empty($data)){?>
				<div class="clearfix"></div>
				 <input type="hidden" class="form-control" value="<?php echo $data[0] ?>" name="kode">
				 <input type="hidden" class="form-control" value="<?php echo $data[3] ?>" name="nohp">
				<div class="clearfix"></div>
				 <select name="sales" class="form-control">
				 	<option>Pilih Sales</option>
				 	<?php
				 	$sales = mysql_query("SELECT * FROM admin where level = 'Sales'");
				 	while ($datasales = mysql_fetch_array($sales)) {
				 	echo "<option>".ucwords($datasales[1])."</option>";				 		
				 	}
					?>				 
				 </select>
				 <input type="text" class="ggg" name="pesanan" placeholder="Isi Pesanan, Contoh : 100 Karton Padiman Coklat"> 
				<div class="clearfix"></div>
				<input type="submit" value="Pesan" name="pesan">
		<?php	}else{
				echo "Maaf.. Mohon Hubungi Sales Kami Jika Anda Belum Terdaftar sebagai Pelanggan";
				echo " Hubungi.. 081270389862 (Dadang)<br>";
				echo "<a href=index.php>Klik Untuk Cek Lagi</a>";
				}
} ?>
				<div class="clearfix"></div>
				<?php 
				if (!empty($_POST['uname'])) {
				// echo  "<input type=submit value=Tampilkan Data name=pesan>";
				}else{
				echo  "<input type=submit value='Mulai Memesan' name=tampil>";
				}

				if (isset($_POST['pesan'])) {
					# code...
					$kode = $_POST['kode'];
					$nama = $_POST['uname'];
					$nohp = $_POST['nohp'];
					$sales = strtolower($_POST['sales']);
					$pesanan = $_POST['pesanan'];
					$tgl = date('d-m-Y');

					$masuk = mysql_query("INSERT INTO pesanan values(null, '$nama','$sales', '$pesanan', '$nohp', '$tgl')");
					if ($masuk) {
					 	# code...
					 			header("location:index.php?hasilpesanan=sukses");

					 			echo "<script>alert('Sukses Memesan, Mohon Untuk Konfirmasi Ulang Jika dihubungi oleh Sales !');</script>";
					 }else{

					 			header("location:index.php?hasilpesanan=gagal");

					 			echo "<script>alert('Gagal Memesan, Mohon diulangi !');</script>";

					 } 
				}

				?>
				
		</form>
				<?php
					if (@$_GET['hasilpesanan']=="sukses") {
			 			echo "<script>alert('Sukses Memesan, Mohon Untuk Konfirmasi Ulang Jika dihubungi oleh Sales !');</script>";
			 			echo 'Sukses Memesan, Mohon Untuk Konfirmasi Ulang Jika dihubungi oleh Sales.. Pemesanan Ulang <a href=index.php> Klik !</a>';
						}elseif (@$_GET['hasilpesanan']=="gagal") {
							# code...
			 			echo "<script>alert('Gagal Memesan, Mohon diulangi !');</script>";
			 			echo 'Gagal Memesan, Mohon diulangi <a href=index.php> Klik !</a>';
						}	
				?>

</center>	
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h3 align="center">Stok Gudang</h3>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th>Nama Barang</th>
                            <th>Harga Beli</th>
                            <th>Jumlah</th>
                            <th>Jenis Barang</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                          $brg=mysql_query("select barang_masuk.*, barang.id_brg, barang.nm_brg from barang_masuk, barang where barang_masuk.id_brg = barang.id_brg GROUP BY barang_masuk.id_brg, barang_masuk.letak_brg") or die(mysql_error());
                          $no=1;
                          while($b=mysql_fetch_array($brg)){
                            ?>                                 
                          <tr>
                            <td><?php echo $b['nm_brg'] ?></td>
                            <td><?php echo $b['harga_beli'] ?></td>
                            <td><?php echo $b['sisa'] ?></td>
                            <td><?php echo $b['satuan'] ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

</div>
<script src="admin/web/js/bootstrap.js"></script>
<script src="admin/web/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="admin/web/js/scripts.js"></script>
<script src="admin/web/js/jquery.slimscroll.js"></script>
<script src="admin/web/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="admin/web/js/jquery.scrollTo.js"></script>
</body>
</html>
