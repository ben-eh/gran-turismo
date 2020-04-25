<?php

// This guide demonstrates the five fundamental steps
// of database interaction using PHP.

// Credentials
$dbhost = 'localhost';
$dbuser = 'benno';
$dbpass = 'whatever123!';
$dbname = 'gran_turismo';

// 1. Create a database connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// 2. Perform database query
$query = "SELECT * FROM `tracks`";
$result_set = mysqli_query($connection, $query);

// 3. Use returned data (if any)
while($track = mysqli_fetch_assoc($result_set)) {
  echo $track['name'];
}

// 4. Release returned data
mysqli_free_result($result_set);

// 5. Close database connection
mysqli_close($connection);

?>
