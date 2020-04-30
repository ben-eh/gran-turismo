<?php require_once('../../private/initialize.php'); ?>

<?php
  $id = $_GET['id'];
  $track = find_entry_by_id("tracks", $id);
  $times = find_times_by_track_id($id);
  echo gettype($times);
  // print_r($times);
  print_r($times);
  echo $times[0]['lap'];
  echo $times[1]['lap'];
  $laps = lap_time_to_printout($times[0]['lap']);
  print_r($laps);
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
  </tr>
  <?php foreach($times as $key => $value) { ?>
    <tr>
    <?php $print_time = lap_time_to_printout($value['lap']); ?>
    <td>
      <li><?php echo $print_time['minutes'] . ":" . str_pad($print_time['seconds'], 2, '0', STR_PAD_LEFT) . ":" . str_pad($print_time['milliseconds'], 3, '0', STR_PAD_LEFT); ?></li>
    </td>
    <td><?php echo $value['driver']; ?></td>
    <td><?php echo $value['car']; ?></td>
    <td><?php echo $value['bhp']; ?></td>
    </tr>
  <?php } ?>
</table>

<a href="<?php echo url_for('times/new.php?id=' . $id); ?>">Add a Time</a>
<br>
<a href="<?php echo url_for('index.php'); ?>">Back to Index</a>
<br>
<a href="<?php echo url_for('tracks/edit.php?id=' . h(u($id))); ?>">Edit Track</a>
<br>
<a href="<?php echo url_for('tracks/delete.php?id=' . h(u($id))); ?>">Delete Track</a>

<?php include(SHARED_PATH . '/footer.php'); ?>
