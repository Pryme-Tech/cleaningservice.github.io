<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

    <style>

        .banner{
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
        }

        .banner::before{
            position: absolute;
            left: 0%;
            top: 0%;
            content: "";
            height: 100%;
            width: 100%;
            background-color: #000e396e;
        }
    </style>
    
    <?php

    include 'header.html';

    ?>

    <div>
        <div class="banner fst-italic" style="height: 500px; background-image: url(images/How\ often\ should\ you\ deep\ clean\ an\ office.jpg);background-size: cover; background-position: center; background-attachment: fixed;">
        <h1 style="position: relative; z-index: 1; font-size: 4em; font-weight: bolder;"> About Us </h1>
        </div>

        <section class="p-3 text-light fst-italic" style="background-color: #000e39;">

            <p>We are a professional online cleaning service dedicated to providing our customers with top-notch cleaning services. Our team is composed of experienced and highly trained cleaners who are committed to delivering high-quality services to meet your needs.</p>

            <p>We offer a wide range of cleaning services including regular cleaning, office cleaning, move-in/move-out cleaning, house cleaning, bathroom cleaning, and outdoor cleaning. Our goal is to make your life easier by taking care of all your cleaning needs.</p>

            <p>We understand that every customer has unique needs, which is why we offer customized cleaning plans to suit your specific requirements. Our team is available to answer any questions you may have and to schedule your cleaning service at a time that is convenient for you.</p>

            <p class="text-warning">Thank you for choosing our online cleaning service. We are committed to providing you with the best cleaning experience possible.</p>

        </section>

        <!-- <div class="row">
          <div class="col-md-6">
            <p class="text-primary">We are a professional online cleaning service dedicated to providing our customers with top-notch cleaning services. Our team is composed of experienced and highly trained cleaners who are committed to delivering high-quality services to meet your needs.</p>
          </div>
          <div class="col-md-6">
            <p class="text-primary">We offer a wide range of cleaning services including regular cleaning, office cleaning, move-in/move-out cleaning, house cleaning, bathroom cleaning, and outdoor cleaning. Our goal is to make your life easier by taking care of all your cleaning needs.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p class="text-primary">We understand that every customer has unique needs, which is why we offer customized cleaning plans to suit your specific requirements. Our team is available to answer any questions you may have and to schedule your cleaning service at a time that is convenient for you.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p class="text-warning">Thank you for choosing our online cleaning service. We are committed to providing you with the best cleaning experience possible.</p>
          </div>
        </div> -->
      </div>
    
</body>
</html>