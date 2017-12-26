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

<?php 
function CountryName($countryid)
{
	$query1="select * from tbl_country where ID='".$countryid."'";
	$result1=mysql_query($query1) or die(mysql_error());
	$row1=mysql_fetch_array($result1);
	echo $row1['CountryName'];
}

?>
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

<div class="poll_admin_head">Application Report</div>

<!-- <div class="add_new"><a href="action_poll.php?type=add">Add new</a></div> -->

<table cellpadding="0" cellspacing="0" align="left" border="1" style="border-collapse:collapse; width:950px;" class="call">
<tr class="tableheading">
<td style="border-left:1px solid #e7e5e5;" width="15">Sl</td>
<td width="100">Name</td>
<td width="100">Visa Type</td>
<td width="100">Contry To Go</td>
<td width="100">Processing Type</td>
<td width="70">Phone</td>
<td width="70">Email</td>
<td width="50">Status</td>
</tr>
 
<?php 
$query="select tbl_application.*, tbl_status.status from tbl_application inner join tbl_status on tbl_status.AppID=tbl_application.ID order by ApplyDate DESC";
$result=mysql_query($query) or die(mysql_error());
$count=0;
while($row=mysql_fetch_array($result)) { $count=$count+1;
	?>
    <tr>
    <td><?php echo $count;?></td>
    <td><?php echo $row['FirstName'];?>&nbsp;<?php echo $row['LastName'];?></td>
    <td><?php echo $row['VisaType'];?></td>
    <td><?php echo CountryName($row['WantToGo']);?></td>
    <td><?php echo $row['ProcessingType'];?></td>
    <td><?php echo $row['Phone'];?></td>
    <td><?php echo $row['Email'];?></td>
    <td><a href="update_status.php?id=<?php echo $row['ID'];?>&status=<?php echo $row['status'];?>" style="text-decoration:underline;"><?php echo $row['status'];?>%</a></td>
    
    </tr>

	<?php 
}
?>  
    

</table>
</div>
</div>

</div>


<div class="footer"></div>

</div> <!-- wraper end -->
</body>

<!-- Mirrored from pms.pwd.gov.bd/crs/home.php by HTTrack Website Copier/3.x [XR&CO'2013], Sat, 18 Nov 2017 09:06:53 GMT -->
</html>
