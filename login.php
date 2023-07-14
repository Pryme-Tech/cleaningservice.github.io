<?php
session_start();

include 'db.php';


// check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // prepare and execute the SELECT statement
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // check if the user exists in the database
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // verify the password
        if (password_verify($password, $user['password'])) {

            if ($user['role'] == "admin") {
                $message = 'Login Succcessful. Redirecting...';
                $status = 1;
                $_SESSION['admin'] = true;
                echo "<script>
            setTimeout(()=>{
            location.href = 'admin/admin.php'
            },2000);
            </script>";
            } else {

                $message = 'Login Succcessful. Redirecting...';
                $status = 1;
                $_SESSION['logged_in'] = true;

                $user_info = array("id"=>$user['id'],"name" => $user['name'], "email" => $user['email'], "phone" => $user['phone'], "company" => $user['companyhousehold'], "position" => $user['position'], "address" => $user['address']);
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
    } else {
        $message = 'Invalid email or password';
        $status = 0;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>Login Page</title>
</head>

<body
    style="background-color:#000e39; background-image: url(images/lines.png); background-size: cover; background-blend-mode: exclusion;">

    <?php

    include 'header.html';

    ?>

    <div class="container my-5 text-light">
        <h2 class="text-center">Login</h2>

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

        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" placeholder="Enter your email address" id="email" name="email"
                    required>
            </div>
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" id="password"
                    name="password" required>
            </div>

            <div class="form-group mt-3 text-end">

                <p class="text-danger">New here, <a href="register.php">Register here.</a></p>

                <button type="submit" style="background-color: #082680;" class="btn text-light btn-block mt-3">Log
                    In</button>

            </div>

        </form>

    </div>
</body>

</html>