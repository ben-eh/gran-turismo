<?php

// $time = 2:29:351;
$minutes = 2;
$seconds = 29;
$milliseconds = 351;

$time = ($minutes * 60000) + ($seconds * 1000) + $milliseconds;

echo $time;
echo "\n";

$conv_minutes = intdiv($time, 60000);
echo $conv_minutes;
echo "\n";

$time -= ($conv_minutes * 60000);
echo $time;
echo "\n";

$conv_seconds = intdiv($time, 1000);
echo $conv_seconds;
echo "\n";

$times = [];
$times() = date("r");
print_r $times;

// echo date("r");


?>
