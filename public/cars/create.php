<?php require_once('../../private/initialize.php') ?>

<?php

  if(is_post_request()) {
    $name = $_POST['name'] ?? '';
    $image = $_POST['image'] ?? '';
    $user = $_POST['user'] ?? '';

    echo "Form parameters<br />";
    echo $name . "<br />";
    echo $image . "<br />";
    echo $user . "<br />";
  } else {
    redirect_to(url_for('cars/new.php'));
  }

?>
