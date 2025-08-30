<?php
session_start();
if (empty($_SESSION['user_id'])) {
  header('Location: signIn.html');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>EcoPath – Dashboard</title>
  <link rel="shortcut icon" href="./favicon.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-[#f7fff8] to-[#e8f6ea] min-h-screen">
  <div class="max-w-2xl mx-auto py-16 px-6">
    <div class="bg-white rounded-2xl shadow p-8">
      <h2 class="text-2xl font-bold text-[#2f855a] mb-2">
        Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?>!
      </h2>
      <p class="text-gray-700 mb-6">You are signed in. 🎉</p>
      <a href="logout.php" class="inline-block px-4 py-2 rounded-lg bg-[#2f855a] text-white hover:bg-[#276749]">Log out</a>
      <a href="index.php" class="inline-block ml-2 px-4 py-2 rounded-lg border">Home</a>
    </div>
  </div>
</body>
</html>
