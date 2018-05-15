<?php
//create
function doProcess(swoole_process $worker)
{
  echo 'PID' . $worker->pid . "\n";
  sleep(10);
}

//create
$process = new swoole_process("doProcess");
$pid = $process->start();
$process = new swoole_process("doProcess");
$pid = $process->start();
$process = new swoole_process("doProcess");
$pid = $process->start();

//wait
swoole_process::wait();

//no eg

 ?>
