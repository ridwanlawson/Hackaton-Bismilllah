<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from pesanan where id_pesanan='$id'");
header("location:pesanan.php");

?>