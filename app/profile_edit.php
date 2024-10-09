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
  <title>Editing Profile</title>
  <!-- font awesome link -->
  <script src="https://kit.fontawesome.com/012d22a369.js" crossorigin="anonymous"></script>


  <link rel="stylesheet" href="../css/general_styles.css">
  <link rel="stylesheet" href="../css/profile.css">

</head>

<body>
  <div class="background"></div>
  <div class='topPadding'></div>
  <?php
  include_once './newnavbar.php';
  ?>
  <div class="container mt-sm-1 mt-3">

    <!-- form here -->
    <form action="../api/editing_profile.php" method="post" enctype="multipart/form-data">
      <!-- form here -->
      <div class="row">
        <div class="col-12 col-md-4 p-4">
          <img id="imgPreview" src="" alt="New Upload Photo" class="img-thumbnail mb-2" />
          <input type="file" class="form-control mb-2" onchange="loadFile(event)" name="profile" />
        </div>
        <div class="col-12 col-md-8 mt-3">
          <div class="row p-2">
            <div class="col-12 col-lg-12 mb-1 mb-sm-0">
              <div>
                <h1>Editing Profile</h1>
              </div>
            </div>
          </div>


          <div class="row p-2">
            <div class="col-12 col-md-12 col-lg-11 col-xl-10 p-md-5 pb-md-4 pt-3 shadowBox mb-2">

              <div class="d-flex-between">
                <h4 class="text-sm">Name</h4>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $_SESSION['name'] ?>" />
              </div>

              <div class="d-flex-between">
                <h4 class="text-sm">Student ID</h4>
                <input type="text" name="id_num" id="id_num" class="form-control" placeholder="AU2200000" value="<?php echo $_SESSION['id_num'] ?>" />
              </div>
              <div class="d-flex-between">
                <h4 class="text-sm">Email</h4>
                <input type="text" name="email" id="email" class="form-control" placeholder="example@gmail.com" value="<?php echo $_SESSION['email'] ?>" />
              </div>
              <div class="d-flex-between">
                <h4 class="text-sm">Birthday</h4>
                <input type="date" name="birthday" id="birthday" class="form-control" value="<?php echo $_SESSION['birthday'] ?>" />
              </div>
              <div class="d-flex-between">
                <h4 class="text-sm">Ph-num</h4>
                <input type="text" name="ph_num" id="ph_num" class="form-control" placeholder="+959 123456789" value="<?php echo $_SESSION['ph_num'] ?>" />
              </div>
              <div class="d-flex-between">
                <h4 class="text-sm">Major</h4>
                <?php
                include_once '../api/calling_major.php';
                ?>
                <!-- <input type="text" name="major" id="major" class="form-control" /> -->
              </div>
            </div>
          </div>
          <div class="row align-items-center">
            <!-- <div class="col-12 col-md-5 bg-dark hide-on-small"></div> -->
            <div class="ms-md-3 col-lg-9 d-flex justify-content-center justify-content-md-end">
              <button class="btn btn-primary mb-2 mb-md-0 me-md-2 btn-size full-width-sm me-1" id="saveBtn"><u>S</u>ave</button>
    </form>
    <a href="../app/profile_info.php" type="button" class="btn btn-danger mb-2 mb-md-0 me-md-2 btn-size full-width-sm me-1" id="cancelBtn">
      <u>C</u>ancel
    </a>
  </div>

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