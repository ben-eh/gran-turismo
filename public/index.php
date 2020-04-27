<?php require_once('../private/initialize.php'); ?>

<?php

  // $tracks_set = find_all_entries("tracks");
  // $tracks = mysqli_fetch_fields($tracks_set);
  // print_r($tracks);
  // while($track = mysqli_fetch_assoc($tracks_set)) {
  //   $tracks[] = $track;
  // }
  $tracks = find_all_entries("tracks");
?>

<?php include(SHARED_PATH . '/header.php'); ?>

<h1>Testing</h1>
<!-- <p><?php echo test_greeting(); ?></p> -->

<ul>
<!--   <?php while($track = mysqli_fetch_assoc($tracks_set)): ?>
    <a href="<?php echo url_for('tracks/show.php?id=' . u($track['id'])); ?>"><li><?php echo $track['name']; ?></li></a>
  <?php endwhile ?> -->
  <?php foreach ($tracks as $track): ?>
    <li><a href="<?php echo url_for('tracks/show.php?id=' . u($track['id'])); ?>"><?php echo $track['name']; ?></a></li>
  <?php endforeach ?>
</ul>
<br>
<a href="<?php echo url_for('/tracks/new.php'); ?>">Add a Track</a>

<!-- <?php mysqli_free_result($tracks); ?> -->

<?php include(SHARED_PATH . '/footer.php') ?>



progress: tutorials - 7.2

