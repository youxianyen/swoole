<?php
//
$host = '0.0.0.0';  //string
$port = 9501;  //int
//$serv = new swoole_server($host_port, $mode, $sock_type);
$serv = new swoole_server($host, $port);
/*
  $host : 127.0.0.1;
              192.168.30.133 waiwang ip
              0.0.0.0
  ipv4 / ipv6 ::0
  $port: 1024yixia root
  9501
  $mode: SWOOLE_P_ROCESS
  $sock_type: SWOOLE_SOCK_TCP

  use
  bool $swoole_server->on(string $event, mixed $callback)
  event:
  connect: $serv, $fd
  receive: $serv, $fd, $from_id, $data
  close:
*/

$serv->on('connect', function($serv, $fd){

  echo 'Start connecting: \n';
});

$serv->on('receive', function($serv, $fd, $from_id, $data){
  echo 'receive data:\n ';
  var_dump($data);
});

$serv->on('close', function($serv, $fd){
  echo 'stop connectiong; \n';
});

$serv->start();
 ?>
