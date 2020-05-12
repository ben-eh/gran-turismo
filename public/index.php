<?php require_once('../private/initialize.php'); ?>

<?php $tracks = find_all_entries("tracks"); ?>

<?php include(SHARED_PATH . '/header.php'); ?>

<h1>Testing</h1>

<ul>
  <?php foreach ($tracks as $track): ?>
    <li><a href="<?php echo url_for('tracks/show.php?track_id=' . u($track['id'])); ?>"><?php echo $track['name']; ?></a></li>
  <?php endforeach ?>
</ul>
<br>
<a href="<?php echo url_for('/tracks/new.php'); ?>">Add a Track</a>

<?php include(SHARED_PATH . '/footer.php') ?>



progress: tutorials - 7.2

