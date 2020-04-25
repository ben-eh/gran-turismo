<?php require_once('../../private/initialize.php'); ?>

<?php
  $id = $_GET['id'];
  $entry = find_entry_by_id("tracks", $id);
  // print_r($entry);
?>

<?php include(SHARED_PATH . '/header.php'); ?>



<h2><?php echo $entry['name']; ?></h2>

<a href="<?php echo url_for('times/new.php?id=' . $id); ?>">Add a Time</a>
<br>
<a href="<?php echo url_for('index.php'); ?>">Back to Index</a>
<br>
<a href="<?php echo url_for('tracks/edit.php?id=' . h(u($id))); ?>">Edit Track</a>
<br>
<a href="<?php echo url_for('tracks/delete.php?id=' . h(u($id))); ?>">Delete Track</a>

<?php include(SHARED_PATH . '/footer.php'); ?>
