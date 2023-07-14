<?php

// session_start();

// include 'checkuser.php';
// checkuser();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'db.php';

    $user = $_SESSION['user_info']['email'];

    $company = $_POST['company'];
    $address = $_POST['address'];
    $tel = $_POST['tel'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $service = $_POST['service'];
    $requests = $_POST['requests'];
    $size = $_POST['size'];
    $status = "pending";

    $stmt = $conn->prepare("INSERT INTO servicerequest (user,company, address, tel, date, time, service, requests, size,status) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?,?)");
    $stmt->bind_param("ssssssssss", $user,$company, $address, $tel, $date, $time, $service, $requests, $size,$status);

    if ($stmt->execute() === TRUE) {
        // echo "Service request successfully added";
        $message = array(
          "title" => "Service requested",
          "content" => "Our team will respond to you through email and on your user dashboard"
        );
        $status = 1;
    } else {
        echo "Error: " . $stmt->error;
    }

    // $conn->close();
}

 // Retrieve all services from the database
 $sql = "SELECT id, name, price FROM services";
 $result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>

    <div class="d-none alert alert-success alert-dismissible animate__animated animate__backInLeft show" role="alert">
        <i class="fas fa-check-circle fa-2x d-block text-center mb-1"></i> Your request has been successfully submitted.
        Our
        team will get back to you shortly through email and on your user dashboard. Thank you for your request!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="container py-3">
        <h3 class="text-center text-warning">Service Request</h3>
        <form method="post" action="dashboard.php?page=bookappointment">
            <div class="form-group">
                <label for="name">Company / Household</label>
                <input type="text" required class="form-control" id="name" name="company"
                    placeholder="Enter company/household (e.g. ABC Corporation LTD.)">
            </div>
            <div class="form-group">
                <label for="phone">Company / Household Phone Number</label>
                <input type="tel" required class="form-control" id="phone" name="tel"
                    placeholder="Enter phone number (e.g. 555-555-5555)">
            </div>
            <div class="form-group">
                <label for="address">Company / Household Address</label>
                <input type="text" required class="form-control" id="address"
                    placeholder="Enter full address (e.g. 1234 Main St, Anytown USA)" name="address">
            </div>
            <div class="form-group">
                <label for="date">Date of cleaning</label>
                <input type="date" required class="form-control" id="date" name="date"
       placeholder="Select a date (e.g. 01/01/2022)" min="<?php echo date('Y-m-d'); ?>">
            </div>
            <div class="form-group">
                <label for="time">Time of cleaning</label>
                <input type="time" required class="form-control" id="time" name="time"
                    placeholder="Select a time (e.g. 09:00 AM)">
            </div>

            <div class="form-group">
                <label for="service">Type of Service</label>
                <select class="form-control" required id="service" name="service">
                    <option value=""> Choose your cleaning service </option>
                    <?php
                            // Loop through the services and display them
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>
        <option value="<?= $row['name'];?>"> <?= $row['name']." | GH₵".$row['price']; ?> </option>
        <?php

    }
    
    }?>
                </select>
            </div>
            <div class="form-group">
                <label for="requests">Special Requests</label>
                <textarea class="form-control" id="requests" rows="3" name="requests"
                    placeholder="Enter any special requests or instructions (e.g. focus on kitchen and bathrooms)"></textarea>
            </div>
            <div class="form-group">
                <label for="size">Size of the location</label>
                <input type="text" name="size" required class="form-control" id="size"
                    placeholder="Enter size of the location (e.g. 1500 sq ft)">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <!-- Button trigger modal -->
    <!-- <button type="button" id="launchsuccessmodal" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#successModal">
  Launch Success modal
</button> -->

    <!-- Modal -->
    <?php if (isset($message) && isset($status) && $status==1): ?>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="successModalLabel"><?php echo $message["title"]; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo $message["content"]; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    var myModal = new bootstrap.Modal(document.getElementById('successModal'), {
        keyboard: false
    })

    myModal.toggle()

    setTimeout(() => {

        location.replace("dashboard.php?page=servicehistory")

    }, 3000);
    </script>

    <?php endif; ?>

</body>

</html>