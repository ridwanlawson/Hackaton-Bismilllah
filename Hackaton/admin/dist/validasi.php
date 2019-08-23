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
	
	$query = "UPDATE biodata SET nama = '$namalengkap', nikkk = '$nik', tempat = '$tempat_lahir', tanggal = '$tgl_lahir', jk = '$jekel', alamat_rumah = '$alar', asal_sekolah = '$asas', alamat_sekolah = '$alas', nama_ortu = '$ortuwa',  nohp_ortu = '$noortuwa', penghasilan = '$penghasilan', pilihan = '$pilih', status = 'validasi'  WHERE nisn = '$nisn'";
	$result = mysqli_query($conn, $query);

	$bind = $_POST['bind'];
	$bing = $_POST['bing'];
	$mtk = $_POST['mtk'];
	$ipa = $_POST['ipa'];

	$jumlah = $bind+$bing+$mtk+$ipa;
	$rata = $jumlah/4;
	$ratas = number_format($rata, 1);

	$query2 = "UPDATE nilai SET bind = '$bind', bing = '$bing', mtk = '$mtk', ipa = '$ipa', jumlah = '$jumlah', rata = '$ratas' WHERE nisn = '$nisn'";
	$results = mysqli_query($conn, $query2);
	
	$query4 = "UPDATE user SET status = 'validasi' WHERE email = '$_SESSION[email]'";
	$resultss = mysqli_query($conn, $query4);

	$_SESSION['status'] = 'validasi';
	
	if ($result&&$results&&$resultss) {
		# code...
		header('location:siswa.php?input=sukses');
	}else{
		// echo 'Gagal';
		header('location:siswa.php?input=gagal');
	}
 ?>