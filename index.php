<!DOCTYPE html>
<?php 
    include("connMysql.php");
	if (!@mysqli_select_db($db_link, "webfp")) die("資料庫選擇失敗！");
    session_start();
	
	if (isset($_SESSION['phonenumber'])) {
		$sql_query = "SELECT * FROM `membership` WHERE `phonenumber`= '".$_SESSION["phonenumber"]."'";
		$result = mysqli_query($db_link, $sql_query);
		$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
	} else {
		$user = NULL;
	}
?>
<html lang="zh-Hant-TW">
<head>
  <meta charset="UTF-8">
  <title>DIY烘焙坊</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <header class="header item" id="head-item">
    <h1>
	  <a href="內容.php"  target="iFrame">
	    <img class="logo" src="images/logo.jpg" alt="賊賊廚房">
	  </a>
    </h1>	
    <nav class="nav">
      <ul>
		<!--會員登入時介面-->
	    <?php if($user){
				if($user['administrator'] == 0){ ?>	  
        <li class="nav-item"><a href="關於我們.html" target="iFrame">關於我們</a></li>	  
		<li class="nav-item"><a href="材料介紹.html" target="iFrame">材料介紹</a></li>
		<li class="nav-item"><a href="立即預約.php" target="iFrame">立即預約</a></li>	  
		<li class="nav-item"><a href="訂購商品.html" target="iFrame">訂購商品</a></li>	  
	    <li class="nav-item"><a href="會員專區.html" target="iFrame">會員專區</a></li>	
		<li class="nav-item"><a href="分店資訊.html" target="iFrame">分店資訊</a></li>
		<li class="nav-item"><a href="個人資料.php" target="iFrame">個人資料</a></li>
		<br />
		<br />
		<br />
		<li class="nav-item"><a href="logout.php">登出</a></li>
		<!--管理員登入時介面-->		
		<?php }
		else if($user['administrator'] == 1) { ?>	  
        <li class="nav-item"><a href="關於我們.html" target="iFrame">關於我們</a></li>	  
		<li class="nav-item"><a href="材料介紹.html" target="iFrame">材料介紹</a></li>
		<li class="nav-item"><a href="立即預約.php" target="iFrame">立即預約</a></li>	  
		<li class="nav-item"><a href="訂購商品.html" target="iFrame">訂購商品</a></li>	  
	    <li class="nav-item"><a href="會員專區.html" target="iFrame">會員專區</a></li>	
		<li class="nav-item"><a href="分店資訊.html" target="iFrame">分店資訊</a></li>	  
		<li class="nav-item"><a href="預約資料.php" target="iFrame">預約資料</a></li>	
		<br />
		<br />
		<br />
		<li class="nav-item"><a href="logout.php">登出</a></li>	
		<!--訪客介面-->
		<?php }}
		if($user == NULL) {
		?> 
		<li class="nav-item"><a href="會員登入.php" target="iFrame">會員登入</a></li>	  
        <li class="nav-item"><a href="關於我們.html" target="iFrame">關於我們</a></li>	  
		<li class="nav-item"><a href="材料介紹.html" target="iFrame">材料介紹</a></li>
		<li class="nav-item"><a href="立即預約.php" target="iFrame">立即預約</a></li>	  
		<li class="nav-item"><a href="訂購商品.html" target="iFrame">訂購商品</a></li>	  
	    <li class="nav-item"><a href="會員專區.html" target="iFrame">會員專區</a></li>	
		<li class="nav-item"><a href="分店資訊.html" target="iFrame">分店資訊</a></li>	  
		<?php 
		} 
		?>
      </ul>
    </nav>	  
  </header>  
  <iframe id="iFrame" name="iFrame" src="內容.php">
  </iframe>
  <footer class="footer">
    <p>Copyright @ 2020 賊賊廚房</p>
  </footer>
</body>
</html>  