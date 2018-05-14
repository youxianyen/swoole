<?php
// create
$ws = new swoole_websocket_server("0.0.0.0", 9501);

//on
//open $ws $request
$ws->on('open', function($ws, $request){
  var_dump($request);
  $ws->push($request->fd, "welcome \n");
});

//message
$ws->on('message', function ($ws, $request){
  echo "Message: $request->data";
  $ws->push($request->fd, 'get it message');
});

//close
$ws->on('close', function ($ws, $request)
{
  echo "close\n";
});

$ws->start();
 ?>
