<?php
	include("connMysql.php");
    if (!@mysqli_select_db($db_link, "webfp")) die("資料庫選擇失敗！");
    session_start();
	
	//$user['變數']獲取資料表的東西
	//用$_SESSION連接用戶資料
	//檢測$_SESSION是否有東西
	if (isset($_SESSION['phonenumber'])) {
		$sql_query = "SELECT * FROM `membership` WHERE `phonenumber`= '".$_SESSION["phonenumber"]."'";
		$result = mysqli_query($db_link, $sql_query);
		$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else {
		$user = NULL;
		echo '<script>alert("使用預約功能請先登入。")</script>'; 
	}
	
	//將資料輸入資料表
	$sql_query = "INSERT INTO `reserve` (`phonenumber` ,`date` ,`time` ,`people`)
	              VALUES ('".$user['phonenumber']."', '".$_POST['date']."', '".$_POST['time']."', '" .$_POST['people']."')";
				
	$result = mysqli_query($db_link, $sql_query);
?>

<script> 
	var date = '<?php echo $_POST['date']?>';
	var time = '<?php echo $_POST['time']?>';
	var people = '<?php echo $_POST['people']?>';
	
	alert("預約成功!\n您預約的時間為" + date + " " + time + " 總共" + people);
</script>

<?php
	echo '<meta http-equiv="refresh" content="0; url=內容.php">';
?>

