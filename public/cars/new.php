<?php require_once('../../private/initialize.php'); ?>
<?php

$test = $_GET['test'] ?? '';

if($test == '404') {
  error_404();
} elseif($test == '500') {
  error_500();
} elseif($test == 'redirect') {
  redirect_to(url_for('index.php'));
}
?>

<?php $page_title = "Add a Car"; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<a href="<?php echo url_for('index.php'); ?>">Back to Index</a>

<h2>Testing Add Car Page</h2>

<form action="<?php echo url_for('cars/create.php'); ?>" method="post">
  <label for="name">Car:</label><br>
  <input type="text" name="name"><br>
  <br>
  <label for="image">image url:</label><br>
  <input type="text" name="image"><br>
  <br>
  <label for="user">Driver:</label><br>
  <select name="user">
    <option value="1">Ben</option>
    <option value="2">Nithin</option>
    <option value="3">Adam</option>
    <option value="4">Tenzin</option>
    <option value="5">Dan</option>
  </select><br>
  <!-- <input type="radio" name="user" value="1">
  <label for="name">Ben</label><br>
  <input type="radio" name="user" value="2">
  <label for="name">Nithin</label><br>
  <input type="radio" name="user" value="3">
  <label for="name">Adam</label><br>
  <input type="radio" name="user" value="4">
  <label for="name">Tenzin</label><br>
  <input type="radio" name="user" value="5">
  <label for="name">Dan</label><br>
  <br> -->
  <input type="submit" value="Submit">
</form>

<?php include(SHARED_PATH . '/footer.php'); ?>
