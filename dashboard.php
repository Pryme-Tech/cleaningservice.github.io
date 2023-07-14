<?php

session_start();

include 'db.php';

include 'checkuser.php';

// This function from the checkuser.php file checks if the user is logged in
checkuser();

$servicerequest = 0;
$pending = 0;
$completed = 0;
$feedbacks = 0;

$email = $_SESSION['user_info']['email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['message']) || isset($_POST['rating']) ) {

  $message = $_POST['message'];
  $rating = $_POST['rating'];

  $stmt = $conn->prepare("INSERT INTO feedbacks (user, message, rating) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $email, $message, $rating);

  if ($stmt->execute()) {
    // echo "feedback added";
    $fmessage = 'Your feedback has been received and is greatly appreciated. Your thoughts and opinions help us improve our services.';
    // $status = 1;
    echo "<script>
    setTimeout(()=>{
    location.href = 'dashboard.php'
    },2000);
    </script>";
} else {
    // $message = 'Error: '.$conn->error;
    // $status = 0;
}

}


$query = "SELECT * FROM servicerequest WHERE user = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   $servicerequest = mysqli_num_rows($result);
} else {
  // echo "No results found";
}

$query = "SELECT * FROM servicerequest WHERE user = '$email' AND status = 'pending'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   $pending = mysqli_num_rows($result);
} else {
  // echo "No results found";
}

$query = "SELECT * FROM servicerequest WHERE user = '$email' AND status = 'completed'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   $completed = mysqli_num_rows($result);
} else {
  // echo "No results found";
}

$query = "SELECT * FROM feedbacks WHERE user = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   $feedbacks = mysqli_num_rows($result);
} else {
  // echo "No results found";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Cleaning Service - Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/6d6599af14.js" crossorigin="anonymous"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="dashboard.css">
    <script src="dashboard.js"></script>

</head>

<body class="layout-fixed sidebar-mini hold-transition">


    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="pricing.php" class="nav-link">Pricing</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa-regular fa-bell text-dark"></i>
                        <span class="badge badge-warning navbar-badge"></span>
                    </a>
                    <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div> -->
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="main-sidebar bg-light elevation-4">

            <!-- Brand Logo -->
            <a href="index.php" class="brand-link border-bottom text-decoration-none">
                <img src="images/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Cleaning Service</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar d-flex flex-column py-3">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
                        <i class="fa-solid fa-circle-user fa-2x"></i>
                    </div>
                    <div class="info">
                        <a href="?page=userprofile" class="d-block"><?php $user_info = $_SESSION['user_info'];
$name = $user_info['name']; echo $name; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2 mb-auto">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="dashboard.php" class="nav-link active" id="dashboard">
                                <i class="fa-solid fa-gauge nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="?page=userprofile" class="nav-link" id="userprofile">
                                <i class="fa-solid fa-circle-user nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="?page=bookappointment" class="nav-link" id="bookappointment">
                                <i class="fa-solid fa-check-to-slot nav-icon"></i>
                                <p>Book Appointment</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="?page=paymentrecords" id="paymentrecords" class="nav-link">
                            <i class="fa-solid fa-money-check"></i>
                                <p>Payment Records</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="?page=servicehistory" id="servicehistory" class="nav-link">
                                <i class="fa-solid fa-clock-rotate-left nav-icon"></i>
                                <p>Appointment History</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" data-toggle="modal" data-target="#feedbackModal" id="feedback" class="nav-link">
                                <i class="fa-regular fa-star nav-icon"></i>
                                <p>Provide feedback</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->

                <button class="btn btn-danger"
                    onclick="confirm('Confirm log out') ? location.assign('logout.php') : '' ">Log out</button>

            </div>

        </div>



        <div class="content-wrapper bg-light">


            <?php

   if (isset($_GET['page'])) {
    // code to execute if parameter is present

    $page = $_GET['page'];

    include $page.'.php';

    ?>

            <script>
            toggleActiveNavLink(<?php echo $page; ?>)
            </script>

            <?php
}

else{
  ?>

            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="card mx-auto bg-primary elevation-4" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title text-center lh-1 my-2">Welcome, <span
                                    id="username"><?php echo $name; ?></span>!</h5>
                            <p class="card-text">We offer top-notch cleaning services for your home or office. Our team
                                of experts is trained to deliver the highest quality results.</p>
                            <a href="?page=bookappointment" class="btn btn-warning elevation-4"> Schedule your
                                appointment today! </a>
                        </div>
                    </div>


                    <!-- Small boxes (Stat box) -->
                    <div class="row mt-5">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $servicerequest; ?></h3>

                                    <p>Service Requests</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-check-to-slot"></i>
                                </div>
                                <a href="?page=servicehistory" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning overflow-hidden">
                                <div class="inner">
                                    <h3><?php echo $pending; ?></h3>

                                    <p>Pending requests</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-hourglass-start"></i>
                                </div>
                                <a href="?page=servicehistory" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $completed; ?></h3>

                                    <p>Completed requests</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-flag-checkered"></i>
                                </div>
                                <a href="?page=servicehistory" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><?php echo $feedbacks; ?></h3>

                                    <p>Feedbacks & Ratings</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-regular fa-star"></i>
                                </div>
                                <a href="#" data-toggle="modal" data-target="#feedbackModal"
                                    class="small-box-footer">Provide Feedback <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>

                </div>

            </section>


            <?php
}

    ?>

            <!-- Modal trigger button -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModal">
  Give Feedback
</button> -->

            <?php

if(isset($fmessage)){

  ?>

            <div class="alert alert-success alert-dismissible fade show w-100" role="alert"
                style="position:absolute; top:0%; z-index:99999; left:0;">
                <p><?php echo $fmessage; ?></p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

            <?php
}

?>



            <!-- Feedback Modal -->
            <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form method="post" action="dashboard.php" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="feedbackModalLabel">Leave Feedback</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- User feedback form -->
                            <div class="form-group">
                                <label for="rating">Rating</label>
                                <select class="form-control" id="rating" name="rating">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="feedbackMessage">Message</label>
                                <textarea class="form-control" name="message" id="feedbackMessage" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit Feedback</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>

    </div>

    <!-- <footer class="main-footer"> 

    <div class="text-center">
    <strong>Copyright &copy; 2023 <br>
    by
      <p> Emmanuel Suitor, Fiona,  Opoku Freeman </p>
    </div>

  </footer> -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    //   
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</body>

</html>