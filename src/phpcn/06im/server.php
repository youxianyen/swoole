<?php
//server code
//new websocket server
$ws = new swoole_websocket_server("0.0.0.0", 9502);

//on function open message close
//open
$ws->on("open", function($ws, $request){
  echo ("new user $request->fd join in.\n");
  $GLOBALS['fd'][$request->fd]['id'] = $request->fd;  //set user id
  $GLOBALS['fd'][$request->fd]['name'] = 'anonymous';
});
//message
//$ws-on('message', function($ws, $request){
  $ws->on("message", function($ws, $request){
  $msg = $GLOBALS['fd'][$request->fd]['name'].":".$request->data."\n";
  if (strstr($request->data, "#name")) { //set user nickname
    $GLOBALS['fd'][$request->fd]['name'] = str_replace("#name", $request->data);
  }else {//send message
    //send to every client
    foreach ($GLOBALS['fd'] as $i) {
      $ws->push($i['fd'], $msg);
    }
  }
});

//close
$ws-on("close", function($ws, $request){
  echo ("client-{$request} disconnect");
  unset($GLOBALS['fd'][$request]);  //clean connection pool
});

$ws->start();
 ?>
