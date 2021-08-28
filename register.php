<?php
	include("connMysql.php");
    if (!@mysqli_select_db($db_link, "webfp")) die("資料庫選擇失敗！");
	
		# 確認帳號與密碼規則
		# find duplicate account 1. SELECT 2. if exists
		# 以電話號碼做為檢測帳號是否存在的依據
        $sql_query = "SELECT * FROM `membership` WHERE `account`= '".$_POST["account"]."'";
        $result = mysqli_query($db_link, $sql_query);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
		
        if ($user) {
			echo '<script>alert("此用戶已存在，請改用會員登入，或重新註冊其他帳號。")</script>'; 
			echo '<meta http-equiv="refresh" content="0; url=會員登入.php">';
        } else {
	        # password == verifyPass 檢測第二次輸入密碼是否與第一次相同
	        if($_POST['verifyPass'] == $_POST['password']){
                # 寫進資料庫
	            $sql_query = "INSERT INTO `membership` (`name` ,`phonenumber` ,`account` ,`password` ,`administrator`)
	            			  VALUES ('".$_POST['name']."', '".$_POST['phonenumber']."', '".$_POST['account']."', '".$_POST['password']."', 0)";
		        $result = mysqli_query($db_link, $sql_query);
				
				$sql_query = "SELECT * FROM `userinformation`";
				$result = mysqli_query($db_link, $sql_query);
				$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
				$sql_query = "INSERT INTO `userinformation` (`name` ,`phonenumber`)
	            			  VALUES ('".$_POST['name']."', '".$_POST['phonenumber']."')";
				
				$result = mysqli_query($db_link, $sql_query);
				echo '<script>alert("註冊成功!前往登入頁面。")</script>'; 
		        echo '<a href="會員登入.php"></a>';
				echo '<meta http-equiv="refresh" content="0; url=會員登入.php">';
	        } else {
				echo '<script>alert("密碼與確認密碼不同，請重新註冊。")</script>';
				echo '<meta http-equiv="refresh" content="0; url=會員登入.php">';
	        }
	    }
?>
