<?php
  include("connect.php");

  // Login user
  if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Encrypt password
    $password = md5($password);

    // Check if email exists
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
      // Email exists
      // Check if password is correct
      $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0){
        // Password is correct
        // Login user
        session_start();
        $_SESSION['email'] = $email;
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.location.href='dashboard.php'</script>";
      }else{
        // Password is incorrect
        echo "<script>alert('Password is incorrect')</script>";
        echo "<script>window.location.href='login.php'</script>";
      }
    }else{
      // Email doesn't exist
      echo "<script>alert('Email doesn't exist')</script>";
      echo "<script>window.location.href='login.php'</script>";
    }
  }
  ?>



<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Authentication</title>
</head>
<body class="bg-[url('https://images.pexels.com/photos/847402/pexels-photo-847402.jpeg?auto=compress&cs=tinysrgb&w=600')] bg-center bg-no-repeat bg-cover h-[100vh] w-screen relative flex items-center">
 <div class="w-screen h-[100vh] bg-black/40 absolute top-0 left-0"></div>

 <form class="relative text-white text-center flex flex-col gap-4 mx-auto border-2 rounded-md px-2 py-6 w-[35%] shadow-xl
 shadow-green-500 " method="post" action=" ">
  <h2 class=" font-bold text-2xl uppercase">Welcome Back !</h2>

  <div class="flex flex-col gap-2 w-[70%] mx-auto mt-8">
   <label for="" class="text-xl font-semibold text-left">Email Address</label>
   <input class="outline-none px-4 py-3 rounded-md bg-transparent border-2 text-white" type="email" placeholder="Enter Email Address"
   name="email" id="email" required="required" autocomplete="email" autofocus
   >
  </div>

  <div class="flex flex-col gap-2 w-[70%] mx-auto">
   <label for="" class="text-xl font-semibold text-left">Password</label>
   <input class="outline-none px-4 py-3 rounded-md bg-transparent border-2 text-white" type="password" placeholder="Enter Password"
   name="password" id="password" required="required" autocomplete="current-password"
   >
  </div>

  <div
   class="flex flex-col gap-2 w-[70%] mx-auto mt-2"
  >
   <button class="bg-green-500 hover:bg-green-700 text-white text-lg font-bold py-2 px-4 rounded-md" name="login">
    Login
   </button>
  </div>

  <div class="mt-2 flex w-[70%] mx-auto justify-center">
   <p class="text-white text-md"
   >Don't have an account?</p>
   <a href="registration.php" class="text-green-500 hover:text-green-800 ml-2">Register</a>
  </div>

 </form>

</body>
</html>
