<html>
<head>
<title>Australia &amp; UK Visa Process</title>
<script language="javascript">
function confirmDelete() {
return confirm("Are you sure you want to Permanently remove this data!");	
}
</script>
<link rel="stylesheet" href="custom.css">
<!-- Google Fonts -->
</head>
<body>
<div class="wraper">
<div class="header">

<div class="header_left">Australia UK Visa Process</div>
<!--
<div class="header_right">
<a href="home.php">Poll</a> <a href="#">Poll result</a>
<a href="#">Employee</a>
</div> -->


</div>

<div class="main_content">
<div class="poll_admin">

<style type="text/css">
.poll_admin table td {
	border:0px;
}

.poll_admin table td input[type="text"], input[type="password"]
{
	height:30px;
	width:200px;
	border:1px solid #dddde2;
}

.poll_admin table td input[type="submit"]
{
	height:30px;
	padding:5px 10px;
	cursor:pointer;
	border:1px solid #DDDDE2;
}
.poll_admin table td:first-child
{
padding-left:0px;
}


</style>
<div class="poll_admin_head">Authentication</div>

<form name="form1" method="post" action="login.php">
<div class="tableheading_admin">Login area</div>
<?php if($_GET['msg']) {?><span style="color:#ff0000;"><?php echo $_GET['msg'];?></span> <?php } ?>
<table>
<tr><td>Username</td><td><input type="text" name="UserName"></td></tr>
<tr><td>Password</td><td><input type="password" name="Password"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Enter"></td></tr>
</table>
</form>

</div>

</div>


<div class="footer"></div>

</div> <!-- wraper end -->
</body>

</html>

