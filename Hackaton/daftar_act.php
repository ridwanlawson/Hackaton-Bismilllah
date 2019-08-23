<?php 
	include 'koneksi.php';

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$password = md5($_POST['password']);
	$today = date("j F Y, g:i a");

	$result = mysqli_query($conn, "INSERT INTO user VALUES(null,'$name','$email','$phone','$password','user','','$today')");
	if ($result) {
		header('location:login.php?daftar=sukses');
	}else{
		header('location:login.php?daftar=gagal');
	}


 ?>
