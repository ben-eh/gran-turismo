<?php include_once('../../private/initialize.php');

$time_id = $_GET['time_id'];
$lap_info = select_lap($time_id);
$printable_lap = lap_time_to_printout($lap_info['lap']);
$track_id = $lap_info['track_id'];
$users = find_all_entries("users");
$cars = find_all_entries("cars");

?>

<h2>Edit Lap</h2>

<form action="<?php echo url_for('times/update.php?id=' . h(u($time_id)) . '&track_id=' . h(u($track_id))); ?>" method="POST">
  <input type="number" value="<?php echo $printable_lap['minutes'] ?>" name="minutes"> :
  <input type="number" value="<?php echo $printable_lap['seconds'] ?>" name="seconds"> :
  <input type="number" value="<?php echo $printable_lap['milliseconds'] ?>" name="milliseconds">
  <br>
  <select name="driver">
    <?php foreach($users as $user):
      // using ternary operator inside of an echo statement
      echo "<option value=" . $user['id'] . (($user['id'] == $lap_info['user_id']) ? " selected" : "") . ">" . $user['name'] . "</option>";
    endforeach ?>
  </select>
  <br>
  <select name="car">
    <?php foreach($cars as $car):
      echo "<option value=" . $car['id'] . (($car['id'] == $lap_info['car_id']) ? " selected" : "") . ">" . $car['name'] . "</option>";
    endforeach ?>
  </select>
  <br>
  <input type="text" value="<?php echo $lap_info['bhp']; ?>" name="bhp">
  <br>
  <input type="hidden" name="track_id" value="<?php echo $track_id; ?>">
  <input type="submit" value="Update">
</form>

<br>

<button>
  <a href="<?php echo url_for('tracks/show.php?track_id=' . $track_id); ?>">Cancel</a>
</button>

<?php include(SHARED_PATH . '/footer.php'); ?>
