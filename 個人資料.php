<?php 
    header("Content-Type: text/html; charset=utf-8");
    include("connMysql.php");
    session_start();
    $seldb = @mysqli_select_db($db_link, "webfp");
    if (!$seldb) die("資料庫選擇失敗！");

    if (isset($_SESSION['phonenumber'])) {
        $sql_query_user = "SELECT * FROM `userinformation` WHERE `phonenumber`= '".$_SESSION["phonenumber"]."'";
        $result_user = mysqli_query($db_link, $sql_query_user);
        $user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
    } else {
        $user = NULL;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>賊賊廚房-個人資料</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/style6.css">
</head>
<body>
	<section class="item item-ll item-1">
	<section id="second" class="item item-ll item-1">
    <header class="header">
    <p class="site-title-sub">賊賊廚房</p>
	<h1 class="site-title">個人資料</h1>
	<p class="site-description">輸入資料預約、訂購產品更方便!</p>
    </header>
            <center>
                <table border="1" align="center" cellpadding="10" class="menu" id="t11" style="border-radius: 20px; width:89.5%">
                    <tr>
                        <th colspan="3" style="font-size:30px">個人資料</th>
                    </tr>
                    <tr>
                        <td style="width: 180px;height: 40px; text-align: center; font-size: 22px">姓名</td>
                        <td style="width: 300px;height: 40px; text-align: center; font-size: 22px"><?php echo $user["name"];?></td>
                        <td rowspan="7" valign="top">
                            <img style="max-height: 700px; width: 767px" src="<?php echo $user["pic"];?>" />
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 180px;height: 60px; text-align: center;center;font-size: 22px">電話</td>
                        <td style="width: 300px;height: 60px; text-align: center;center;font-size: 22px"><?php echo $user["phonenumber"];?></td>
                    </tr>
                    <tr>
                        <td style="width: 180px;height: 60px; text-align: center;center;font-size: 22px">身分</td>
                        <td style="width: 300px;height: 60px; text-align: center; center;font-size: 22px"><?php echo "會員";?></td>
					</tr>
                    <tr>
                        <td style="width: 180px;height: 60px; text-align: center; center;font-size: 22px">住址</td>
                        <td style="width: 300px;height: 60px; text-align: center; center;font-size: 22px"><?php echo $user["address"];?></td>
                    </tr>
                    <tr>
                        <td style="width: 180px;height: 60px; text-align: center; center;font-size: 22px">信箱</td>
                        <td style="width: 300px;height: 60px; text-align: center; center;font-size: 22px"><?php echo $user["email"];?></td>
                    </tr>
                    <tr>
                        <td style="width: 180px;height: 60px; text-align: center; center;font-size: 22px">生日</td>
                        <td style="width: 300px;height: 60px; text-align: center; center;font-size: 22px"><?php echo $user["birthday"];?></td>
                    </tr>
                </table>
            </center>
			<br>
            <a href='information_update.php' style="color: #fff; font-size:17px;text-decoration:none;">&ensp;個人資料修改</a>
			<br>
			<br>
        </div>
</body>
</html>