<?php include("../conn.php");
session_start();
$query="select * from tbl_user where UserName='".$_POST['UserName']."' AND Password='".md5($_POST['Password'])."'";
$result=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);
if(mysql_num_rows($result)==1) {
echo "<script>location.replace('home.php')</script>";
}
else {
	echo "<script>location.replace('index.php?msg=Invalid Username or Password')</script>";
}
?>