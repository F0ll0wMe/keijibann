<html> 
<mata charset="utf-8"> 
<lang="ja"> 
<head><title>kadai_1-6</title></head> 
<body> 
<form action="" method="post">
コメント：<input type="text" name="var">
<input type="submit" value="送信">
<?php 
$text = $_POST['var'];
$fp = fopen("kadai_1-6.txt", "a");
fwrite($fp, $text."\r\n");
fclose($fp);
?>

</body> 
</html>