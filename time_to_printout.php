<?php

  function time_to_printout($time) {
    $track_time = [];
    $minutes = intdiv($time, 60000);
    $track_time['minutes'] = $minutes;
    $time -= ($minutes * 60000);
    $seconds = intdiv($time, 1000);
    $track_time['seconds'] = $seconds;
    $time -= ($seconds * 1000);
    $milliseconds = $time;
    $track_time['milliseconds'] = $milliseconds;
    return $track_time;
  }

  $track_time = time_to_printout(61435);

  print_r($track_time);

?>

