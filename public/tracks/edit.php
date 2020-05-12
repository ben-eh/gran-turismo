<?php
  require_once('../../private/initialize.php');
  if(!isset($_GET['track_id'])) {
    redirect_to(url_for('index.php'));
  }
  $track_id = $_GET['track_id'];
?>

<h2>Edit the Entry</h2>

<?php
  if(is_post_request()) {
    $track = [];
    $track['id'] = $track_id;
    $track['name'] = $_POST['name'];
    $track['image'] = $_POST['image'];
    $track['length'] = $_POST['length'];

    update_track($track);
    redirect_to(url_for('tracks/show.php?track_id=' . $track_id));
  } else {
    $entry = find_entry_by_id("tracks", $track_id);
  }
?>

<!-- <p><?php print_r($entry); ?></p> -->

<?php include(SHARED_PATH . '/header.php'); ?>

<form action="<?php echo url_for('tracks/edit.php?track_id=' . h(u($track_id))); ?>" method="post">
  <input type="text" name="name" value="<?php echo $entry['name']; ?>"><br>
  <input type="text" name="image" value="<?php echo $entry['image']; ?>"><br>
  <input type="text" name="length" value="<?php echo $entry['length']; ?>"><br>
  <input type="submit" value="Submit">
</form>

<br>

<a href="<?php echo url_for('/tracks/show.php?track_id=' . h(u($track_id))); ?>">Back to Show Page</a>

<?php include(SHARED_PATH . '/footer.php'); ?>
