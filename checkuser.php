<?php

# This file checks if user is logged in

function checkuser(){
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {

        ?>

<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 w-100 left-0" style="z-index:99999;" role="alert">
<h4 class="alert-heading">Access Denied!</h4>
                <p>Log in to access this page</p>
            </div><div class="alert alert-danger mt-3" role="alert">
<h4 class="alert-heading">Access Denied!</h4>
                Log in to access this page
            </div>

        <?php

        echo "<script>
        setTimeout(()=>{
            location.href = 'login.php';
        },2000)
        </script>";
        
        exit;
    }
}


?>

