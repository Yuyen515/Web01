<?php
	session_start();
	include("connMysql.php");
    if (!@mysqli_select_db($db_link, "webfp")) die("資料庫選擇失敗！");
	unset($_SESSION['account']);
	unset($_SESSION['name']);
	unset($_SESSION['password']);
	unset($_SESSION['administrator']);
	unset($_SESSION['phonenumber']);
	
	header("Location: index.php");
?>