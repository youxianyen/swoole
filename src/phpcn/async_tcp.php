<?php
//create
$client = new swoole_client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);

//register
$client->on('connect', function ($cli){
  $cli->send("hello \n");
});

//receive
$client->on("receive", function($cli, $data){
  echo "data: $data";
});

//fail
$client->on('error', function ($cli){
  echo "fail \n";
});

//close
$client->on('close', function ($cli){
  echo 'close \n';
});

//connect
$client->connect("192.168.30.133", 8080, 10);

//local can't test
 ?>
