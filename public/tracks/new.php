<?php require_once('../../private/initialize.php'); ?>

<?php

if(is_post_request()) {
  // process the form, create the entry or display the errors
  $track = [];
  $track['name'] = $_POST['name'];
  $track['image'] = $_POST['image'];
  $track['length'] = $_POST['length'];

  $result = insert_track($track);

  if($result === true) {
    $new_id = mysqli_insert_id($db);
    redirect_to(url_for('tracks/show.php?id=' . $new_id));
    // echo "no errors";
  } else {
    $errors = $result;
  }

}

  include(SHARED_PATH . '/header.php'); ?>

  <h2>Add Track</h2>

  <?php echo display_errors($errors); ?>

  <form action="<?php echo url_for('tracks/new.php'); ?>" method="POST">
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
