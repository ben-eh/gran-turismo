<?php include_once('../../private/initialize.php'); ?>

<?php $track_id = $_GET['id']; ?>
<h2>New Time</h2>
<p><?php echo $track_id ?></p>
<?php

  $users_result = find_all_entries("users");
  $users =
  print_r($users);

?>
