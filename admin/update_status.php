<?php include("../conn.php"); ?>
<html>
<head>
<title>Australia &amp; UK Visa Process</title>
<script language="javascript">
function confirmDelete() {
return confirm("Are you sure you want to Permanently remove this poll!");	
}
</script>
<link rel="stylesheet" href="custom.css">

</head>
<body>
<div class="wraper">
<div class="header">

<div class="header_left">Australia &amp; UK Visa Process</div>
<div class="header_right">
<a href="home.php">Home</a> 
<a href="#">Change password</a>
<a href="#">Logout</a>

<span style="padding-right:20px; color:#ff0000;">Welcome Admin </span>
</div>

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

<?php
$query="select tbl_application.*, tbl_status.*,tbl_country.*
		from tbl_application 
		inner join tbl_status on tbl_status.AppID=tbl_application.ID
		inner join tbl_country on tbl_country.ID=tbl_application.WantToGo
		where tbl_application.ID='".$_GET['id']."'"; 
$result=mysql_query($query) or die(mysql_error());
$row=mysql_fetch_array($result);
?>

<div class="poll_admin_head">Update Application Status</div>

<form name="form1" method="post" action="update_status_process.php"><input type="hidden" name="AppID" value="<?php echo $_GET['id'];?>">
<div class="tableheading_admin">Update Now</div>
<?php if($_GET['msg']) {?><span style="color:#ff0000;"><?php echo $_GET['msg'];?></span> <?php } ?>
<table>
<tr><td>Current Progress</td><td><input type="text" name="CurrentProgress" value="<?php echo $_GET['status'];?>%" disabled></td></tr>
<tr><td>New Progress</td><td><input type="text" name="NewProgress"><br> Insert progress without % sign</td></tr>

<tr><td>File Number</td><td><input type="text" name="FileNumber" value="<?php echo $row['FileNumber'];?>"></td></tr>
<tr><td>Payment Receipt Number</td><td><input type="text" name="ReceiptNumber" value="<?php echo $row['ReceiptNumber'];?>"></td></tr>
<tr><td>Decision Date</td><td><input type="text" name="DecisionDate" value="<?php if($row['DecisionDate']!='0000-00-00') echo date('d-m-Y',strtotime($row['DecisionDate']));?>"><br> DD-MM-YYYY</td></tr>

<tr><td>Visa Grant Number</td><td><input type="text" name="VisaGrantNumber" value="<?php echo $row['VisaGrantNumber'];?>"></td></tr>
<tr><td>Visa Grant Date</td><td><input type="text" name="VisaGrantDate" value="<?php if($row['VisaGrantDate']!='0000-00-00') echo date('d-m-Y',strtotime($row['VisaGrantDate']));?>"><br> DD-MM-YYYY</td></tr>
<tr><td>Stay For / Until</td><td><input type="text" name="StayFor" value="<?php echo $row['StayFor'];?>"></td></tr>
<tr><td>Entries</td><td><input type="text" name="Entries" value="<?php echo $row['Entries'];?>"></td></tr>
<tr><td>Last Date to Arrive</td><td><input type="text" name="ArrivalDate" value="<?php if($row['ArrivalDate']!='0000-00-00') echo date('d-m-Y',strtotime($row['ArrivalDate']));?>"><br> DD-MM-YYYY</td></tr>

<tr><td colspan="2" align="right"><input type="submit" name="submit" value="Update Now"></td></tr>
</table>
</form>

</div>

</div>


<div class="footer"></div>

</div> <!-- wraper end -->
</body>

</html>

