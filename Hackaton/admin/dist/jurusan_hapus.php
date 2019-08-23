<?php 
include 'koneksi.php';
$id=$_GET['id'];
$query = mysqli_query($conn, "delete from jurusan where id='$id'");
if ($query) {
	header("location:jurusan_h.php?input=sukses&id=$id");
}else{
	header("location:jurusan_h.php?input=gagal&id=$id");
}

?>