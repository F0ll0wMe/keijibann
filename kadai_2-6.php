<html>
<mata charset="utf-8">
<lang="ja">
<head><title>フォーム</title></head>

<body>
<h1>入力フォーム</h1>
<form action="test.php" method="post">
    名  前：<input type="text" name="name"><br>
    コメント：<input type="text" name="comment"><br>
    パスワード：<input type="text" name="password"><br>
    <input type="submit" value="送信する">
</form>

<br>

<h1>削除フォーム</h1>
<font color ="blue">※半角でお願いします。</font><br>
<form action="test.php" method="post">
    削除：<input type="text" name="delete"><br>
    パスワード：<input type="text" name="password2"><br>
    <input type="submit" name="sakuzyo" value="削除する"><br>
</form>

    <br>

<h1>編集フォーム</h1>
<font color ="blue">※半角でお願いします。</font><br>
<form action = "test.php" method="post">
    編集対象番号:<input type="text" name="number"><br>
    パスワード：<input type="text" name="password3"><br>
    <input type="submit" name="hensyu"value="編集する">
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

//データ書き込み
if (!empty($name) && !empty($comment)) {
$fp = fopen ("test.txt","a");
fputs ($fp, $write."\n");
fclose ($fp);
}

//パスワード書き込み
if (!empty($password)) {
$fp = fopen ("testpas.txt","a");
fputs ($fp, $writepas."\n");
fclose ($fp);
}

//データ消去
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

//データ編集
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

        echo "No$ediline[0]の書き込みを編集してください<br>";
        echo "<form method=POST action=test.php>";
        echo "名  前：<input type='text' name='name2' size='20' value='" . $ediline[1] . "'><br>";
        echo "コメント：<input type='text' name='comment2' size='60' value='" . $ediline[2] . "'><br>";
        echo "<input type='submit' name='uwagaki' value='上書き保存'><input type='hidden' name='bnumber' value='" . $bnum . "'>";
        echo "</form>";
        break;
       }    

    }
    }
}

//編集上書き
if (!empty($_POST["uwagaki"])){
$ediLog = file("test.txt");
   for ($i = 0; $i < count($ediLog); $i++) {
   $line2 = explode("<>", $ediLog[$i]);

        $bnum = $_POST["bnumber"];
        $name = $_POST['name2'];
        $comment = $_POST['comment2'];

        if ($line2[0] == $bnum) { //置き換え対象行を探す
       $newline = $bnum . "<>" . $name . "<>" . $comment . "<>" . $time . "\n";
       array_splice($ediLog,$i,1,"$newline");
       file_put_contents("test.txt", $ediLog);
        }
   }
}

echo "__________________掲示板欄______________________<br>";
//出力
$dateFile = "test.txt";
$file = file($dateFile);
    foreach($file as $value){
    explode("<>",$value);
    echo $value . "<br>\n";
    }
?>

</body>
</html>