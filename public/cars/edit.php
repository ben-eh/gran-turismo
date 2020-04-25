<?php require_once('../../private/initialize.php'); ?>

<?php
  if(!isset($_GET['id'])) {
    redirect_to(url_for('index.php'));
  }
  $id = $_GET['id'];
  $name = '';
  $image = '';

  if(is_post_request()) {
    $name = $_POST['name'] ?? '';
    $image = $_POST['image'] ?? '';
    $user = $_POST['user'] ?? '';

    echo "Form parameters<br />";
    echo $name . "<br />";
    echo $image . "<br />";
    echo $user . "<br />";
  }
?>

<?php $page_title = "Edit Your Car"; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<a href="<?php echo url_for('index.php'); ?>">Back to Index</a>

<h2>Testing Edit a Car Page</h2>

<form action="<?php echo url_for('cars/edit.php?id=' . h(u($id))); ?>" method="post">
  <label for="name">Car:</label><br>
  <input type="text" name="name" value="<?php echo $name; ?>"><br>
  <br>
  <label for="image">image url:</label><br>
  <input type="text" name="image" value="<?php echo $image; ?>"><br>
  <br>
  <label for="user">Driver:</label>
  <select name="users" id="user">
    <option value="1">Ben</option>
    <option value="2">Nithin</option>
    <option value="3">Adam</option>
    <option value="4">Tenzin</option>
    <option value="5">Dan</option>
  </select><br>
  <br>
  <input type="submit" value="Submit">
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>
