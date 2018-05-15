<?php
//xunhuanzhixing dingshiqi
swoole_timer_tick(2000, function($timer_id){
  echo "run $timer_id \n";
});

//dancizhixing
swoole_timer_after(3000, function (){
  echo ("run after 3000 \n");
});

//run php timer.php
 ?>
