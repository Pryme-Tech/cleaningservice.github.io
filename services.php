<!DOCTYPE html>
<html>

<head>
    <title>Our Services</title>
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
        /* .col-md-4{
            margin-top: 2%;
        } */
    </style>

    <?php

    include 'header.html';

    ?>

    <div class="banner mb-0 jumbotron jumbotron-fluid text-center d-flex align-items-center justify-content-center"
        style="background-image: url('images/Does\ It\ Make\ Financial\ Sense\ to\ Hire\ a\ Cleaning\ Service.jfif'); background-size: cover; height: 500px; background-attachment: fixed; ">
        <h1 class="text-warning display-4" style="position: relative; z-index: 1; font-size: 4em; font-weight: bolder;">Our Services</h1>
    </div>
    <div class="p-3" style="background-color: #082680 ;">
        <div class="row gy-2">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Regular Cleaning</h5>
                        <p class="card-text">Our regular cleaning service includes dusting, vacuuming, mopping, and cleaning of bathrooms and kitchens.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Office Cleaning</h5>
                        <p class="card-text">Our office cleaning service includes dusting, vacuuming, mopping, and cleaning of bathrooms and kitchens. Additionally, we also take care of common areas and conference rooms.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Move-in/Move-out Cleaning</h5>
                        <p class="card-text">Our move-in/move-out cleaning service includes deep cleaning of the entire property, including bathrooms, kitchens, and all living areas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">House Cleaning</h5>
                        <p class="card-text">Our house cleaning service includes dusting, vacuuming, mopping, and cleaning of bathrooms and kitchens. Additionally, we also take care of all living areas, bedrooms and common areas.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Bathroom Cleaning</h5>
                        <p class="card-text">Our bathroom cleaning service includes deep cleaning of toilets, sinks, showers and bathtubs. We also take care of disinfecting and deodorizing the area.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Outdoor Cleaning</h5>
                        <p class="card-text">Our outdoor cleaning service includes cleaning of patios, decks, driveways, sidewalks, and exterior windows.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-12 text-center">
                <img src="banner-image.jpg" alt="About Us" class="img-fluid">
                <h1 class="text-warning mt-3">About Us</h1>
            </div>
        </div> -->
    </div>
</body>

</html>