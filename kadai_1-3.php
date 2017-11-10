<?php

$fp = fopen("kadai_1-2.txt", "r");
while ($line = fgets($fp)) {
  echo "$line<br />";
}
fclose($fp);

?>