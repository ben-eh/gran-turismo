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

function generate_bhp_group($bhp) {
  switch(true) {
    case $bhp >= 100 && $bhp < 200: return "100-200"; break;
    case $bhp >= 200 && $bhp < 300: return "200-300"; break;
    case $bhp >= 300 && $bhp < 400: return "300-400"; break;
    case $bhp >= 400 && $bhp < 500: return "400-500"; break;
    case $bhp >= 500 && $bhp < 600: return "500-600"; break;
    case $bhp >= 600 && $bhp < 700: return "600-700"; break;
    case $bhp >= 700 && $bhp < 800: return "700-800"; break;
    case $bhp >= 800 && $bhp < 900: return "800-900"; break;
    case $bhp >= 900 && $bhp < 1000: return "900-1000"; break;
    case $bhp >= 1000 && $bhp < 1100: return "1000-1100"; break;
    case $bhp >= 1100 && $bhp < 1200: return "1100-1200"; break;
    case $bhp >= 1200 && $bhp < 1300: return "1200-1300"; break;
    case $bhp >= 1300 && $bhp < 1400: return "1300-1400"; break;
    case $bhp >= 1400 && $bhp < 1500: return "1400-1500"; break;
    case $bhp >= 1500 && $bhp < 1600: return "1500-1600"; break;
    case $bhp >= 1600 && $bhp < 1700: return "1600-1700"; break;
    case $bhp >= 1700 && $bhp < 1800: return "1700-1800"; break;
    case $bhp >= 1800 && $bhp < 1900: return "1800-1900"; break;
    case $bhp >= 1900 && $bhp < 2000: return "1900-2000"; break;
    case $bhp >= 2000 && $bhp < 2100: return "2000-2100"; break;
    case $bhp >= 2100 && $bhp < 2200: return "2100-2200"; break;
    case $bhp >= 2200 && $bhp < 2300: return "2200-2300"; break;
    case $bhp >= 2300 && $bhp < 2400: return "2300-2400"; break;
    case $bhp >= 2400 && $bhp < 2500: return "2400-2500"; break;
    case $bhp >= 2500 && $bhp < 2600: return "2500-2600"; break;
    case $bhp >= 2600 && $bhp < 2700: return "2600-2700"; break;
    case $bhp >= 2700 && $bhp < 2800: return "2700-2800"; break;
    case $bhp >= 2800 && $bhp < 2900: return "2800-2900"; break;
    case $bhp >= 2900 && $bhp < 3000: return "2900-3000"; break;
    case $bhp >= 3000 && $bhp < 3100: return "3000-3100"; break;
  }
}

?>
