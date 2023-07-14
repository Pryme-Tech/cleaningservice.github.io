<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        .card{
          height : 100% !important;
        }
    </style>

<?php

include 'header.html';

?>

<div class="banner fst-italic" style="height: 500px; background-image: url(images/How\ often\ should\ you\ deep\ clean\ an\ office.jpg);background-size: cover; background-position: center; background-attachment: fixed;">
        <h1 style="position: relative; z-index: 1; font-size: 4em; font-weight: bolder;"> Pricing </h1>
        </div>

        <section class="px-3 py-5 text-light fst-italic" style="background-color: #000e39;">

    <div class="container">

    <!-- <h1 class="text-center">Cleaning Service Pricing</h1> -->
    <p class="text-center">Choose the package that fits your needs</p>
    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-header bg-primary text-white">
            Basic Package
          </div>
          <div class="card-body">
            <h5 class="card-title text-primary">$50/cleaning</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Living Room & Kitchen Cleaning</li>
              <li class="list-group-item">Bathroom Cleaning</li>
            </ul>
            <a href="#" class="btn btn-primary btn-block mt-3">Select Package</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-header bg-warning text-white">
            Standard Package
          </div>
          <div class="card-body">
            <h5 class="card-title text-warning">$80/cleaning</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Living Room & Kitchen Cleaning</li>
              <li class="list-group-item">Bathroom Cleaning</li>
              <li class="list-group-item">Bedroom Cleaning</li>
            </ul>
            <a href="#" class="btn btn-warning btn-block mt-3">Select Package</a>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-header bg-danger text-white">
            Premium Package
          </div>
          <div class="card-body">
            <h5 class="card-title text-danger">$120/cleaning</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Full House Cleaning</li>
              <li class="list-group-item">Deep Cleaning</li>
            </ul>
            <a href="#" class="btn btn-danger btn-block mt-3">Select Package</a>
</div>
</div>
</div>
        
      </div>

      <div class="banner rounded-3 bg-dark mt-5 d-flex flex-column justify-content-center align-items-center" style="height:500px; background-image: url(images/pexels-matilda-wormwood-4099467.jpg); background-size : cover;">

      <div class="w-100 text-center" style="position:relative; z-index:1;">
      <h1> 15% OFF FOR OUR CLIENTS </h1>

      <button class="btn btn-warning"> Request a service now!!!</button>
      </div>

      </div>

      </section>
    
</body>
</html>