<?php

  require_once('../../private/initialize.php');
  $id = $_GET['id'];
  $track_id = $_GET['track_id'];
  echo $id;
  echo $track_id;

  if(is_post_request()) {
    delete_entry("times", $id);
    redirect_to(url_for('index.php'));
  } else {
    $track_id = find_entry_by_id("tracks", $id);
  }

?>

<?php $page_title = 'Delete Lap Time'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<h2>Delete Lap Time</h2>
<br>
<p>Are you sure you want to delete this lap time?</p>
<a href="<?php echo url_for('tracks/show.php?id=' . $track_id); ?>">Cancel</a>

<form action="<?php echo url_for('/times/delete.php?id=' . h(u($id))); ?>" method="post">
  <input type="submit" name="commit" value="Delete Lap Time" />
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>
