

<?php
// Check if form has been submitted
if(isset($_POST['createservice'])) {


    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO services (name, price) VALUES (?, ?)");
    $stmt->bind_param("sd", $name, $price);

    // Set parameters and execute SQL statement
    $name = $_POST['serviceName'];
    $price = $_POST['servicePrice'];
    $stmt->execute();

?>

<div class="alert alert-success alert-dismissible fade show w-100 text-center" role="alert"
    style="position:absolute; top:0%; z-index:99999; left:0;">
    <strong>Service added!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
    setTimeout(() => {

        location.href = "admin.php?page=services"
        
    }, 2000);
</script>

<?php

   
}

// check if the form was submitted
if(isset($_POST['updateservice'])) {

    // get the service ID from the hidden input
    $serviceId = $_POST['serviceId'];
  
    // get the service name and price from the form inputs
    $serviceName = $_POST['serviceName'];
    $servicePrice = $_POST['servicePrice'];

    // prepare and execute the SQL statement to update the service
  $stmt = $conn->prepare("UPDATE services SET name=?, price=? WHERE id=?");
  $stmt->bind_param("sdi", $serviceName, $servicePrice, $serviceId);
  $stmt->execute();

  ?>

<div class="alert alert-success alert-dismissible fade show w-100 text-center" role="alert"
    style="position:absolute; top:0%; z-index:99999; left:0;">
    <strong>Service Updated!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>
    setTimeout(() => {

        location.href = "admin.php?page=services"
        
    }, 2000);
</script>

<?php

}

// Check if a service has been marked for deletion
if (isset($_GET['delete'])) {
    // Retrieve the ID of the service to be deleted
    $serviceId = $_GET['delete'];

    // Construct the SQL query to delete the service
  $sql = "DELETE FROM services WHERE id = '$serviceId'";

  // Execute the query and check if it was successful
  if (mysqli_query($conn, $sql)) {
    // Redirect the user back to the services page
    ?>

    <div class="alert alert-success alert-dismissible fade show w-100 text-center" role="alert"
        style="position:absolute; top:0%; z-index:99999; left:0;">
        <strong>Service Removed!</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
    <script>
        setTimeout(() => {
    
            location.href = "admin.php?page=services"
            
        }, 2000);
    </script>
    
    <?php
  }
}


// Retrieve all services from the database
$sql = "SELECT id, name, price FROM services";
$result = $conn->query($sql);

?>


<div class="container my-4">
  <h1 class="mb-4">Manage Services</h1>

  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addServiceModal"> <i class="fa-solid fa-circle-plus"> </i> Add Service</button>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

        <?php

        // Loop through the services and display them
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        ?>


          <tr>
            <td><?= $row['name']; ?></td>
            <td>GH₵<?= $row['price']; ?></td>
            <td>
              <a href="#" class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editServiceModal<?= $row['id']; ?>">Edit</a>
              <a href="#" onclick="if(confirm('confirm removal of service')){location.href= 'admin.php?page=services&delete=<?= $row['id']; ?>'}" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>

          <div class="modal fade" id="editServiceModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="editServiceLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editServiceLabel">Update Service</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="admin.php?page=services" method="post">
                    <div class="mb-3">
                      <label for="serviceName" class="form-label">Service Name</label>
                      <input type="text" class="form-control" required name="serviceName" value="<?= $row['name']; ?>" id="serviceName">
                    </div>
                    <input type="text" name="serviceId" value="<?= $row['id']; ?>" hidden>
                    <div class="mb-3">
                      <label for="servicePrice" class="form-label">Service Price</label>
                      <input type="number" class="form-control" required name="servicePrice" value="<?= $row['price']; ?>" id="servicePrice">
                    </div>
                    <button type="submit" name="updateservice" class="btn btn-primary">Update Service</button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <?php
    }}
    ?>
         
        </tbody>
      </table>
    </div>

 <!-- Add Service Modal -->
 <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="addServiceModalLabel">Add Service</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="admin.php?page=services" method="post">
                    <div class="mb-3">
                      <label for="serviceName" class="form-label">Service Name</label>
                      <input type="text" class="form-control" required name="serviceName" id="serviceName">
                    </div>
                    <div class="mb-3">
                      <label for="servicePrice" class="form-label">Service Price</label>
                      <input type="number" class="form-control" required name="servicePrice" id="servicePrice">
                    </div>
                    <button type="submit" name="createservice" class="btn btn-primary">Add Service</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- End Add Service Modal -->
