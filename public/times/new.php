<?php include_once('../../private/initialize.php'); ?>

<?php $track_id = $_GET['id'];
$track = find_entry_by_id("tracks", $track_id); ?>
<h2>New Time for <?php echo $track['name']; ?></h2>
<?php

  $users = find_all_entries("users");
  $cars = find_all_entries("cars");

?>

<form action="<?php echo url_for('times/create.php'); ?>" method="POST">
  <input type="number" name="minutes"> :
  <input type="number" name="seconds"> :
  <input type="number" name="milliseconds">
  <br>
  <select name="driver">
    <?php foreach($users as $user): ?>
      <option value="<?php echo $user['id']; ?>"><?php echo $user['name']; ?></option>
    <?php endforeach ?>
  </select>
  <br>
  <select name="car">
    <?php foreach($cars as $car): ?>
      <option value="<?php echo $car['id']; ?>"><?php echo $car['name']; ?></option>
    <?php endforeach ?>
  </select>
  <br>
  <input type="text" name="bhp" placeholder="BHP">
  <br>
  <input type="hidden" name="track_id" value="<?php echo $track_id; ?>">
  <input type="submit" value="Submit">
</form>

<br>

<button>
  <a href="<?php echo url_for('index.php'); ?>">Cancel</a>
</button>

<?php include(SHARED_PATH . '/footer.php'); ?>
