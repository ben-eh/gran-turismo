<?php

  function find_all_entries($table) {
    global $db;
    $sql = "SELECT * FROM `" . $table ."` ";
    $sql .= "ORDER BY name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_entry_by_id($table, $id) {
    global $db;
    $id = $_GET['id'];
    $sql = "SELECT * FROM `" . $table . "` WHERE `id` = '" . $id . "'";
    $result_set = mysqli_query($db, $sql);
    confirm_result_set($result_set);
    $entry = mysqli_fetch_assoc($result_set);
    mysqli_free_result($result_set); // releasing returned data 'cause it's saved in a variable now
    // print_r($entry);
    return $entry;
  }

  function update_track($track) {
    global $db;
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
