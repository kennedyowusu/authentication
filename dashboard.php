<?php
 session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <script src="https://cdn.tailwindcss.com"></script>
 <title>Home</title>
</head>
<body>

<h2 class="text-2xl">Welcome Home</h2>
 <!-- Display user name -->
 <p class="text-xl">Hello, <?php echo $_SESSION['email']; ?></p>

 <!-- Logout button  -->

 <button class="text-lg font-medium">
  <a href="logout.php">Logout</a>
 </button>
</body>
</html>
