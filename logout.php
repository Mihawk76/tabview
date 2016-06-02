<?php 
session_start();
session_destroy();
echo shell_exec("./start_led.sh");
header('Location: login.php');
exit;
?>
