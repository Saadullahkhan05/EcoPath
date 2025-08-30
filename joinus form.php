<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Join Us</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold text-center text-[#2f855a] mb-6">Join Ecopath</h2>

    <!-- ✅ Success / Error Messages -->
    <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
      <div class="bg-green-100 text-green-700 p-3 mb-4 rounded-lg text-sm">
        ✅ Thank you! Your request has been sent successfully.
      </div>
    <?php elseif (isset($_GET['error']) && $_GET['error'] == 1): ?>
      <div class="bg-red-100 text-red-700 p-3 mb-4 rounded-lg text-sm">
        ❌ Sorry! Something went wrong, please try again.
      </div>
    <?php endif; ?>

    <form action="joinus.php" method="POST" class="space-y-4">
      <div>
        <label class="block text-gray-700">Name</label>
        <input type="text" name="name" required 
               class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
      </div>

      <div>
        <label class="block text-gray-700">Email</label>
        <input type="email" name="email" required 
               class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800">
      </div>

      <div>
        <label class="block text-gray-700">Message</label>
        <textarea name="message" rows="4" required
               class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-800"></textarea>
      </div>

      <button type="submit" 
              class="w-full bg-[#2f855a] text-white py-2 rounded-lg hover:bg-green-700 transition">
        Join Now
      </button>
    </form>
  </div>
</body>
</html>
