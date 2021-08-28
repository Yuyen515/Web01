<!DOCTYPE html>
<?php 
    include("connMysql.php");
    session_start();
    if (!@mysqli_select_db($db_link, "webfp")) die("資料庫選擇失敗！");
?>

<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <title>DIY烘焙坊</title>
  <link rel="stylesheet" href="css/style6.css">
</head>
<body>
    <section class="item item-ll item-1">
	<section id="second" class="item item-ll item-1">
    <header class="header">
    <p class="site-title-sub">賊賊廚房</p>
	<h1 class="site-title">會員登入</h1>
	<p class="site-description">登入開放更多服務!</p>
   </header>
   <form method="post" action="check_log.php">
   <fieldset>
     <legend>會員登入</legend>
     <label>帳號：</label><br>
     <input type="text" id="account" name="account"><br>
     <label>密碼：</label><br>
     <input type="password" id="password" name="password"><br><br>
     <input type="submit" value="登入">
   </fieldset> 
   </form> 
   
   <form name="register" method="post" action="register.php">
   <fieldset>
     <legend>會員註冊</legend>
     <label>姓名：</label><br>
     <input type="text" name="name" required /><br>
     <label>手機：</label><br>
     <input type="text" name="phonenumber" required /><br>
	 <label>帳號：</label><br>
     <input type="text" name="account" required /><br>
     <label>密碼：</label><br>
     <input type="password" name="password" required /><br>
	 <label>密碼確認：</label><br>
	 <input type="password" name="verifyPass" required /><br><br>
     <input type="submit" name="Submit" value="註冊" /> 
	 <input type="reset" name="button2"  value="重填" />
   </fieldset> 
   </form> 
   <form method="post" action="check_logvip.php">
   <fieldset>
     <legend>管理員登入</legend>
     <label>帳號：</label><br>
     <input type="text" id="account" name="account"><br>
     <label>密碼：</label><br>
     <input type="password" id="password" name="password"><br><br>
     <input type="submit" value="登入">
   </fieldset>	 
   </form> 
   </section>
   </section>
</body>
</html>