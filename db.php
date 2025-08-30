<?php
// db.php
$host = 'localhost';
$db   = 'user_info';
$user = 'root';
$pass = ''; // XAMPP default blank

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
  die('DB connection failed: ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8mb4');
