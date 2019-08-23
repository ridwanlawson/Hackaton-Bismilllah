<?php 
	include 'koneksi.php';
	session_start();
/*	echo $_SESSION['uname'];
	echo $_SESSION['email'];
	echo $_SESSION['level'];*/
	
	$id = $_SESSION['id'];
	$nisn = $_POST['nisn'];
	$namalengkap = $_POST['nl'];
	$nik = $_POST['nik'];
	$tempat_lahir = $_POST['tl'];
	$tgl_lahir = $_POST['tgll'];
	$jekel = $_POST['jk'];
	$alar = $_POST['alar'];
	$asas = $_POST['asas'];
	$alas = $_POST['alas'];
	$ortuwa = $_POST['ortuwa'];
	$noortuwa = $_POST['noortuwa'];
	$penghasilan = $_POST['penghasilan'];
	$pilih = $_POST['pj'];
	
	if ($_SESSION['level']=='user') {
		# code...
	$query = "INSERT INTO biodata VALUES('$nisn','$namalengkap','$nik','$tempat_lahir','$tgl_lahir','$jekel','$alar','$asas','$alas','$ortuwa','$noortuwa','$penghasilan','$pilih', '$id','')";
	}else{
	$query = "INSERT INTO biodata VALUES('$nisn','$namalengkap','$nik','$tempat_lahir','$tgl_lahir','$jekel','$alar','$asas','$alas','$ortuwa','$noortuwa','$penghasilan','$pilih', '$id','validasi')";
	}
	$result = mysqli_query($conn, $query);

	$bind = $_POST['bind'];
	$bing = $_POST['bing'];
	$mtk = $_POST['mtk'];
	$ipa = $_POST['ipa'];

	$jumlah = $bind+$bing+$mtk+$ipa;
	$rata = $jumlah/4;

	$query2 = "INSERT INTO nilai VALUES('$nisn','$bind','$bing','$mtk','$ipa','$jumlah','$rata')";
	$results = mysqli_query($conn, $query2);

	if ($_SESSION['level']=='user') {
		$query4 = "UPDATE user SET status = 'pending' WHERE id = '$id'";
		$resultss = mysqli_query($conn, $query4);
	}
		
	$_SESSION['status'] = 'pending';

	if ($result&&$results) {
		# code...
		header('location:siswa.php?input=sukses');
	}else{
		// echo 'Gagal';
		header('location:siswa.php?input=gagal');
	}
 ?>