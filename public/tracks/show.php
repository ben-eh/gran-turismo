<?php require_once('../../private/initialize.php'); ?>

<?php
  $id = $_GET['id'];
  $track = find_entry_by_id("tracks", $id);
  $times = isset($_GET['pg']) ? find_times_by_track_and_pg($id, $_GET['pg']) : find_times_by_track_id($id);
  // $times = find_times_by_track_id($id);
  $groups = get_groups($times);
  // echo gettype($times);
  // print_r($times);
  // print_r($times);
  // echo $times[0]['lap'];
  // echo $times[1]['lap'];
  // print_r($laps);
  print_r($groups);
?>

<?php include(SHARED_PATH . '/header.php'); ?>


<h2><?php echo $track['name']; ?></h2>
<h4>Top Times</h4>

<table>
  <tr>
    <th>Lap Time</th>
    <th>Driver</th>
    <th>Car</th>
    <th>BHP</th>
    <th>&nbsp</th>
    <th>&nbsp</th>
  </tr>
  <?php foreach($times as $key => $value) { ?>
    <tr>
    <?php $print_time = lap_time_to_printout($value['lap']); ?>
    <td>
      <?php echo $print_time['minutes'] . ":" . str_pad($print_time['seconds'], 2, '0', STR_PAD_LEFT) . ":" . str_pad($print_time['milliseconds'], 3, '0', STR_PAD_LEFT); ?>
    </td>
    <td><?php echo $value['driver']; ?></td>
    <td><?php echo $value['car']; ?></td>
    <td><?php echo $value['bhp']; ?></td>
    <td><a href="<?php echo url_for('/times/edit.php?id=' . h(u($value['id']))); ?>">Edit</a></td>
    <td><a href="<?php echo url_for('/times/delete.php?id=' . h(u($value['id'])) . '&track_id=' . h(u($id))); ?>">Delete</a></td>
    </tr>
  <?php } ?>
</table>

<ul>
  <?php foreach ($groups as $key => $value) { ?>
    <li><a href="<?php echo url_for('tracks/show.php?id=' . h(u($id)) . '&pg=' . h(u($value))); ?>"><button><?php echo $value-100 . "-" . $value . " HP Class"; ?></button></a></li>
  <?php } ?>
</ul>

<a href="<?php echo url_for('times/new.php?id=' . $id); ?>">Add a Time</a>
<br>
<a href="<?php echo url_for('index.php'); ?>">Back to Index</a>
<br>
<a href="<?php echo url_for('tracks/edit.php?id=' . h(u($id))); ?>">Edit Track</a>
<br>
<a href="<?php echo url_for('tracks/delete.php?id=' . h(u($id))); ?>">Delete Track</a>

<?php include(SHARED_PATH . '/footer.php'); ?>
