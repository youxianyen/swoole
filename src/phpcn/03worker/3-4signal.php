<?php
//trigger function
swoole_process::signal(SIGALRM, function(){
  static $i = 0;
  echo ("$i \n");
  $i++;
  if ($i > 10) {
      swoole_process::alarm(-1);  //clear timing
  }
});

//  timing signal
swoole_process::alarm(100 * 1000);
 ?>
