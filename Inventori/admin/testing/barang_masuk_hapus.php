<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from barang where id_brg='$id'");
header("location:barang1.php");

?>