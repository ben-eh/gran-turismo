<?php

  require_once('../../private/initialize.php');
  $time_id = $_GET['time_id'];
  $track_id = $_GET['track_id'];

  if(is_post_request()) {
    delete_entry("times", $time_id);
    // $track_id = $_POST['track_id'];
    redirect_to(url_for('tracks/show.php?track_id=' . h(u($_POST['track_id']))));
  }

?>

<?php $page_title = 'Delete Lap Time'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<p>Are you sure you want to delete this lap time?</p>
<a href="<?php echo url_for('tracks/show.php?track_id=' . h(u($track_id))); ?>">Cancel</a>

<form action="<?php echo url_for('/times/delete.php?time_id=' . h(u($time_id)) . '&track_id=' . $track_id); ?>" method="post">
  <input type="hidden" name="track_id" value="<?php echo $track_id; ?>">
  <input type="submit" name="commit" value="Delete Lap Time" />
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>
