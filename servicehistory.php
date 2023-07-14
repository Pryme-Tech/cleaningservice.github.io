

<?php

include 'db.php';

// session_start();

$email = $_SESSION['user_info']['email'];

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
    }  elseif ($date == "More than 1 month") {
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
    }  elseif ($date == "More than 1 month") {
      $query = "SELECT * FROM servicerequest WHERE user = '$email' AND status = '$status' AND date <= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
  }

  }
  $result = mysqli_query($conn, $query);

} else {

  $query = "SELECT * FROM servicerequest WHERE user = '$email'";
  $result = mysqli_query($conn, $query);

}

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Service Request History</title>
  <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
</head>

<body>
  <div class="container py-3">
    <h3 class="text-center text-warning mb-3">Service Request History</h3>

    <div class="text-end">

      <button onclick="printTable()" class="btn btn-primary">
        <i class="fa-solid fa-print"></i> Print
      </button>

      <button onclick="generatePdf()" class="btn btn-primary">
        <i class="fa-solid fa-download"></i> Download
      </button>

    </div>

    <h3> Sort By: </h3>
    <form action="dashboard.php?page=servicehistory" method="post" class="row justify-content-center mb-3">

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
            echo "selected"; ?>>More than 1 month</option>
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
      <button type="submit" class="btn btn-primary">Sort</button>
    </form>


    <table id="myTable" class="table table-responsive-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Service Type</th>
          <th scope="col">Address</th>
          <th scope="col">Date</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php

        if (mysqli_num_rows($result) > 0) {
          $i = 1;
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
              <th scope="row">
                <?php echo $i; ?>
              </th>
              <td>
                <?php echo $row['service']; ?>
              </td>
              <td>
                <?php echo $row['address']; ?>
              </td>
              <td>
                <?php echo $row['date']; ?>
              </td>
              <td class=<?php echo $class; ?>><?php echo $row['status']; ?></td>
            </tr>
            <?php
            $i++;
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.15/jspdf.plugin.autotable.min.js"></script>

  <script>

    function printTable() {
      // Create a new window
      var printWindow = window.open('', '', 'height=500,width=800');

      // Write the HTML code for the table to the new window
      printWindow.document.write('<html><head><title>Print Service History</title>');
      printWindow.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">'); // add link to bootstrap CSS
      printWindow.document.write('</head><body>');
      printWindow.document.write(document.getElementById('myTable').outerHTML); // replace 'myTable' with the ID of your table
      printWindow.document.write('</body></html>');

      // Print the new window
      printWindow.print();
    }

    function generatePdf() {

      // Create a new jsPDF instance
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();

      // doc.setFont("Roboto");

      // Add the logo image to the document
      doc.addImage('images/logo.png', 'PNG', 10, 10, 10, 10);

      // Add the text to the document
      doc.text('Online Cleaning Service', 23, 17);

      // Add the table to the PDF
      doc.autoTable({ html: '#myTable', startY: 25 });

      // Save the PDF
      doc.save(`cleaning service service history.pdf`);

    }




  </script>

</body>

</html>