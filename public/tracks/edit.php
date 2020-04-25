<?php
  require_once('../../private/initialize.php');
  if(!isset($_GET['id'])) {
    redirect_to(url_for('index.php'));
  }
  $id = $_GET['id'];
?>

<h2>Edit the Entry</h2>

<?php
  if(is_post_request()) {
    $track = [];
    $track['id'] = $id;
    $track['name'] = $_POST['name'];
    $track['image'] = $_POST['image'];
    $track['length'] = $_POST['length'];

    update_track($track);
    redirect_to(url_for('tracks/show.php?id=' . $id));
  } else {
    $entry = find_entry_by_id("tracks", $id);
  }
?>

<!-- <p><?php print_r($entry); ?></p> -->

<?php include(SHARED_PATH . '/header.php'); ?>

<form action="<?php echo url_for('tracks/edit.php?id=' . h(u($id))); ?>" method="post">
  <input type="text" name="name" value="<?php echo $entry['name']; ?>"><br>
  <input type="text" name="image" value="<?php echo $entry['image']; ?>"><br>
  <input type="text" name="length" value="<?php echo $entry['length']; ?>"><br>
  <input type="submit" value="Submit">
</form>

<br>
<p><?php echo $entry['name']; ?></p>

<a href="<?php echo url_for('/tracks/show.php?id=' . h(u($id))); ?>">Back to Show Page</a>

<?php include(SHARED_PATH . '/footer.php'); ?>
