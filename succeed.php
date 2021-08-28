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

	 //更新個人資料
    if(isset($_POST["action"])&&($_POST["action"]=="modify")){
        // move file from tmp imto ./uploads folder
        $target_file = './uploads/' . $_FILES['headPic']['name'];
        move_uploaded_file($_FILES["headPic"]["tmp_name"], $target_file);

        $sql = "UPDATE `userinformation` SET `address`='".$_POST["address"]."', `email`='".$_POST["email"]."', `birthday`='".$_POST["birthday"]."', `pic`='".$target_file."' WHERE `phonenumber`='".$user['phonenumber']."'";
        // $sql = "UPDATE `user` SET `name`='".$_POST["name"]."', `phone`='".$_POST["phone"]."', `birth`='".$_POST["birth"]."' WHERE `cId`='".$user['cId']."'";
        mysqli_query($db_link, $sql);
    }


    $sql_query_user = "SELECT * FROM `userinformation` WHERE `phonenumber`= '".$_SESSION["phonenumber"]."'";
    $result_user = mysqli_query($db_link, $sql_query_user);
    $user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);

	echo '<script>alert("更新成功!")</script>'; 
    echo '<meta http-equiv="refresh" content="0; url=個人資料.php">';
?>