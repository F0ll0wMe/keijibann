<html>
<mata charset="utf-8">
<lang="ja">
<head><title>�ե��`��</title></head>

<body>
<h1>�����ե��`��</h1>
<form action="test.php" method="post">
    ��  ǰ��<input type="text" name="name"><br>
    �����ȣ�<input type="text" name="comment"><br>
    �ѥ���`�ɣ�<input type="text" name="password"><br>
    <input type="submit" value="���Ť���">
</form>

<br>

<h1>�����ե��`��</h1>
<font color ="blue">����ǤǤ�����ޤ���</font><br>
<form action="test.php" method="post">
    ������<input type="text" name="delete"><br>
    �ѥ���`�ɣ�<input type="text" name="password2"><br>
    <input type="submit" name="sakuzyo" value="��������"><br>
</form>

    <br>

<h1>�����ե��`��</h1>
<font color ="blue">����ǤǤ�����ޤ���</font><br>
<form action = "test.php" method="post">
    �������󷬺�:<input type="text" name="number"><br>
    �ѥ���`�ɣ�<input type="text" name="password3"><br>
    <input type="submit" name="hensyu"value="��������">
</form>

<?php

$name = $_POST['name'];
$name = htmlspecialchars($name);

$comment = $_POST['comment'];
$comment = htmlspecialchars($comment);

$password = $_POST['password'];
$password = htmlspecialchars($password);

$time = date("Y/m/d H:i:s");

$line = file("test.txt");
$num = count($line);

$write = $num . "<>" . $name . "<>" . $comment . "<>" . $time;
$writepas = $password . "<>" . $num;

//�ǩ`�������z��
if (!empty($name) && !empty($comment)) {
$fp = fopen ("test.txt","a");
fputs ($fp, $write."\n");
fclose ($fp);
}

//�ѥ���`�ɕ����z��
if (!empty($password)) {
$fp = fopen ("testpas.txt","a");
fputs ($fp, $writepas."\n");
fclose ($fp);
}

//�ǩ`����ȥ
$delCon = file("test.txt");
$pasCon = file("testpas.txt");
$delete = $_POST['delete'];
$sakuzyo = $_POST['sakuzyo'];
$pas2 = $_POST['password2'];

if (!empty($sakuzyo)) {

    for ($r = 0; $r < count($pasCon) ; $r++) {
    $pasData = explode("<>",$pasCon[$r]);

    for ($j = 0; $j < count($delCon) ; $j++) {
    $delData = explode("<>", $delCon[$j]);

        if ($delData[0] == $delete && $pasDate[0] == $pas2) {
        array_splice($delCon, $j, 1);
        array_splice($pasCon, $r, 1);
        file_put_contents("test.txt", $delCon);
        file_put_contents("testpas.txt", $pasCon);
        }
    }
    }
}

//�ǩ`������
$hensyu = $_POST['hensyu'];
$pas3 = $_POST["password3"];
$bnum = $_POST["number"];
$ediCon = file("test.txt");
$pasLog = file("testpas.txt");

if (!empty($hensyu)) {

    for($v = 0; $v < count($pasLog); $v++){
    $pasline = explode("<>",$pasLog[$v]);

    for($i = 0; $i < count($ediCon); $i++){
    $ediline = explode("<>",$ediCon[$i]);

       if($ediline[0] == $bnum && $pasline[0] == $pas3){

        echo "No$ediline[0]�Ε����z�ߤ򾎼����Ƥ�������<br>";
        echo "<form method=POST action=test.php>";
        echo "��  ǰ��<input type='text' name='name2' size='20' value='" . $ediline[1] . "'><br>";
        echo "�����ȣ�<input type='text' name='comment2' size='60' value='" . $ediline[2] . "'><br>";
        echo "<input type='submit' name='uwagaki' value='�ϕ�������'><input type='hidden' name='bnumber' value='" . $bnum . "'>";
        echo "</form>";
        break;
       }    

    }
    }
}

//�����ϕ���
if (!empty($_POST["uwagaki"])){
$ediLog = file("test.txt");
   for ($i = 0; $i < count($ediLog); $i++) {
   $line2 = explode("<>", $ediLog[$i]);

        $bnum = $_POST["bnumber"];
        $name = $_POST['name2'];
        $comment = $_POST['comment2'];

        if ($line2[0] == $bnum) { //�ä��Q�������Ф�̽��
       $newline = $bnum . "<>" . $name . "<>" . $comment . "<>" . $time . "\n";
       array_splice($ediLog,$i,1,"$newline");
       file_put_contents("test.txt", $ediLog);
        }
   }
}

echo "__________________��ʾ���______________________<br>";
//����
$dateFile = "test.txt";
$file = file($dateFile);
    foreach($file as $value){
    explode("<>",$value);
    echo $value . "<br>\n";
    }
?>

</body>
</html>