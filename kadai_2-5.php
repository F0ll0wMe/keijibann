<?php

    $name = $_POST['name'];
    $name = htmlspecialchars($name);

    $comment = $_POST['comment'];
    $comment = htmlspecialchars($comment);

    $delete = $_POST['delete'];
    $delete = htmlspecialchars($delete);

    $edit = $_POST['edit'];
    $edit = htmlspecialchars($edit);

    $editContents = $_POST['editContents'];
    $editContents = htmlspecialchars($editContents);

    $time = date("Y/m/d H:i:s");

    $line = file("kadai_2-5.txt");
    $num = count($line);

    $write =  "{". $num . "}<>{" . $name . "}<>{" . $comment . "}<>{" . $time . "}";

    if (!empty($name) && !empty($comment)) {
        $fp = fopen ("./kadai_2-5.txt","a");
        fputs ($fp, $write."\n");
        fclose ($fp);
    }

    if (!empty($delete)) {
        $delCon = file("kadai_2-5.txt");
        for ($j = 0; $j < count($delCon) ; $j++) {
            $delData = explode("<>", $delCon[$j]);
            if ($delData[0] == "{".$delete."}") {
                array_splice($delCon, $j, 1);
                file_put_contents("./kadai_2-5.txt", $delCon);
            }
        }
    }

    if (!empty($edit)) {
        $ediCon = file("kadai_2-5.txt"); 
        for ($k = 0; $k < count($ediCon); $k++) {
            $ediData = explode("<>", $ediCon[$k]);
            if ($ediData[0] == "{".$edit."}") {
                for($h = 0; $h < count($ediData); $h++){
                    $simEdit[$h] = mb_substr(trim($ediData[$h]), 1, -1);
                }
            }
        }
    }

    if(!empty($editContents)) {
        $edi = file("kadai_2-5.txt"); 
        for ($l = 0; $l < count($edi); $l++) {
            $ediDatat = explode("<>", $edi[$l]);
            if ($ediDatat[0] == "{".$num."}") {
               
                file_put_contents("./kadai_2-5.txt", $edi);
            }
        }
    }


?>



<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
</head>

<body>
    <form method="POST" action="<?php echo($_SERVER['PHP_SELF']) ?>">
        <label for="name">名前：</label>
        <input type="text" name="name" value="<?php echo $simEdit[1]; ?>"><br><br>

        <label for="comment">コメント:</label>
        <textarea name="comment" cols="30" rows="5"><?php echo $simEdit[2]; ?></textarea><br>
        <input type="submit" value="投稿する">

        <?php
        if (!empty($simEdit[1]) && !empty($simEdit[2])) {
            echo '<input type="hidden" name="editContents" value="editContents">';
        }
        ?>

    </form>

    <br>

    <form method="POST" action="<?php echo($_SERVER['PHP_SELF']) ?>">
        <?php
        if (isset($simEdit[1]) && isset($simEdit[2])) {
             echo '<input type="hidden" name="delete"><br>';
        } else {
            echo '<label for="delete">削除対象番号</label><br>
                  <input type="text" name="delete"><br>
                  <input type="submit" value="削除する">';
        }
        ?>
    </form>

    <br>

    <form method="POST" action="<?php echo($_SERVER['PHP_SELF']) ?>">
        <?php
        if (isset($simEdit[1]) && isset($simEdit[2])) {
             echo '<input type="hidden" name="edit"><br>';
         } else {
            echo '<label for="edit">編集対象番号</label><br>
                  <input type="text" name="edit"><br>
                  <input type="submit" value="編集する">';
         }
        ?>
    </form>

<?php

    $contents = file('kadai_2-5.txt');
    foreach($contents as $line){
        $data = explode("<>", $line);
        for($i = 0 ; $i < count($data); $i++){
            echo $data[$i]."<br>";
        }
    }

?>
</body>
</html>