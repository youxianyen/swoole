<?php
/*
  http://www.php.cn/code/20622.html
  2-7 tcip
*/
//create tcp
header("Content-type: text/html; charset=utf-8");
$serv = new swoole_server("0.0.0.0", 9501);

//set ansync_task
$serv->set(array('task_worker_num' => 4));

//
$serv->on("receive", function ($serv, $fd, $from_id, $data){
  $task_id = $serv->task($data); //yibu id
  echo '\n';

  echo ("async id : $task_id\n");
  print_r($data);
  echo '\n';
});

//
$serv->on('task', function ($serv, $task_id, $from_id, $data){
  echo ("run yibu id : $task_id");
  $serv->finish("$data -> OK");
});

//result
$serv->on('finish', function ($serv, $task_id, $data){
  echo "fiinish";
});

$serv->start();
 ?>
