<?php

$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);


?>

<div class="container-fluid py-3">

    <h3 class="py-3 bg-warning rounded text-center my-2"> Registered Customers </h3>

    <table class="table table-bordered table-responsive-sm">
        <thead>
            <tr class="bg-primary">
                <th>Name</th>
                <th>Email</th>
                <th>Contact Information</th>
            </tr>
        </thead>
        <tbody>
            <?php

if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_assoc($result)) {
    ?>

            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
            </tr>

            <?php
  }
   
} else {
  // echo "No results found";
}
                   
                    ?>
            <!-- Add more rows for additional customers -->
        </tbody>
    </table>

</div>