<h2>Create Track Page</h2>

<?php

  require_once('../../private/initialize.php');

  if(is_post_request()) {
    $name = $_POST['name'];
    $image = $_POST['image'];
    $length = $_POST['length'];

    $sql = "INSERT INTO `tracks` (`name`, `image`, `length`) ";
    $sql .= "VALUES (";
    $sql .= "'" . $name . "', ";
    $sql .= "'" . $image . "', ";
    $sql .= "'" . $length . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is a boolean

    if($result) {
      $new_id = mysqli_insert_id($db);
      redirect_to(url_for('index.php'));
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  } else {
    redirect_to(url_for('/tracks/new.php'));
  }
?>
