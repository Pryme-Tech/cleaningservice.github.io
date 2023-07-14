<?php
session_start();

include 'db.php';

// check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  if (substr($email, -10) === "@admin.com") {

    $role = "admin";

  } else {

    $role = "user";

  }

  // prepare and execute the SELECT statement to check if user with same email already exists
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 0) {
    // hash the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // prepare and execute the INSERT statement
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password,role,companyhousehold,position,address) VALUES (?, ?, ?, ?,?,NULL,NULL,NUll)");
    $stmt->bind_param("sssss", $name, $email, $phone, $password, $role);

    if ($stmt->execute()) {

      // prepare and execute the SELECT statement Log user in
      $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();

      // check if the user exists in the database
      if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $password = $_POST['password'];
        // verify the password
        if (password_verify($password, $user['password'])) {

          if ($user['role'] == "admin") {

            $message = 'Registration successful. Logging in...';
            $status = 1;
            $_SESSION['admin'] = true;
            echo "<script>
            setTimeout(()=>{
            location.href = 'admin/admin.php'
            },2000);
            </script>";
          } else {

            $message = 'Registration successful. Logging in...';
            $status = 1;
            $_SESSION['logged_in'] = true;

            $user_info = array("id" => $user['id'], "name" => $user['name'], "email" => $user['email'], "phone" => $user['phone'], "company" => $user['companyhousehold'], "position" => $user['position'], "address" => $user['address']);
            $_SESSION['user_info'] = $user_info;

            echo "<script>
            setTimeout(()=>{
            location.href = 'dashboard.php'
            },2000);
            </script>";
          }

        } else {
          $message = 'Invalid email or password';
          $status = 0;
        }
      }


    } else {
      $message = 'Error: ' . $conn->error;
      $status = 0;
    }
  } else {
    $message = 'User with same email already exists';
    $status = 0;
  }
}
?>



<!DOCTYPE html>
<html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <title>Online Cleaning Service - Register</title>
  <script src="https://kit.fontawesome.com/6d6599af14.js" crossorigin="anonymous"></script>
</head>

<body
  style="background-color:#000e39; background-image: url(images/lines.png); background-size: cover; background-blend-mode: exclusion;">

  <?php

  include 'header.html';

  ?>
  <div class="container mt-5 text-light">
    <h2 class="text-center mb-4">Register</h2>

    <?php if (isset($message) && isset($status) && $status == 1): ?>
      <div class="alert alert-success mt-3" role="alert">
        <?php echo $message; ?>
      </div>
    <?php endif; ?>

    <?php if (isset($message) && isset($status) && $status == 0): ?>
      <div class="alert alert-danger mt-3" role="alert">
        <?php echo $message; ?>
      </div>
    <?php endif; ?>

    <form action="register.php" method="post">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" required>
      </div>
      <div class="form-group mt-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group mt-3">
        <label for="phone">Phone:</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
      </div>
      <div class="form-group mt-3">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter a strong password"
          required>
      </div>

      <div class="form-group mt-3 text-end">

        <p class="text-danger">Already have an account, <a href="login.php">Login here.</a></p>

        <button type="submit" style="background-color: #082680;" class="btn text-light btn-block mt-3">Register</button>

      </div>

    </form>
  </div>
</body>

</html>