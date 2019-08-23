<?php 
session_start();
include 'testing/config.php';
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$pas=md5($pass);
$query=mysql_query("select * from admin where uname='$uname' and pass='$pas'")or die(mysql_error());
if(mysql_num_rows($query)==1){
	$row = mysql_fetch_assoc($query);
	if($row['level'] == "Admin"){
		$_SESSION['uname']=$uname;
		$_SESSION['level']=$_row['level'];
		echo $_SESSION['level'];
			echo '<script language="javascript">window.location="testing/index.php";</script>';
// 		 header("location:testing/index.php");
	 }elseif ($row['level'] == "Sales") {
		$_SESSION['uname']=$uname;
		$_SESSION['level']=$_row['level'];
			echo '<script language="javascript">window.location="testing/index.php";</script>';
// 		header("location:testing/index.php");

	}else{
		$_SESSION['uname']=$uname;
		$_SESSION['level']=$_row['level'];
			echo '<script language="javascript">window.location="testing/index.php";</script>';
// 		header("location:testing/index.php");
	}
}else{
    	echo '<script language="javascript">window.location="index.php?pesan=gagal";</script>';
    // 	header("location:index.php?pesan=gagal")or die(mysql_error());
	// mysql_error();
}
// echo $pas;
 ?>