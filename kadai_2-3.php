<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>簡易掲示板</title>
</head>
<body>

    <form method="POST" action="<?php echo($_SERVER['PHP_SELF']) ?>">
        <label for="name">名前： </label>
        <input type="text" name="name" value="<?php echo $simEdit[1]; ?>"><br><br>
        <label for="comment">コメント:</label>
        <textarea name="comment" cols="30" rows="5" value="<?php echo $simEdit[2]; ?>"></textarea><br>
        <input type="submit" value="送信">
    </form>

<?php
    $file_name = "kadai_2-2.txt";
    $ret_array = file($file_name);
    for($i = 0;$i <count($ret_array); ++$i){
        $piece = explode("<>", $ret_array[$i]);
                    for($j = 0; $j < 4; ++$j){
            echo ($piece[$j]);
            }
        echo "<br />\n";    
    }
?>

</body>
</html>


