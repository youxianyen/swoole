<?php
$serv = new swoole_http_server("0.0.0.0", 9501);
//
/*
  $request:
  $response:
*/
$serv->on('request', function($request, $response){
  var_dump($request);
  $response->header("Content-Type", "text/html; charset=utf-8");  //fanhui
  $response->end("Hello world " . rand(100, 999));  //send message
});
$serv->start();

//php web.php
//use:192.168.30.133:9501
?>
