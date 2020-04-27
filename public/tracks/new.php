<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<h2>Add Track</h2>

<form action="<?php echo url_for('tracks/create.php'); ?>" method="POST">
  <input type="text" name="name" placeholder="Name"><br>
  <input type="text" name="image" placeholder="photo url"><br>
  <input type="text" name="length" placeholder="length (km)"><br>
  <input type="submit" value="Submit">
</form>

<br>

<button>
  <a href="<?php echo url_for('index.php'); ?>">Cancel</a>
</button>

<?php include(SHARED_PATH . '/footer.php'); ?>
