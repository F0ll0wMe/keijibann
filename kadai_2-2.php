<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
</head>

<body>

    <form method="POST" action="<?php echo($_SERVER['PHP_SELF']) ?>">
        <label for="name">名前： </label>
        <input type="text" name="name" value="<?php echo $simEdit[1]; ?>"><br><br>

        <label for="comment">コメント:</label>
        <textarea name="comment" cols="30" rows="5" value="<?php echo $simEdit[2]; ?>"></textarea><br>
        <input type="submit" value="投稿する">
    </form>

 <?php

    $name = $_POST['name'];
    $name = htmlspecialchars($name);
    $comment = $_POST['comment'];
    $comment = htmlspecialchars($comment);
    $time = date("Y/m/d H:i:s");
    $line = file("kadai_2-2.txt");
    $num = count($line);
    $write =  "{". $num . "}<>{" . $name . "}<>{" . $comment . "}<>{" . $time . "}";

    if (!empty($name) && !empty($comment)) {
        $fp = fopen ("./kadai_2-2.txt","a");
        fputs ($fp, $write."\n");
        fclose ($fp);
    }
    

    

?> 
</body>
</html>
   










