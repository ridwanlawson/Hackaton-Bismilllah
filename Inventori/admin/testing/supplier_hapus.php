<?php 
include 'config.php';
$id=$_GET['id'];
mysql_query("delete from supplier where id_sup='$id'");
header("location:supplier1.php");

?>