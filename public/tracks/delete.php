<?php

  require_once('../../private/initialize.php');
  $track_id = $_GET['track_id'];

  if(is_post_request()) {
    delete_entry("tracks", $track_id);
    redirect_to(url_for('index.php'));
  } else {
    $track = find_entry_by_id("tracks", $track_id);
  }

?>

<?php $page_title = 'Delete Track'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<h2>Delete "<?php echo $track['name']; ?>" Track?</h2>
<br>
<p>Are you sure you want to delete the track?</p>
<a href="<?php echo url_for('tracks/show.php?track_id=' . $track_id); ?>">Cancel</a>

<form action="<?php echo url_for('/tracks/delete.php?track_id=' . $track_id); ?>" method="post">
  <input type="submit" name="commit" value="Delete Track" />
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>
