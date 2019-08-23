<?php 
include 'koneksi.php';
$id=$_GET['id'];
$query = mysqli_query($conn, "delete from biodata where nisn='$id'");
$query1 = mysqli_query($conn, "delete from nilai where nisn='$id'");
if ($query&&$query1) {
	header("location:jurusan_h.php?input=sukses&id=$id");
}else{
	header("location:jurusan_h.php?input=gagal&id=$id");
}

?>