<?php
$workers = [];  //jinchengchi
$worker_num = 3;

for ($i=0; $i < $worker_num; $i++) {
  $process = new swoole_process('doProcess');  //new single process
  $pid = $process->start();
  $worker[$pid] = $process;  //
}

//new process function
function doProcess(swoole_process $process)
{
  $process->write("PID: $process->pid ");  //write child process ? pile
  echo "write message: $process->pid $process->callback\n";
}

//add process event
foreach ($workers as $process) {
  //add
  swoole_event_add($process->pipe, function($pipe) use ($process){
    $data = $process->read();  //can read?
    echo "receive :   $data \n";
  });
}


//run php process_event.php
 ?>
