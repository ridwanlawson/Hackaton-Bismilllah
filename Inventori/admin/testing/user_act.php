<?php 
include 'config.php';
$tglk=$_POST['nm_plg'];
$tglm=md5($_POST['pass']);
$lvl=$_POST['lvl'];

$query = mysql_query("insert into admin values(null,'$tglk','$tglm', '$lvl')") or die(mysql_error());
if ($query) {
	# code...
	header("location:user.php?input=sukses");
}else{
	header("location:user.php?input=gagal");
}


 ?>