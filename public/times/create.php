<?php

  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $minutes = $_POST['minutes'];
    $seconds = $_POST['seconds'];
    $milliseconds = $_POST['milliseconds'];
    $user_id = $_POST['driver'];
    $car_id = $_POST['car'];
    $track_id = $_POST['track_id'];
    $bhp = $_POST['bhp'];
    $lap = ($minutes * 60000) + ($seconds * 1000) + $milliseconds;

    $sql = "INSERT INTO `times` (`lap`, `track_id`, `car_id`, `user_id`, `bhp`, `power_group`) ";
    $sql .= "VALUES (";
    $sql .= "'" . $lap . "', ";
    $sql .= "'" . $track_id . "', ";
    $sql .= "'" . $car_id . "', ";
    $sql .= "'" . $user_id . "', ";
    $sql .= "'" . $bhp . "', ";
    $sql .= "'" . populate_bhp_group($bhp) . "'";
    $sql .= ")";

    $query_result = mysqli_query($db, $sql);

    if($query_result) {
      redirect_to(url_for('tracks/show.php?id=' . u($track_id)));
    } else {
      redirect_to(url_for('tracks/show.php?id=' . u($track_id)));
    }
  }

?>


<h2>Create Page</h2>
