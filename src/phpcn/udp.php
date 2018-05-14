<?php
$serv = new swoole_server("0.0.0.0", 9502, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);
//jianting
/*
  $serv: server
  $data: receive data
  $fd: client
*/
$serv->on('packet', function ($serv, $data, $fd)
{
  //send
  $serv->sendto($fd['address'], $fd['port'], "server: $data");
  var_dump($fd);
});

$serv->start();  //
//something was wrong;
?>
