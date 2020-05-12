<?php

  require_once('../../private/initialize.php');

  if(is_post_request()) {
    print_r($_POST);
    $id = $_GET['id'];
    $track_id = $_GET['track_id'];
    echo $id;
    echo $track_id;
    $minutes = $_POST['minutes'];
    $seconds = $_POST['seconds'];
    $milliseconds = $_POST['milliseconds'];
    $lap = ($minutes * 60000) + ($seconds * 1000) + $milliseconds;
    $car_id = $_POST['car'];
    $user_id = $_POST['driver'];
    $bhp = $_POST['bhp'];

    $sql = "UPDATE `times` SET ";
    $sql .= "`lap` = '" . $lap . "', ";
    $sql .= "`track_id` = '" . $track_id . "', ";
    $sql .= "`car_id` = '" . $car_id . "', ";
    $sql .= "`user_id` = '" . $user_id . "', ";
    $sql .= "`bhp` = '" . $bhp . "', ";
    $sql .= "`power_group` = '" . populate_bhp_group($bhp) . "' ";
    $sql .= "WHERE `id`='" . $id . "' ";
    $sql .= "LIMIT 1";

    $query_result = mysqli_query($db, $sql);

    if($query_result) {
      redirect_to(url_for('tracks/show.php?track_id=' . u($track_id)));
      // echo "should be successful";
    } else {
      // redirect_to(url_for('index.php'));
      echo "something isn't working";
    }
  }

?>
