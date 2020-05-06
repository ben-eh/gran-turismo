<h2>Create Track Page</h2>

<?php

  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $track = [];
    $track['name'] = $_POST['name'];
    $track['image'] = $_POST['image'];
    $track['length'] = $_POST['length'];

    $result = insert_track($track);

    if($result === true) {
      $new_id = mysqli_insert_id($db);
      redirect_to(url_for('tracks/show.php?id=' . $new_id));
    } else {
      $errors = $result;
      var_dump($errors);
    }

  } else {
    redirect_to(url_for('/tracks/new.php'));
  }
?>
