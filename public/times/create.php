<?php

  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $minutes = $_POST['minutes'];
    $seconds = $_POST['seconds'];
    $milliseconds = $_POST['milliseconds'];
    $user_id = $_POST['driver'];
    $car_id = $_POST['car'];
    $track_id = $_POST['track_id'];
    $lap = ($minutes * 60000) + ($seconds * 1000) + $milliseconds;

    $sql = "INSERT INTO `times` (`lap`, `track_id`, `car_id`, `user_id`) ";
    $sql .= "VALUES (";
    $sql .= "'" . $lap . "', ";
    $sql .= "'" . $track_id . "', ";
    $sql .= "'" . $car_id . "', ";
    $sql .= "'" . $user_id . "'";
    $sql .= ")";

    $query_result = mysqli_query($db, $sql);

    if($query_result) {
      redirect_to(url_for('tracks/show.php?id=' . u($track_id)));
    } else {
      redirect_to(url_for('tracks/new.php?id=' . u($track_id)));
    }
  }

?>


<h2>Create Page</h2>
