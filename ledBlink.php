<?php 
$loop = 0;
//echo exec('/home/try.sh');
while ($loop < 10)
{
echo $loop;
//echo exec('ls /home/');
echo "hey";
//echo exec('echo hey >> /home/data.log');
echo shell_exec("echo satunol10 | sudo echo 0 > /sys/devices/platform/leds-sunxi/leds/led1/brightness");
//sleep(1);
echo shell_exec("echo satunol10 | sudo echo 255 > /sys/devices/platform/leds-sunxi/leds/led1/brightness");
//sleep(1);
$loop++;
echo exec('whoami');
}

?>
