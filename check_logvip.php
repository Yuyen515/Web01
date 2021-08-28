<?php
    include("connMysql.php");
    if (!@mysqli_select_db($db_link, "webfp")) die("資料庫選擇失敗！");
    session_start();
	
	//在membership資料表中搜尋帳號
    $sql_query = "SELECT * FROM `membership` WHERE `account`= '".$_POST["account"]."'";
    $result = mysqli_query($db_link, $sql_query);
    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	//如有符合的帳號
    if ($user) {
		//比對帳號密碼是否與資料表中帳密一致以及是否為管理員帳號
        if ($_POST['account'] == $user['account'] && $_POST['password'] == $user['password'] && $user['administrator'] == 1) {
			$_SESSION['name'] = $user['name'];
			$_SESSION['account'] = $user['account'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['administrator'] = $user['administrator'];
			$_SESSION['phonenumber'] = $user['phonenumber'];
			echo '<script>alert("登入成功!請點擊頁面連結進入管理模式。")</script>'; 
			echo '<a href="index.php" target="_parent" style="font-size: 100px; color:#fff ;font-family: sans-serif;">點此進入管理模式</a>';
		//如果為會員帳號，需使用會員登入頁面
        } else if($user['administrator'] == 0){
			echo '<script>alert("會員帳號請使用會員登入介面。")</script>'; 
            echo '<meta http-equiv="refresh" content="0; url=會員登入.php">';
        } else {
			echo '<script>alert("帳號或密碼錯誤，請重新輸入。")</script>'; 
            echo '<meta http-equiv="refresh" content="0; url=會員登入.php">';
		}
    } 
	else {
		echo '<script>alert("帳號或密碼錯誤，請重新輸入。")</script>'; 
        echo '<meta http-equiv="refresh" content="0; url=會員登入.php">';
    }   
?>