<?php
session_start();
require __DIR__ . '/db.php';

// Form se values
$name  = trim($_POST['fullname'] ?? '');          // signup.html ka field
$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';
$conf  = $_POST['confirm_password'] ?? '';

// Basic validation
if ($name === '' || $email === '' || $pass === '' || $conf === '') {
  // Signup ke page pe wapas
  header('Location: signup.html');
  exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header('Location: signup.html');
  exit;
}
if (strlen($pass) < 8) {
  // Password policy
  header('Location: signup.html');
  exit;
}
if ($pass !== $conf) {
  header('Location: signup.html');
  exit;
}

// Email already?
$stmt = $mysqli->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
  $stmt->close();
  // Email exists → signIn par bhej sakte ho ya signup par
header( 'Location: signIn.html?registered=1');
  exit;
}
$stmt->close();

// Insert user
$hash = password_hash($pass, PASSWORD_DEFAULT);
$stmt = $mysqli->prepare('INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)');
$stmt->bind_param('sss', $name, $email, $hash);
if ($stmt->execute()) {
  $stmt->close();
  // Success → requirement ke mutabiq: direct Sign In par le jao
  header('Location: signIn.html'); // optionally ?registered=1
  exit;
} else {
  $stmt->close();
  header('Location: signup.html');
  exit;
}
