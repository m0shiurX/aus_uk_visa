<?php include("../conn.php");
$query="update tbl_status set
		status='".$_POST['NewProgress']."',
		FileNumber='".$_POST['FileNumber']."',
		ReceiptNumber='".$_POST['ReceiptNumber']."',
		DecisionDate='".date('Y-m-d',strtotime($_POST['DecisionDate']))."',
		VisaGrantNumber='".$_POST['VisaGrantNumber']."',
		VisaGrantDate='".date('Y-m-d',strtotime($_POST['VisaGrantDate']))."',
		StayFor='".$_POST['StayFor']."',
		Entries='".$_POST['Entries']."',
		ArrivalDate='".date('Y-m-d',strtotime($_POST['ArrivalDate']))."'
where AppID='".$_POST['AppID']."'";

$result=mysql_query($query) or die(mysql_error());
if($result)
{
	echo "<script>location.replace('home.php')</script>";
}
?>