<?php
session_start();
// if there is no session with login id 1280, refer the user to index page
if ($_SESSION['login'] != 2580) {
  header('Location: ./register.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <!-- Bootstrap Offline -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/012d22a369.js" crossorigin="anonymous"></script>
  <!-- Jquery Offline -->
  <script src="../js/jquery-3.7.1.min.js"></script>
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="../css/login.css" />
  <link rel="stylesheet" href="../css/general_styles.css">
  <title>Register Information</title>
</head>

<body>
  <div class="background"></div>
  <div class="container h-100">
    <div class="row justify-content-sm-center h-100">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="text-center mt-5 mb-4">
          <img src="../img/logo-small.png" alt="logo" width="350" />
        </div>
        <div class="padding"></div>
        <div class="card shadowBox mb-2 border-0">
          <div class="card-body p-5">
            <h1 class="fs-4 card-title fw-bold mb-4">Profile Information</h1>
            <form method="POST" autocomplete="off" action="">
              <div class="mb-3">
                <label class="mb-2 text-muted" for="id_num">Student ID or Employee ID</label>
                <input id="id_num" type="text" class="form-control" name="id_num" required autofocus placeholder="AU0000000" />
              </div>
              <div class="mb-3">
                <label class="mb-2 text-muted" for="birthday">Birthday</label>
                <input id="birthday" type="date" class="form-control" name="birthday" />
              </div>
              <div class="mb-3">
                <label class="mb-2 text-muted" for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" placeholder="example@gmail.com" />
              </div>
              <div class="mb-3">
                <label class="mb-2 text-muted" for="ph_num">Phone Number</label>
                <input id="ph_num" type="ph_num" class="form-control" name="ph_num" placeholder="+959 123456789" />
              </div>
              <div class="mb-3">
                <label class="mb-2 text-muted" for="role">Role</label>
                <?php
                include_once '../api/calling_role.php';
                ?>
              </div>
              <div class="mb-3">
                <label class="mb-2 text-muted" for="major">Major</label>
                <?php
                include_once '../api/calling_major.php'
                ?>
              </div>
              <div id="result"></div>
              <div class="text-center my-3 text-muted">
                You can <b>SKIP</b> and <b>EDIT</b> later.
              </div>
              <div class="align-items-center d-flex">
                <button type="button" name="saveBtn" id="saveBtn" class="btn btn-primary ms-auto btn-size">
                  SKIP
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../js/detail_register.js"></script>
</body>

</html>