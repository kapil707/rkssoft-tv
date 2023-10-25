<?php
header("Content-type: application/json; charset=utf-8");
$host = 'localhost';  
$user = 'rkslivetv';  
$pass = 'kapil1234!@#$kk';  
$dbname = 'rkslivetv';  
$conn = mysqli_connect($host, $user, $pass,$dbname);

$android_id = $_POST["android_id"];
if($android_id!="")
{
	$sql = "SELECT * FROM `tbl_android_info` where android_id='$android_id'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result)==0) {
		$sql = "insert into tbl_android_info set android_id='$android_id'";
		mysqli_query($conn, $sql);
	}

	$sql = "SELECT * FROM `tbl_android_info` where android_id='$android_id' and status='1'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) 
		{
			$ok = $row["status"];
		}
	}
	
	$sql = 'SELECT * FROM `tbl_key`';
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$id = $row["mykey"];
		}
	}
	if($ok=="")
	{
		$id = "";
	}
	if($android_id=="")
	{
		$id = "$android_id";
	}
	//mysqli_close($conn);
}
$items .= <<<EOD
{"id":"{$id}","ok":"{$ok}"}
EOD;
echo "[$items]";
?>