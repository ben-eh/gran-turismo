<?php

  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $lap = [];
    $minutes = isset($_POST['minutes']) ? $_POST['minutes'] : 0;
    $seconds = isset($_POST['seconds']) ? $_POST['seconds'] : 0;
    $milliseconds = isset($_post['milliseconds']) ? $_post['milliseconds'] : 0;
    $lap['lap_time'] = ($minutes * 60000) + ($seconds * 1000) + $milliseconds;
    $lap['user_id'] = $_POST['driver'];
    $lap['car_id'] = $_POST['car'];
    $lap['track_id'] = $_POST['track_id'];
    $lap['bhp'] = $_POST['bhp'];

    $result = insert_lap_time($lap);
    // if($result === true) {
    //   echo "result is true";
    // } else {
    //   echo "result is not true";
    // }

    redirect_to(url_for('tracks/show.php?track_id=' . h(u($lap['track_id']))));

    // print_r($result);

    // redirect_to(url_for('tracks/show.php?id=' . u($lap['track_id'])));

  }

?>
