<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from pelanggan where id_plg='$id'");
header("location:pelanggan1.php");

?>