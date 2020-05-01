<?php

function test_greeting() {
  return "Hello world";
};

function url_for($script_path) {
  // add leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function u($string="") {
  return urlencode($string);
}

function raw($string="") {
  return rawurlencode($string);
}

function h($string="") {
  return htmlspecialchars($string);
}

function error_404() {
  header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
  exit();
}

function error_500() {
  header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
  exit();
}

function redirect_to($location) {
  return header("Location: " . $location);
  exit;
}

function is_post_request() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
  return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function lap_time_to_printout($time) {
  $track_time = [];
  $minutes = intdiv($time, 60000);
  $track_time['minutes'] = $minutes;
  $time -= ($minutes * 60000);
  $seconds = intdiv($time, 1000);
  $track_time['seconds'] = $seconds;
  $time -= ($seconds * 1000);
  $milliseconds = $time;
  $track_time['milliseconds'] = $milliseconds;
  return $track_time;
}

function populate_bhp_group($bhp) {
  $group = ceil($bhp / 100) * 100;
  return $group;
}

function get_groups($times) {
  $groups = [];
  foreach ($times as $key => $value) {
    $groups[] = $value['power_group'];
  }
  $groups = array_unique($groups);
  sort($groups);
  return $groups;
}

?>
