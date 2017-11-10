<html>
<body>
<form action="" method="post">
コメント：<input type="text" name="var">
<input type="submit" value="送信">
</form>
<?php
$text = $_POST['var'];
file_put_contents('kadai_1-5.txt', $text);
?>
<?php
print("入力内容->: http://co-661.99sv-coco.com/kadai_1-5.txt");
?>
</body>
</html>