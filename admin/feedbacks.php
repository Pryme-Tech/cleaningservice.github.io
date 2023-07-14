<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.15/jspdf.plugin.autotable.min.js"></script>

<?php

$query = "SELECT * FROM feedbacks";
$result = mysqli_query($conn, $query);


?>

<div class="p-hide container mt-3">
<div class="btn-group" role="group">
        <button type="button" class="btn btn-primary" onclick="window.print()"> <i class="fa-solid fa-print me-1"></i>
            Print</button>
        <button onClick="generatePdf()" class="btn btn-secondary" download> <i class="fa-solid fa-download me-1"></i>
            Download</button>
    </div>
</div>

<style>
  @media print{
    .p-hide{
      display : none;
    }
    .p-show{
      display:flex !important;
    }
  }
</style>


<div class="container mt-3 d-none p-show justify-content-center align-items-center">
  <img class="me-1" src="../images/logo.png" alt="">
  Online Cleaning Service
</div>

<script>

    function generatePdf() {
        // Create a new jsPDF instance
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.setFont("Roboto");

        // Add the logo image to the document
        doc.addImage('../images/logo.png', 'PNG', 10, 10, 10, 10);

        // Add the text to the document
        doc.text('Online Cleaning Service', 23, 17);

        // Add the table to the PDF
        doc.autoTable({ html: '#p-table', startY: 25 });

        // Save the PDF
        doc.save(`cleaning service feedbacks and ratings.pdf`);
    }



</script>

<div class="container py-2">
      <h1 class="text-center py-2">Feedbacks and Ratings</h1>
      <table id="p-table" class="table table-striped table-responsive-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Feedback</th>
            <th scope="col">Rating</th>
          </tr>
        </thead>
        <tbody>

        <?php

if (mysqli_num_rows($result) > 0) {

            $i = 1;

  while ($row = mysqli_fetch_assoc($result)) {
    ?>

<tr>
                      <th scope="row"><?php echo $i; ?></th>
                      <td><?php echo $row['user']; ?></td>
                      <td><?php echo $row['message']; ?></td>
                      <td><?php echo $row['rating']; ?></td>
                    </tr>

    <?php
            $i++;
  }
   
} else {
  // echo "No results found";
  ?>

  <h3 class="p-2 text-center elevation-3 rounded"> No results found </h3>

  <?php
}
?>
        </tbody>
      </table>
    </div>