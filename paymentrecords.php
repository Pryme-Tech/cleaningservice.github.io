<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.15/jspdf.plugin.autotable.min.js"></script>

<style>
    @import url('https://fonts.googleapis.com/css?family=Roboto');

    @media print {
        body * {
            visibility: hidden;
        }

        .brand-image,
        .brand-text {
            display: inline !important;
            margin-left: 1%;
            font-size: 1em;
        }

        #payment-table,
        #payment-table * {
            visibility: visible;
        }

        #payment-table {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
    }
</style>

<?php

include 'db.php';

$email = $_SESSION['user_info']['email'];

$query = "SELECT * FROM servicerequest WHERE user = '$email'";

$result = mysqli_query($conn, $query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $date = $_POST['date'];

    $status = $_POST['status'];

    if ($status == "All" && $date == "All") {
        $query = "SELECT * FROM servicerequest WHERE user = '$email'";
    }

    if ($status != "All" && $date == "All") {
        $query = "SELECT * FROM servicerequest WHERE user = '$email' AND status = '$status'";
    }

    if ($status == "All" && $date != "All") {
        // echo $date;
        // >= DATE_SUB(NOW(), INTERVAL 1 WEEK) AND date <= NOW()
        // >= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND date <= NOW()
        if ($date == "Today") {
            $query = "SELECT * FROM servicerequest WHERE user = '$email' AND date = CURDATE()";
        } elseif ($date == "This Week") {
            $query = "SELECT * FROM servicerequest WHERE user = '$email' AND date >= DATE_SUB(NOW(), INTERVAL 1 WEEK) AND date <= NOW()";
        } elseif ($date == "This Month") {
            $query = "SELECT * FROM servicerequest WHERE user = '$email' AND date >= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND date <= NOW()";
        } elseif ($date == "More than 1 month") {
            $query = "SELECT * FROM servicerequest WHERE user = '$email' AND date <= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
        }

    }

    if ($status != "All" && $date != "All") {
        // $query = "SELECT * FROM servicerequest WHERE user = '$email' AND status = '$status' AND date = CURDATE()";

        if ($date == "Today") {
            $query = "SELECT * FROM servicerequest WHERE user = '$email' AND status = '$status' AND date = CURDATE()";
        } elseif ($date == "This Week") {
            $query = "SELECT * FROM servicerequest WHERE user = '$email' AND status = '$status' AND date >= DATE_SUB(NOW(), INTERVAL 1 WEEK) AND date <= NOW()";
        } elseif ($date == "This Month") {
            $query = "SELECT * FROM servicerequest WHERE user = '$email' AND status = '$status' AND date >= DATE_SUB(NOW(), INTERVAL 1 MONTH) AND date <= NOW()";
        } elseif ($date == "More than 1 month") {
            $query = "SELECT * FROM servicerequest WHERE user = '$email' AND status = '$status' AND date <= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
        }

    }
    $result = mysqli_query($conn, $query);

} else {

    $query = "SELECT * FROM servicerequest WHERE user = '$email'";
    $result = mysqli_query($conn, $query);

}

?>

<div class="container pt-3">

    <h3> Payment Records </h3>

    <div class="btn-group" role="group">
        <button type="button" class="btn btn-primary" onclick="window.print()"> <i class="fa-solid fa-print me-1"></i>
            Print</button>
        <button onClick="generatePdf()" class="btn btn-secondary" download> <i class="fa-solid fa-download me-1"></i>
            Download</button>
    </div>


    <form action="dashboard.php?page=paymentrecords" method="post" class="row justify-content-center my-3">

        <h3> Sort By: </h3>

        <div class="form-group col-6">
            <label for="sort-date">Date:</label>
            <select class="form-control" value="This Week" name="date" id="sort-date">
                <option>All</option>
                <option <?php if (isset($date) && $date == "Today")
                    echo "selected"; ?>>Today</option>
                <option <?php if (isset($date) && $date == "This Week")
                    echo "selected"; ?>>This Week</option>
                <option <?php if (isset($date) && $date == "This Month")
                    echo "selected"; ?>>This Month</option>
                <option <?php if (isset($date) && $date == "More than 1 month")
                    echo "selected"; ?>>More than 1 month
                </option>

            </select>
        </div>
        <!-- <div class="form-group col-4">
    <label for="sort-service">Service Type:</label>
    <select class="form-control" id="sort-service">
      <option>All</option>
      <option>Regular Cleaning</option>
      <option>Office Cleaning</option>
      <option>Move-in/Move-out Cleaning</option>
      <option>House Cleaning</option>
      <option>Bathroom Cleaning</option>
      <option>Outdoor Cleaning</option>
    </select>
  </div> -->
        <div class="form-group col-6">
            <label for="sort-status">Status:</label>
            <select class="form-control" name="status" id="sort-status">
                <option>All</option>
                <option <?php if (isset($status) && $status == "Pending")
                    echo "selected"; ?>>Pending</option>
                <option <?php if (isset($status) && $status == "In-progress")
                    echo "selected"; ?>>In-progress</option>
                <option <?php if (isset($status) && $status == "Completed")
                    echo "selected"; ?>>Completed</option>
                <option <?php if (isset($status) && $status == "Cancelled")
                    echo "selected"; ?>>Cancelled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary w-50">Sort</button>
    </form>

    <div id="payment-table">

        <img src="images/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8; display:none;">
        <span class="brand-text font-weight-light d-none">Cleaning Service</span>

        <table id="p-table" class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Service</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

                <?php

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {

                        $status = $row["status"];
                        $class = "";

                        if ($status == "completed") {
                            $class = "text-success";
                        } else if ($status == "pending") {
                            $class = "text-warning";
                        } else if ($status == "cancelled") {
                            $class = "text-danger";
                        } else if ($status == "in-progress") {
                            $class = "text-info";
                        }

                        ?>

                        <tr>
                            <td>
                                <?php echo $row['date']; ?>
                            </td>
                            <td>
                                <?php
                                $service = $row['service'];

                                $query = "SELECT price FROM services WHERE name = ?";
                                $stmt = $conn->prepare($query);
                                $stmt->bind_param("s", $service);
                                $stmt->execute();
                                $result1 = $stmt->get_result();
                                if ($result1->num_rows > 0) {
                                    $row1 = $result1->fetch_assoc();
                                    $price = $row1['price'];
                                } else {
                                    $price = 0;
                                }

                                echo 'GHS ' . $price;
                                ?>

                            </td>
                            <td>
                                <?php echo $row['service']; ?>
                            </td>
                            <td class=<?php echo $class; ?>><?php echo $row['status']; ?></td>
                        </tr>

                        <?php

                    }

                } else {
                    ?>

                    <h3 class="text-center bg-danger elevation-3 rounded p-2"> No results found </h3>

                    <?php

                }

                ?>



            </tbody>
        </table>

    </div>


</div>

<script>

    function generatePdf() {
        // Create a new jsPDF instance
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.setFont("Roboto");

        // Add the logo image to the document
        doc.addImage('images/logo.png', 'PNG', 10, 10, 10, 10);

        // Add the text to the document
        doc.text('Online Cleaning Service', 23, 17);

        // Add the table to the PDF
        doc.autoTable({ html: '#p-table', startY: 25 });

        // Save the PDF
        doc.save(`cleaning service payment records.pdf`);
    }



</script>