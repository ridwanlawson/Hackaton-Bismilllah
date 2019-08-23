<?php
	
	include 'koneksi.php';

	$jurusan = $_POST['jurusan'];
	$results = mysqli_query($conn, "INSERT INTO jurusan VALUES(null,'$jurusan')");
	if ($results) {
		header('location:jurusan.php?input=sukses');
	}else{
		header('location:jurusan.php?input=gagal');
	}

?>