<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cleaning Service</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/6d6599af14.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>

  <!-- <img class="" id="b" src="images/A Beginner’s Guide to Web Scraping Using Python - KDnuggets.png" /> -->

  <div id="preloader" class="vh-100 d-flex flex-column justify-content-center align-items-center">
    <span class="spinner-grow my-2" role="status" style="color: #082680;">
    </span>
    <span class="" style="font-weight: bold; color: #082680;">Online Cleaning Service...</span>
  </div>

  <div id="content" class="content d-none" style="position: relative;">

   <?php

   include 'header.html';
   
   ?>

    <div class="banner bg-dark" style="height: 500px;">

      <div id="carousel1" class="carousel slide h-100 bg-primary overflow-hidden carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner h-100">
          <div class="carousel-item active h-100">
            <img src="images/Does It Make Financial Sense to Hire a Cleaning Service.jfif" class="d-block" id="first"
              alt="First Slide">
            <div class="carousel-caption rounded" style="background-color: rgba(0, 0, 0, 0.493);">
              <h4 class="text-warning">Effortless cleaning solutions for your busy life!</h4>
              <p class="text-start px-2">Let us take the burden of cleaning off your shoulders. With just a few clicks,
                you can schedule a professional cleaning at a time that works for you. You'll be amazed at the
                difference our team can make. <br> Contact us today to book your next cleaning!</p>
            </div>
          </div>
          <div class="carousel-item h-100">
            <img src="images/How often should you deep clean an office.jpg" class="d-block" id="second"
              alt="Cleaning Service">
            <div class="carousel-caption rounded" style="background-color: rgba(0, 0, 0, 0.493);">
              <h4 class="text-warning">We bring the sparkle back to your space! </h4>
              <p class="text-start px-2">Our team of trained professionals knows just how to get your home or office
                looking its best. From dusting and vacuuming to scrubbing and sanitizing, we'll take care of all the
                details so you don't have to. <br> Contact us today to schedule your next cleaning!</p>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="bg-secondary p-5 text-center"
      style="background-color: #082680 !important; background-image: url(images/lines.png); background-size: cover; background-blend-mode: color-dodge;">
      <h3 class="text-warning" style="color: #082680;"> GET IN TOUCH! </h3>
      <button class="btn btn-light" style="color: #082680;"> Schedule an appointment with us now! </button>
    </div>

    <div class="container bg-light py-3">

      <h4>Our Services</h4>

      <p>Services we provide includes:</p>

      <div class="row" id="container" style="flex-wrap: nowrap; overflow-x: scroll; position: relative;">

        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="images/gallery2-600x414.jpg" />
            <div class="card-body" style="border-top: 4px solid #082680;">
              <h4 class="card-title"> House Cleaning </h4>
              <p> Professional house cleaning services. Trained team, thorough cleaning. Contact us to schedule and
                simplify your life. </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="images/theme9600x414.jpg" />
            <div class="card-body" style="border-top: 4px solid #082680;">
              <h4 class="card-title"> Indoor Cleaning </h4>
              <p> Enjoy a clean and organized space with minimal effort. Our professional indoor cleaning team takes
                care of all the details. Contact us to schedule now. </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="images/portfolio03600x414.jpg" />
            <div class="card-body" style="border-top: 4px solid #082680;">
              <h4 class="card-title"> Bathroom Cleaning </h4>
              <p> Bathroom cleaning made easy. Professional team, thorough cleaning. Contact us to schedule now. </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="images/theme3-600x414.jpg" />
            <div class="card-body" style="border-top: 4px solid #082680;">
              <h4 class="card-title"> Outdoor Cleaning </h4>
              <p> Keep your outdoor space looking its best with minimal effort. Our professional outdoor cleaning team
                takes care of all the details. </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="images/theme1-600x414.jpg" />
            <div class="card-body" style="border-top: 4px solid #082680;">
              <h4 class="card-title"> House fixing </h4>
              <p> Keep your home in top condition with minimal effort. Our expert house fixing team provides quality
                results. Contact us to schedule now. </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="images/theme4-600x414.jpg" />
            <div class="card-body" style="border-top: 4px solid #082680;">
              <h4 class="card-title"> Plumbing Services </h4>
              <p> Ensure smooth plumbing operation with minimal effort. Our expert team provides quality results.
                Contact us to schedule now. </p>
            </div>
          </div>
        </div>



        <!-- <div class="icons-nav rounded text-center d-flex justify-content-between p-5 align-items-center" style="position: absolute; width: 100%; height: 100%; background-color:rgba(10, 1, 1, 0.10);" >
                <button id="slideLeft" class="btn border border-5 rounded-circle bg-light" style="color: #082680;"><i class="fa-solid fa-chevron-left fa-2x"></i></button>
                <button id="slideRight" class="btn border border-5 rounded-circle bg-light" style="color: #082680;"><i class="fa-solid fa-chevron-right fa-2x"></i></button>
                </div> -->

      </div>

      <div class="icons-nav mt-2 rounded text-center d-flex justify-content-between align-items-center px-5">
        <button id="slideLeft" class="btn border border-5 rounded-circle bg-light" style="color: #082680;"><i
            class="fa-solid fa-chevron-left fa-2x"></i></button>
        <button id="slideRight" class="btn border border-5 rounded-circle bg-light" style="color: #082680;"><i
            class="fa-solid fa-chevron-right fa-2x"></i></button>
      </div>

    </div>


    <div class="records mt-5 rounded container">
      <div class="row align-items-center gy-3">

        <div class="col-md-4">

          <div class="card">

            <div class="card-body d-flex">

              <div style="width: 30%;" class="text-center">
                <i class="fa-solid fa-fire fa-3x text-warning"></i>
              </div>

              <div style="width:70%">
                <h4 class="m-0" id="clients">1000 <small>+</small></h4>
                <p class="m-0 text-warning">Satisfied Clients</p>
              </div>

            </div>

          </div>

        </div>

        <div class="col-md-4">

          <div class="card">

            <div class="card-body d-flex">

              <div style="width: 30%;" class="text-center">
                <i class="fa-solid fa-people-group fa-3x text-warning"></i>
              </div>

              <div style="width:70%">
                <h4 class="m-0" id="team">200 <small>+</small> </h4>
                <p class="m-0 text-warning">Expert Team</p>
              </div>

            </div>
          </div>

        </div>

        <div class="col-md-4">

          <div class="card">

            <div class="card-body d-flex">

              <div style="width: 30%;" class="text-center">
                <i class="fa-solid fa-bars-progress fa-3x text-warning"></i>
              </div>

              <div style="width:70%">
                <h4 class="m-0" id="projects">500 <small>+</small> </h4>
                <p class="m-0 text-warning">Active Projects</p>
              </div>

            </div>

          </div>

        </div>

      </div>
    </div>

    <section class="team-members p-5 mt-5" style="background-color: #e3e8ed;">

      <div class="row align-items-center">
        <div class="col-md-6">
          <h4 style="color: #3a4268;"> <img class="rounded-circle" style="width: 50px;"
              src="images/A Beginner’s Guide to Web Scraping Using Python - KDnuggets.png" /> Team Members</h4>
          <h1 style="color: #082680;">We have an expert team to serve you.</h1>
        </div>
        <div class="col-md-6" style="font-size: 16px; line-height: 28px; color: #3a4268;">
          We love what we do and we do it with passion. we understand the importance of providing excellent service to
          our customers. That's why we have a dedicated team of experts who are ready to assist you with any needs you
          may have.
        </div>
      </div>

      <div class="row team gy-4">

        <div class="col-md-4">
          <div class="card overflow-hidden">
            <img class="card-img-top" src="images/suitor.jpeg" />
            <div class="bg-light text-dark text-center p-2"
              style="height: 100px; width: 104%; position: absolute; bottom: -5%; right: -2%; transform: rotate(-5deg); border-top: 4px solid #082680; color: #082680 !important;">
              <h6 class="m-0">SUITOR EMMANUEL</h6>
              <p class="m-0"> <b class="border-bottom border-dark border-3">Team leader</b> </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card overflow-hidden">
            <img class="card-img-top" src="images/fiona.jpeg" />
            <div class="bg-light text-dark text-center p-2"
              style="height: 100px; width: 104%; position: absolute; bottom: -5%; right: -2%; transform: rotate(5deg); border-top: 4px solid #082680; color: #082680 !important;">
              <h6 class="m-0">SIAW FIONA HERBKE </h6>
              <p class="m-0"> <b class="border-bottom border-dark border-3">Office manager</b> </p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card overflow-hidden">
            <img class="card-img-top" src="images/freeman.jpeg" />
            <div class="bg-light text-dark text-center p-2"
              style="height: 100px; width: 104%; position: absolute; bottom: -5%; right: -2%; transform: rotate(-5deg); border-top: 4px solid #082680; color: #082680 !important;">
              <h6 class="m-0">OPOKU FREEMAN</h6>
              <p class="m-0"> <b class="border-bottom border-dark border-3">Customer service</b> </p>
            </div>
          </div>
        </div>

      </div>



    </section>

    <section style="height: 200px;">

      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.3629891567125!2d-0.16806448523359555!3d5.660528995896841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf9c9435692819%3A0xe90ce65988c21ad6!2sUniversity%20of%20Professional%20Studies%2C%20Accra%20(UPSA)!5e0!3m2!1sen!2sgh!4v1673196518650!5m2!1sen!2sgh"
        style="border:0; width: 100%; height: 100%;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

    </section>

    <footer style="background-color: #000e39;">

      <div class="container">

        <div class="row align-items-center">
          <div class="col-md-6 p-2">
            <div class="text-light rounded px-3">
              <div class="d-flex align-items-center py-2" style="gap: 2%;">
                <img class="bg-light p-2 rounded-circle" src="images/logo.png">
                <h4>Online Cleaning Service</h4>
              </div>
              <p>An online cleaning service is a service that allows individuals or businesses to book professional
                cleaning services online. Customers can choose from a variety of cleaning services such as house
                cleaning, office cleaning, carpet cleaning, and more. These services can be booked on a one-time basis
                or on a recurring schedule. The cleaning service typically provides all necessary cleaning supplies and
                equipment, and the customer can choose the time and date of the service. Payment is usually made online
                through the service's website or app. Online cleaning services often offer convenient features such as
                the ability to track the progress of the cleaning in real-time and leave feedback for the cleaners.</p>
            </div>
          </div>

          <div class="col-md-6 text-light p-5">
            <h3>Official info:</h3>
            <p> <i class="fa-solid fa-location-pin"></i> University of Professional Studies, Accra (UPSA) </p>
            <p> <i class="fa-solid fa-phone"></i> +233 50 200 2358 </p>
            <p> <i class="fa-solid fa-envelopes-bulk"></i> onlinecleaningservice@gmail.com </p>
            <div class="p-3">
              <h3>Open Hours</h3>
              <p>Mon – Sat: 8 am – 5 pm,<br>
                Sunday: CLOSED</p>
            </div>
          </div>
        </div>

        <div class="text-light text-center p-3">

          <h3>Follow US:</h3>

          <div class="py-3">
            <i style="color: #16599B;" class="mx-4 fa-brands fa-facebook fa-3x"></i>
            <i style="color: #03A9F4;" class="mx-4 fa-brands fa-twitter fa-3x"></i>
            <i style="color: #DD4984;" class="mx-4 fa-brands fa-instagram fa-3x"></i>
          </div>

        </div>

      </div>

      <div class="text-light text-center p-3" style="background-color: #082680;">
        <p>2023 &copy; All rights reserved by <br> <span class="text-warning" style="font-weight: bold;"> Emmanuel
            Suitor </span>,<span class="text-warning" style="font-weight: bold;">Siaw Fiona Herbke</span> and <span
            style="font-weight: bold;" class="text-warning">Opoku Freeman</span> </p>
      </div>

    </footer>


  </div>


  <!-- Modals -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="background-color: #0826804b;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
          <button type="button" class="btn-close" id="login-btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <form action="login.php" method="post">
          <div class="modal-body">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Email" name="email" required />
            </div>

            <div class="form-group mt-3">
              <input type="password" class="form-control" placeholder="Password" name="password" required />
            </div>
          </div>
          <div class="modal-footer" style="flex-direction: column;">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-dark">Login</button>
            <p class="">New here? <a href="javascript:void(0)"
                onclick="document.getElementById('login-btn-close').click();document.getElementById('registerButton').click();">Click
                here to register</a> </p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="background-color: #0826804b;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Register</h1>
          <button type="button" class="btn-close" id="login-btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
        </div>
        <form action="register.php" method="post">
          <div class="modal-body">
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
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter a strong password" required>
        </div>
          </div>
          <div class="modal-footer" style="flex-direction: column;">
            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
            <button type="submit" class="btn btn-dark">Register</button>
            <p class="">Already have an account? <a href="javascript:void(0)"
                onclick="document.getElementById('login-btn-close').click();document.getElementById('loginButton').click();">Login</a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="index.js"></script>
  <script src="fontawesome/js/all.min.js"></script>

</body>

</html>