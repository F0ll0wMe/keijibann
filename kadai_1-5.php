<html>
<body>
<form action="" method="post">
�����ȣ�<input type="text" name="var">
<input type="submit" value="����">
</form>
<?php
$text = $_POST['var'];
file_put_contents('kadai_1-5.txt', $text);
?>
<?php
print("��������->: http://co-661.99sv-coco.com/kadai_1-5.txt");
?>
</body>
</html>