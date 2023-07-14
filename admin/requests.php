<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  $newStatus = $_POST['newStatus'];
  $statusID = $_POST['statusID'];

  // echo $newStatus.$statusID;

  $stmt = $conn->prepare("UPDATE servicerequest SET status=? WHERE id=?");
  $stmt->bind_param("si", $newStatus, $statusID);
  
  if ($stmt->execute() === TRUE) {
    // status update was successful
    ?>
<div class="alert alert-success alert-dismissible fade show w-100 text-center" role="alert"
    style="position:absolute; top:0%; z-index:99999; left:0;">
    <strong>Update Successful!</strong> status update was successful.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<script>

  setTimeout(() => {

    location.replace("admin.php?page=requests");
    
  }, 2000);

  </script>

<?php

  } else {
    // error in updating the status
    ?>

<div class="alert alert-danger alert-dismissible fade show w-100 text-center" role="alert"
    style="position:absolute; top:0%; z-index:99999; left:0;">
    <strong>Update Error!</strong> An unexpected error happened while updating status.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<?php
  }

}

$query = "SELECT * FROM servicerequest";
$result = mysqli_query($conn, $query);


?>

<div class="container-fluid py-3">
    <h2 class="text-center mb-3">Jobs Overview</h2>

    <div class="row gy-3">

        <?php

if (mysqli_num_rows($result) > 0) {

  while ($row = mysqli_fetch_assoc($result)) {

    $status = $row["status"];
$class = "";

if ($status == "completed") {
  $class = "bg-success";
} else if ($status == "pending") {
  $class = "bg-warning";
} else if ($status == "cancelled") {
  $class = "bg-danger";
} else if ($status == "in-progress") {
  $class = "bg-info";
}


    ?>



        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-warning text-dark"> <strong> Service: </strong> <span
                        class="text-light"><?php echo $row["service"]; ?></span> </div>
                <div class="card-body">
                    <p class="card-text">Date: <span class="text-primary"><?php echo $row["date"]; ?></span></p>
                    <hr>
                    <p class="card-text">Time: <span class="text-primary"><?php echo $row["time"]; ?></span></p>
                    <hr>
                    <p class="card-text">Company/Household: <span
                            class="text-primary"><?php echo $row["company"]; ?></span></p>
                    <hr>
                    <p class="card-text">Phone: <span class="text-primary"><?php echo $row["tel"]; ?></span></p>
                    <hr>
                    <p class="card-text">Size: <span class="text-primary"><?php echo $row["size"]; ?></span></p>
                    <hr>
                    <p class="card-text">Location: <span class="text-primary"><?php echo $row["address"]; ?></span></p>
                    <hr>
                    <p class="card-text">Special requests: <span class="text-primary"><?php echo !empty($row["requests"]) ? $row["requests"] : "N/A"; ?>
</span></p>
                    <hr>
                    <p class="card-text">Status: <span
                            class="p-2 rounded <?php echo $class; ?>"><?php echo $status; ?></span></p>
                    <hr>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#editJobModal"
                        onclick="document.getElementById('statusID').value=<?php echo $row['id']; ?>">Change
                        Status</button>
                </div>
            </div>

        </div>

        <?php
  }
   
} else {

  ?>

        <div>

            <h3 class="text-center text-danger mt-3"> <i class="fa-solid fa-triangle-exclamation fa-2x"></i> <br> No Job
                requests found </h3>

        </div>

        <?php
  
}

?>

    </div>

</div>

<!-- Edit Job Modal -->
<div class="modal fade" id="editJobModal" tabindex="-1" role="dialog" aria-labelledby="editJobModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class="modal-content" method="post" action="admin.php?page=requests">
            <div class="modal-header">
                <h5 class="modal-title" id="editJobModalLabel">Edit Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input name="statusID" hidden id="statusID">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="newStatus">
                        <option value="completed">Completed</option>
                        <option value="in-progress">In Progress</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</div>