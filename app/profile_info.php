<?php
session_start();
if ($_SESSION['login'] != 1280) {
  header('Location: ../index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap Offline -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <title>Profile</title>
  <!-- font awesome link -->
  <script src="https://kit.fontawesome.com/012d22a369.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../css/general_styles.css">
  <link rel="stylesheet" href="../css/profile.css">

</head>

<body>
  <div class='topPadding'></div>
  <div class="background"></div>
  <?php
  include_once './newnavbar.php';
  ?>
  <div class="container mt-3">
    <div class="row">
      <div class="col-12 col-md-4 p-4 mt-md-5">
        <img src="<?php echo "../img/" . $_SESSION['profile'] ?>" alt="Profile Image" class="img-thumbnail" />
      </div>
      <div class="col-12 col-md-8 col-lg-8">
        <div class="row p-2">
          <div class="col-12 col-lg-9 mb-1 mb-sm-0">
            <div>
              <h1>Profile Information</h1>
            </div>
          </div>
        </div>
        <div class="row p-2">
          <div class="col-12 col-md-12 col-lg-11 col-xl-10 p-2 shadowBox p-md-5 py-md-4 mb-2">
            <div class="d-flex justify-content-between row profile-info">
              <span class="col-4">
                <h4>Name</h4>
              </span>
              <span class="col">
                <h4><?php echo ': ' . $_SESSION['name'] ?></h4>
              </span>
            </div>

            <div class="d-flex justify-content-between row profile-info">
              <span class="col-4">
                <h4>Student ID</h4>
              </span>
              <span class="col">
                <h4><?php echo ': ' . $_SESSION['id_num'] ?></h4>
              </span>
            </div>

            <div class="d-flex justify-content-between row profile-info">
              <span class="col-4">
                <h4>Email</h4>
              </span>
              <span class="col">
                <h4><?php echo ': ' . $_SESSION['email'] ?></h4>
              </span>
            </div>

            <div class="d-flex justify-content-between row profile-info">
              <span class="col-4">
                <h4>Birthday</h4>
              </span>
              <span class="col">
                <h4><?php echo ': ' . $_SESSION['birthday'] ?></h4>
              </span>
            </div>

            <div class="d-flex justify-content-between row profile-info">
              <span class="col-4">
                <h4>Ph-num</h4>
              </span>
              <span class="col">
                <h4><?php echo ': ' . $_SESSION['ph_num'] ?></h4>
              </span>
            </div>

            <div class="d-flex justify-content-between row profile-info">
              <span class="col-4">
                <h4>Major</h4>
              </span>
              <span class="col">
                <h4><?php echo ': ' . $_SESSION['major_name'] ?></h4>
              </span>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <div class="ms-md-3 col-lg-9 d-flex justify-content-center justify-content-md-end">
            <a class="btn btn-primary mb-2 mb-md-0 me-md-2 btn-size full-width-sm me-1" href="./profile_edit.php" id="editBtn"><u>E</u>dit</a>
            <a class="btn btn-danger mb-2 mb-md-0 me-md-2 btn-size full-width-sm" href="../api/logout.php" id="logoutBtn"><u>L</u>ogout</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once '../app/alert.php';
  ?>
  <script src="../js/average_rating.js"></script>

  <!-- MDB -->
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script> -->
  <script src="../js/sessiontimeout.js"></script>
  <script>
    function loadFile(event) {
      var reader = new FileReader();
      reader.onload = function() {
        var output = document.getElementById("imgPreview");
        output.src = reader.result;
      };
      reader.readAsDataURL(event.target.files[0]);
    }
  </script>
</body>

</html>