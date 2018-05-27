<?php
// new lock object
$lock = new swoole_lock(SWOOLE_MUTEX);  //mutex locks
echo ("new mutex lock\n");
$lock->lock();  //start lock main process
if (pcntl_fork() > 0) {
  sleep(1);
  $lock->unlock();  //unlock
} else {
  echo ("child process waiting for lock\n");
  $lock->lock();  //locks
  echo ("child process  get lock\n");
  $lock->unlock();  //release locks
  exit("  --child process exit-- \n");
}
echo ("main process release lock\n");
unset($lock);
sleep(1);
echo ("child process exit\n");
 ?>
