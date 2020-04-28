<?php require_once('../../private/initialize.php'); ?>

<?php
  $id = $_GET['id'];
  $track = find_entry_by_id("tracks", $id);
  $times = find_times_by_track_id($id);
  // print_r($times);
  print_r($times);
?>

<?php include(SHARED_PATH . '/header.php'); ?>


<h2><?php echo $track['name']; ?></h2>

<h4>Top Times</h4>
<ul>
  <?php foreach($times as $time): ?>
    <li><?php echo  ?></li>
  <?php endforeach ?>
</ul>

<a href="<?php echo url_for('times/new.php?id=' . $id); ?>">Add a Time</a>
<br>
<a href="<?php echo url_for('index.php'); ?>">Back to Index</a>
<br>
<a href="<?php echo url_for('tracks/edit.php?id=' . h(u($id))); ?>">Edit Track</a>
<br>
<a href="<?php echo url_for('tracks/delete.php?id=' . h(u($id))); ?>">Delete Track</a>

<?php include(SHARED_PATH . '/footer.php'); ?>
