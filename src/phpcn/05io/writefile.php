<?php
$content = "hello world.";
swoole_async_writefile("2.txt", $content, function($filename){
  echo ($filename);
  echo '<br>';
}, 0);
 ?>
