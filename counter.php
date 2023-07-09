<?php
date_default_timezone_set ('Asia/Tokyo');
session_start();

if(isset($_POST["input_text"]) == true && $_POST["check"] == $_SESSION["check"])
{
    $count = $_SESSION["count"] = iconv_strlen($_POST["input_text"]);
    // txt出力
    $myfile = fopen("count.txt", "a+");
    fwrite($myfile, date("Y/m/d H:i:s")."\r\n".$_POST["input_text"]."\r\n");
    fclose($myfile);
}else if(isset($_POST["input_text"]) == true && $_POST["check"] != $_SESSION["check"])
{
    $_SESSION["count"] = $_SESSION["count"] + 1;
}else{
    $_SESSION["count"] = 0;
}

$check = $_SESSION["check"] = mt_rand();
?>


<!doctype html>
<html>
    <head>
    <meta charset="utf-8">
    <title>counter php</title>
</head>
<body>
    <!-- 入力 -->
    <form action="counter.php" method="post" id="form">
        <p>入力：<input type="text" name="input_text" value=""></p>
        <input type="hidden" name="check" value="<?php echo $check; ?>" >
        <input type="submit">
    </form>
    
    <p>
        <?php
        // 文字数出力
        echo "文字数:".$_SESSION["count"];
        ?>
    </p>
</body>
</html>
