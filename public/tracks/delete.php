<?php

  require_once('../../private/initialize.php');
  $id = $_GET['id'];

  if(is_post_request()) {
    delete_entry("tracks", $id);
    redirect_to(url_for('index.php'));
  } else {
    $track = find_entry_by_id("tracks", $id);
  }

?>

<?php $page_title = 'Delete Track'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<h2>Delete Subject</h2>
<br>
<p>Are you sure you want to delete the <?php echo $track['name']; ?> entry?</p>
<a href="<?php echo url_for('tracks/show.php?id=' . $id); ?>">Cancel</a>

<form action="<?php echo url_for('/tracks/delete.php?id=' . h(u($track['id']))); ?>" method="post">
  <input type="submit" name="commit" value="Delete Track" />
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>
