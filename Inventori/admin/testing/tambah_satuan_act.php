<?php 
include 'config.php';
$satuan = $_POST['satuan'];

$query = mysql_query("insert into satuan values('','$satuan')");
 if ($query) {
	header("location:tambah_satuan.php?pesan=oke");
 	}else{
 	header("location:tambah_satuan.php?pesan=failed");
 	}	
 

// $user=$_POST['user'];
// $foto=$_FILES['foto']['name'];

// // move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name'])or die();
// // 	mysql_query("update admin set foto='$foto' where uname='$user'");


// $u=mysql_query("select * from admin where uname='$user'");
// $us=mysql_fetch_array($u);
// if(file_exists("foto/".$us['foto'])){
// 	unlink("foto/".$us['foto']);
// 	move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
// 	mysql_query("update admin set foto='$foto' where uname='$user'");
// 	header("location:ganti_foto.php?pesan=oke");
// }else{
// 	move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
// 	mysql_query("update admin set foto='$foto' where uname='$user'");
// 	header("location:ganti_foto.php?pesan=oke");
// }
?>
