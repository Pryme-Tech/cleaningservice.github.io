<?php

// session_start();

$user_info = $_SESSION['user_info'];
$name = $user_info['name'];
$email = $user_info['email'];
$phone = $user_info['phone'];
$address = $user_info['address'];
$position = $user_info['position'];
$company = $user_info['company'];
$id = $user_info['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (isset($_POST['name'])) {

    // get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $company = $_POST['company'];
    $position = $_POST['position'];
    $address = $_POST['address'];

    // update the user's information
    $query = "UPDATE users SET name=?, email=?, phone=?, companyhousehold=?, position=?, address=? WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssi", $name, $email, $phone, $company, $position, $address, $id);
    $stmt->execute();

    // check if the update was successful
    if ($stmt->affected_rows > 0) {
      $user_info = array("id" => $id, "name" => $name, "email" => $email, "phone" => $phone, "company" => $company, "position" => $position, "address" => $address);
      $_SESSION['user_info'] = $user_info;

      ?>

      <div class="alert alert-success alert-dismissible fade show w-100 text-center" role="alert"
        style="position:absolute; top:0%; z-index:99999; left:0;">
        <strong>Update Successful!</strong> Your information has been successfully updated our data.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <script>

        setTimeout(() => {

          location.replace("dashboard.php?page=userprofile")

        }, 2000);

      </script>

      <?php
    } else {
      ?>
      <div class="alert alert-danger alert-dismissible fade show w-100 text-center" role="alert"
        style="position:absolute; top:0%; z-index:99999; left:0;">
        <strong>Update Failed!</strong> An error occurred while updating the user's information in the database. Please try
        again later.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
    }

  }

  if (isset($_POST['newpassword'])) {

    $currentpassword = $_POST['currentpassword'];

    $newpassword = $_POST['newpassword'];

    // Get the user's information from the database
    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Compare the current password with the one in the database
    if (password_verify($currentpassword, $user['password'])) {
      // The current password is correct
      // Update the user's password
      $new_password = password_hash($newpassword, PASSWORD_DEFAULT);
      $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
      $stmt->bind_param("si", $new_password, $id);
      if ($stmt->execute()) {
        // Password update successful
        // echo "Password updated successfully.";

        ?>

        <div class="alert alert-success alert-dismissible fade show w-100 text-center" role="alert"
          style="position:absolute; top:0%; z-index:99999; left:0;">
          <strong>Password update successful!</strong> Password updated successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        
        <script>

        setTimeout(() => {

          location.replace("dashboard.php?page=userprofile")

        }, 2000);

      </script>

        <?php
      } else {
        // Password update failed
        // echo "Password update failed. Please try again later.";
        ?>

        <div class="alert alert-danger alert-dismissible fade show w-100 text-center" role="alert"
          style="position:absolute; top:0%; z-index:99999; left:0;">
          <strong>Password update failed!</strong> Password update failed. Please try again later.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <?php
      }
    } else {
      // The current password is incorrect
      ?>

      <div class="alert alert-danger alert-dismissible fade show w-100 text-center" role="alert"
        style="position:absolute; top:0%; z-index:99999; left:0;">
        <strong>The current password is incorrect!</strong> The current password is incorrect.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

      <?php
      // echo "The current password is incorrect.";

    }

  }

}

?>

<div class="container py-3">
  <h3 class="text-warning">User Profile</h3>
  <hr>
  <div class="row m-0">
    <div class="col-md-6">
      <h3>Personal Information</h3>
      <p><strong>Name:</strong>
        <?php echo $name ? $name : 'N/A'; ?>
      </p>
      <p><strong>Email:</strong>
        <?php echo $email ? $email : 'N/A'; ?>
      </p>
      <p><strong>Phone:</strong>
        <?php echo $phone ? $phone : 'N/A'; ?>
      </p>
      <p><strong>Company / Household:</strong>
        <?php echo $company ? $company : 'N/A'; ?>
      </p>
      <p><strong>Position:</strong>
        <?php echo $position ? $position : 'N/A'; ?>
      </p>
    </div>
    <div class="col-md-6">
      <h3>Contact Information</h3>
      <p><strong>Address:</strong>
        <?php echo $address ? $address : 'N/A'; ?>
      </p>
    </div>
  </div>
  <hr>
  <div class="row m-0 ">
    <div class="col-md-12 d-flex justify-content-between">
      <button class="btn btn-primary" data-toggle="modal" data-target="#editModal">Edit Information</button>
      <button class="btn btn-secondary" data-toggle="modal" data-target="#changePasswordModal">Change
        Password</button>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="dashboard.php?page=userprofile" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div class="form-group">
          <label for="company">Company / Household <span
              class="badge rounded-pill bg-warning text-dark">Optional</span></label>
          <input type="text" class="form-control" id="company" name="company" value="<?php echo $company; ?>">
        </div>
        <div class="form-group">
          <label for="position">Position <span class="badge rounded-pill bg-warning text-dark">Optional</span></label>
          <input type="text" class="form-control" id="position" name="position" value="<?php echo $position; ?> ">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea class="form-control" id="address" name="address"><?php echo $address; ?></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"> Save Changes</button>
      </div>
    </form>


  </div>


</div>

<!-- Change Password Modal -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="post" action="dashboard.php?page=userprofile" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group">
          <label for="currentPassword">Current Password</label>
          <input type="password" placeholder="Current Password" name="currentpassword" class="form-control" id="currentPassword">
        </div>
        <div class="form-group">
          <label for="newPassword">New Password</label>
          <input type="password" placeholder="New Password" id="newpassword" name="newpassword" class="form-control" id="newPassword">
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm Password <br> <small class="text-danger fw-bold" id="m"></small> </label>
          <input type="password" placeholder="Confirm New Password" id="confirmnewpassword" class="form-control" id="confirmPassword">
        </div>

        <script>

          document.getElementById("confirmnewpassword").addEventListener("input", () => {
            document.getElementById("m").innerText = document.getElementById("confirmnewpassword").value != document.getElementById("newpassword").value ? "*Passwords do not match!*" : ""
          })

        </script>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </form>
  </div>
</div>