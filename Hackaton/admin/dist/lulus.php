<?php
	if (isset($_POST['lulus'])) {
	 	# code...
	
	include 'koneksi.php';
	
	$id = $_POST['id'];
	$jp = $_POST['jp'];

	echo $id.'<br>'.$jp;
	
	$query = mysqli_query($conn, "UPDATE biodata SET pilihan = '$jp', status = 'Lulus' WHERE nisn = '$id'");
	if ($query) {
		# code...
	header('location:index_admin.php?input=sukses');
	}else{
	header('location:index_admin.php?input=gagal');
	}
 
  } 
 ?>
