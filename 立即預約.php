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
  <link rel="stylesheet" href="css/style3.css">
</head>
<body>
  <section class="item item-ll item-1">
  <section id="second" class="item item-ll item-1">
  <header class="header">
    <p class="site-title-sub">賊賊廚房</p>
	<h1 class="site-title">立即預約</p>
	<p class="site-description">登入會員即可進行線上預約!</p>
  </header>
  
  <?php if($user){
			if($user['administrator'] == 0){ ?>	  
  <form name="reserve" method="post" action="reservation.php">
   <fieldset>
     <legend>手作預約</legend>
     <label for="date">日期：</label><br>
     <input class="date" type="date" name="date" required/><br><br>
	 <label for="time">時間：</label><br>
     <select name="time">
	   <option value="10:30">10:30</option>
	   <option value="11:30">11:30</option>
	   <option value="13:00">13:00</option>
	   <option value="14:00">14:00</option>
	   <option value="15:00">15:00</option>
	   <option value="16:00">16:00</option>
	   <option value="17:00">17:00</option>
	   <option value="18:00">18:00</option>
	   <option value="19:00">19:00</option>
	   <option value="20:00">20:00</option>
	 </select><br><br>
	 <label for="people">預約人數:</label><br>
	 <input type="radio" name="people" value="1位" checked="checked" />1位
	 <input type="radio" name="people" value="2位" />2位
	 <input type="radio" name="people" value="3位" />3位
	 <input type="radio" name="people" value="4位" />4位<br><br>
     <input type="submit" value="預約">
   </fieldset> 
  </form> 
  <?php }} ?>
  <h6 class="word1">電話: 07-5669887<br>營業時間: 週二~週日 10:30~21:00</h6>
  <table>
  <tr>
    <th>手作品項</th>
    <th>價格</th> 
    <th>協作建議人數</th>
  </tr>
  <tr>
    <td>薄荷南濃湯</td>
    <td>320元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>蕃茄海鮮湯</td>
    <td>380元/人</td>
    <td>1-3人</td>
  </tr>
  <tr>
    <td>酸辣殼貝湯</td>
    <td>350元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>印度咖哩濃湯</td>
    <td>220元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>地瓜濃湯</td>
    <td>250元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>日式牛奶蟹濃湯</td>
    <td>400元/人</td>
    <td>1-3人</td>
  </tr>
  <tr>
    <td>蛋黃蝦筆管麵</td>
    <td>350元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>瑞典紅醬肉丸麵</td>
    <td>250元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>蒜辣炒義麵</td>
    <td>270元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>巧克力/牛奶星星餅</td>
    <td>300元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>燕麥雜糧餅</td>
    <td>350元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>手指餅</td>
    <td>370元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>花邊彩繪餅</td>
    <td>280元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>巧克力核果雜糧餅</td>
    <td>350元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>布朗尼可可霜杯子蛋糕</td>
    <td>300元/人</td>
    <td>1-3人</td>
  </tr>
  <tr>
    <td>捲花草莓霜杯子蛋糕</td>
    <td>330元/人</td>
    <td>1-3人</td>
  </tr>
  <tr>
    <td>苦咖啡杯子蛋糕</td>
    <td>330元/人</td>
    <td>1-3人</td>
  </tr>
  <tr>
    <td>酸檸梅糖杯子蛋糕</td>
    <td>350元/人</td>
    <td>1-3人</td>
  </tr>
  <tr>
    <td>莓果軟邊派</td>
    <td>470元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>片橙派</td>
    <td>450元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>南瓜酸奶派</td>
    <td>470元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>法式洋蔥鹹派</td>
    <td>320元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>可可核果派</td>
    <td>440元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>芒果鮮檸幕斯</td>
    <td>380元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>櫻桃幕斯蛋糕</td>
    <td>400元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>巧克力三夾蛋糕</td>
    <td>320元/人</td>
    <td>1-2人</td>
  </tr>
  <tr>
    <td>草莓奶油罐裝蛋糕</td>
    <td>340元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>咖啡馬卡龍</td>
    <td>350元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>薰衣草馬卡龍</td>
    <td>400元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>覆盆莓馬卡龍</td>
    <td>380元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>巧克力馬卡龍</td>
    <td>370元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>覆盆莓香草布丁</td>
    <td>310元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>草莓雞蛋幕斯</td>
    <td>300元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>美式莓果甜甜圈</td>
    <td>280元/人</td>
    <td>1-4人</td>
  </tr>
  <tr>
    <td>經典糖霜圈</td>
    <td>220元/人</td>
    <td>1-4人</td>
  </tr>
  </table>
  </section>
  </section>
</body>
</html>