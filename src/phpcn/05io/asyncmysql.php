<?php
//http://www.php.cn/code/20634.html
//instantiation
$db = new swoole_mysql();

$config = [
  'host'=>'192.168.30.133',
  'user'=>'root',
  'password'=>'root',
  'database'=>'mysql',
  'charset'=>'utf8'
];
//connect data
$db->connect($config, function($db, $r){
  if ($r === false) {
    var_dump($db->connect_errno, $db->connect_error);
    die('fail to connect db\n');
  }
  //success
  $sql = ' show tables';
  $db->query($sql, function(swoole_mysql $db, $r){
    if ($r === false) {
      var_dump($db->error);
      die('fail to query\n');
    }elseif ($r === true) {
      var_dump($db->affected_rows, $db->insert_id);

    }
    var_dump($r);
    $db->close();
  });
});

 ?>
