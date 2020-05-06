<?php

  function find_all_entries($table) {
    global $db;
    $sql = "SELECT * FROM `" . $table ."` ";
    $sql .= "ORDER BY name ASC";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    while($result = mysqli_fetch_assoc($result_set)) {
      $results[] = $result;
    }
    mysqli_free_result($result_set);
    return $results;
  }

  function find_entry_by_id($table, $id) {
    global $db;
    // $id = $_GET['id'];
    $sql = "SELECT * FROM `" . $table . "` WHERE `id` = '" . $id . "'";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    $entry = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set); // releasing returned data 'cause it's saved in a variable now
    // print_r($entry);
    return $entry;
  }

  function validate_track($track) {
    $errors = [];
    // name
    if(is_blank($track['name'])) {
      $errors[] = "name cannot be blank";
    }

    // length
    if(is_blank($track['length'])) {
      $errors[] = "track needs a length";
    }

    return $errors;
  }

  function insert_track($track) {
    global $db;

    $errors = validate_track($track);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO `tracks` (`name`, `image`, `length`) ";
    $sql .= "VALUES (";
    $sql .= "'" . $track['name'] . "', ";
    $sql .= "'" . $track['image'] . "', ";
    $sql .= "'" . $track['length'] . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is a boolean

    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function find_times_by_track_id($id) {
    global $db;
    $sql = "SELECT times.lap, times.bhp, times.power_group, times.track_id, users.name AS 'driver', cars.name AS 'car' ";
    $sql .= "FROM `times` ";
    $sql .= "INNER JOIN `users` ON times.user_id=users.id ";
    $sql .= "INNER JOIN `cars` ON times.car_id=cars.id ";
    $sql .= "WHERE `track_id`='" . $id . "' ";
    $sql .= "ORDER BY `lap` ASC ";
    $sql .= "LIMIT 10";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    $results = [];
    while($result = mysqli_fetch_assoc($result_set)) {
      $results[] = $result;
    }
    mysqli_free_result($result_set);
    echo count($results);
    return $results;
  }

  function find_times_by_track_and_pg($id, $pg) {
    global $db;
    $sql = "SELECT times.lap, times.bhp, times.power_group, times.track_id, users.name AS 'driver', cars.name AS 'car' ";
    $sql .= "FROM `times` ";
    $sql .= "INNER JOIN `users` ON times.user_id=users.id ";
    $sql .= "INNER JOIN `cars` ON times.car_id=cars.id ";
    $sql .= "WHERE `track_id`='" . $id . "' ";
    $sql .= "AND `power_group`='" . $pg . "' ";
    $sql .= "ORDER BY `lap` ASC ";
    $sql .= "LIMIT 10";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    $results = [];
    while($result = mysqli_fetch_assoc($result_set)) {
      $results[] = $result;
    }
    mysqli_free_result($result_set);
    echo count($results);
    return $results;
  }

  function update_track($track) {
    global $db;

    $errors = validate_track($track);

    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE `tracks` SET ";
    $sql .= "name='" . $track['name'] . "', ";
    $sql .= "image='" . $track['image'] . "', ";
    $sql .= "length='" . $track['length'] . "' ";
    $sql .= "WHERE `id`='" . $track['id'] . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function delete_entry($table, $id) {
    global $db;
    $sql = "DELETE FROM `" . $table . "` WHERE `id`='" . $id . "'";
    $result = mysqli_query($db, $sql);
    if($result) {
      return true;
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

?>
