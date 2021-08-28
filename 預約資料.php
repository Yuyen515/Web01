<?php
    include("connMysql.php");
    if (!@mysqli_select_db($db_link, "webfp")) die("資料庫選擇失敗！");
    session_start();
?>
<!DOCTYPE html>
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
	<h1 class="site-title">預約資料</p>
	<p class="site-description">選擇日期，檢視會員線上預約資料!</p>
   </header>
   <form name="reserve_information" method="post" action="預約資料.php">
   <fieldset>
     <legend>查詢會員預約日期</legend>
     <label for="date">日期：</label><br>
     <input type="date" name="nowtime" required/><br><br>
     <input type="submit" name="submit" value="查詢" /> 
   </fieldset> 
   </form> 
   <fieldset>
     <legend>會員預約資訊</legend>
   <?php
   if(isset($_POST["submit"])){
      $sql_query = "SELECT * FROM `reserve` WHERE `nowtime`= '".$_POST["nowtime"]."'";
      $result = mysqli_query($db_link, $sql_query);
	  $num = 1;
	  
	  
	  while($row_result=mysqli_fetch_assoc($result)){ 
          echo "<tr>No. $num";
          echo "<td></br>會員電話：".$row_result["phonenumber"]."</td></br>";
		  echo "<td>預約日期：".$row_result["date"]."</td></br>";
          echo "<td>預約時間：".$row_result["time"]."</td></br>";
          echo "<td>預約人數：".$row_result["people"]."</td></br></br></br></br>";
          echo "</tr>";
		  $num++;
	  }
	}
	
   
   ?>
   </fieldset> 
   <br>
   <br>
   <br>
   <br>
   <br>
   
</body>
</html>