<?php
$workers = [];  //
$worker_num = 2; //max process

//create process
for ($i=0; $i < $worker_num; $i++) {
  $process = new swoole_process('doProcess', false, false);  //create child process
  $process->useQueue();  //start quere, global function
  $pid = $process->start();
  $workers[$pid] = $process;
}

//run process function
function doProcess(swoole_process $process) {
  $recy = $process->pop();  //8192
  echo ("get data from main process: $recy \n");
  sleep(5);
  $process->exit(0);
}

//main process add data to child process
foreach ($workers as $pid => $process) {
  $process->push("Hello child process $pid\n");
}

//wait child process stop
for ($i=0; $i < $worker_num; $i++) {
  $ret = swoole_process::wait();  //waiting until finish
  $pid = $ret['pid'];
  unset($workers['pid']);
  echo ("child process exits $pid \n");
}

//run
//php worker.php
 ?>
