<?php
session_start();
require __DIR__ . '/db.php';

$email = trim($_POST['email'] ?? '');
$pass  = $_POST['password'] ?? '';

// Agar empty fields hain to wapas bhejo
if ($email === '' || $pass === '') {
  header('Location: signIn.html?error=empty');
  exit;
}

// User get karo
$stmt = $mysqli->prepare('SELECT id, name, password_hash FROM users WHERE email = ? LIMIT 1');
$stmt->bind_param('s', $email);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Verify password
if (!$user) {
  // email exist hi nahi
  header('Location: signIn.html?error=email');
  exit;
}

if (!password_verify($pass, $user['password_hash'])) {
  // password galat
  header('Location: signIn.html?error=pass');
  exit;
}

// ✅ Login success
$_SESSION['user_id']   = $user['id'];
$_SESSION['user_name'] = $user['name'];

// Dashboard par bhejo
header('Location: dashboard.php');
exit;
