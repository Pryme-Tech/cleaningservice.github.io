<?php

session_start();

include '../db.php';

function checkuser(){
 if(!isset($_SESSION['admin'])){
    echo "Please log in";
    ?>

    <script>

      setTimeout(() => {

        location.replace('../login.php');
        
      }, 2000);

      </script>

    <?php
    exit;
 }
}

// This function from the checkuser.php file checks if the user is logged in
checkuser();

$jobrequests = 0;
$completed = 0;
$customers = 0;
$revenue = 0;

// $email = $_SESSION['user_info']['email'];

$query = "SELECT * FROM servicerequest";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   $jobrequests = mysqli_num_rows($result);
} else {
  // echo "No results found";
}

$query = "SELECT * FROM servicerequest WHERE status = 'completed'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   $completed = mysqli_num_rows($result);
} else {
  // echo "No results found";
}

$query = "SELECT * FROM users WHERE role='user'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   $customers = mysqli_num_rows($result);
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
  <title>Online Cleaning Service - Admin Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <script src="https://kit.fontawesome.com/6d6599af14.js" crossorigin="anonymous"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="dashboard.css">
  <script src="../dashboard.js"></script>

</head>

<body class="layout-fixed sidebar-mini hold-transition text-light">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    * {
      margin: 0%;
      padding: 0%;
      font-family: 'Poppins', sans-serif;
    }
  </style>


  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../pricing.php" class="nav-link">Pricing</a>
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
      <a href="../index.php" class="brand-link border-bottom text-decoration-none">
        <img src="../images/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
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
            <a href="" class="d-block">Administrator</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 mb-auto">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="admin.php" class="nav-link active" id="dashboard">
                <i class="fa-solid fa-gauge nav-icon"></i>
                <p>Dashboard</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="?page=customers" class="nav-link" id="customers">
                <i class="fa-solid fa-users nav-icon"></i>
                <p>Customers</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="?page=requests" class="nav-link" id="requests">
                <i class="fa-solid fa-calendar-check nav-icon"></i>
                <p>Manage Bookings</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="?page=services" class="nav-link" id="services">
              <i class="fa-solid fa-bars-progress nav-icon"></i>
                <p>Manage Services</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="?page=feedbacks" class="nav-link" id="feedbacks">
                <i class="fa-solid fa fa-thumbs-up nav-icon"></i>
                <p>Feedbacks & Ratings</p>
              </a>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->

        <button class="btn btn-danger" onclick="confirm('Confirm log out') ? location.assign('logout.php') : '' ">Log
          out</button>

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
              <h1 class="m-0">Admin Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                <li class="breadcrumb-item active">Admin</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <div class="card bg-primary">
            <div class="card-header">
              <h3 class="card-title">
                <span id="greeting"></span>, Admin
              </h3>
            </div>
            <div class="card-body">
              <p>
                Get a quick snapshot of all the action happening on the site right now:
              </p>

              <p>
                Stay on top of everything and keep your site running smoothly.
              </p>

              <div class="bg-warning elevation-3 p-2 pt-4 rounded" style="box-sizing: border-box;">
                <p> Current Time: <span class="bg-dark p-2 rounded" style="box-sizing: border-box;"
                    id="currentTime"></span></p>
                <hr>
                <p class="mt-4">
                  Current Date: <span class="bg-dark p-2 rounded" style="box-sizing: border-box;"
                    id="currentDate"></span></p>
              </div>
            </div>
          </div>

          <script>
            // Get the current time and date
            const now = new Date();
            const hours = now.getHours();
            const minutes = now.getMinutes();
            const seconds = now.getSeconds();
            const currentTime = `${hours > 9 ? hours : '0' + hours}:${minutes > 9 ? minutes : '0' + minutes}:${seconds > 9 ? seconds : '0' + seconds}`;
            const currentDate = now.toDateString();

            // Set the greeting based on the current time
            let greeting = "Good morning";
            if (hours >= 12 && hours < 17) {
              greeting = "Good afternoon";
            } else if (hours >= 17 && hours < 21) {
              greeting = "Good evening";
            } else if (hours >= 21 || hours < 6) {
              greeting = "Good night";
            }

            // Update the HTML elements with the current time and date
            document.getElementById("greeting").innerText = greeting;

            document.getElementById("currentTime").innerText = currentTime;

            setInterval(() => {
              const now = new Date();
              document.getElementById("currentTime").innerText = `${now.getHours() > 9 ? now.getHours() : '0' + now.getHours()}:${now.getMinutes() > 9 ? now.getMinutes() : '0' + now.getMinutes()}:${now.getSeconds() > 9 ? now.getSeconds() : '0' + now.getSeconds()}`;
            }, 1000);

            document.getElementById("currentDate").innerText = currentDate;
          </script>



          <!-- Small boxes (Stat box) -->
          <div class="row mt-4">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                    <?php echo $customers; ?>
                  </h3>

                  <p>Active Customers</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-users"></i>
                </div>
                <a href="?page=customers" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning overflow-hidden">
                <div class="inner">
                  <h3>
                    <?php echo $jobrequests; ?>
                  </h3>

                  <p>Job requests</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-wrench"></i>
                </div>
                <a href="?page=requests" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                    <?php echo $completed; ?>
                  </h3>

                  <p>Completed jobs</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-flag-checkered"></i>
                </div>
                <a href="?page=requests" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>
                  ₵<?php echo 559*$completed; ?>
                  </h3>

                  <p>Revenue</p>
                </div>
                <div class="icon">
                  <i class="fa-solid fa-dollar-sign"></i>
                </div>
                <a href="#" class="small-box-footer">More Info
                  <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>

        </div>

      </section>

      <?php

          }
          ?>


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
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
//   </script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

</body>

</html>