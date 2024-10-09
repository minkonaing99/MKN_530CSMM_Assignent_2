<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  <!-- Bootstrap Offline -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Jquery Offline -->
  <script src="../js/jquery-3.7.1.min.js"></script>
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/012d22a369.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="../css/login.css" />
  <link rel="stylesheet" href="../css/general_styles.css">
  <style>

  </style>
</head>

<body>
  <div class="background"></div>
  <div class="container h-100">
    <div class="row justify-content-sm-center h-100">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="text-center mt-5 mb-0">
          <a href="../index.php"><img src="../img/logo-small.png" alt="logo" width="350" /></a>
        </div>
        <div class="padding"></div>

        <div class="card shadowBox border-0">
          <div class="card-body p-5 pb-3">
            <h1 class="fs-4 card-title fw-bold mb-4">Register</h1>
            <form method="POST" autocomplete="off" action="" id="registerForm">
              <!-- form start ........ -->
              <div class="mb-3">
                <label class="mb-2 text-muted" for="name">Name</label>
                <div class="input-group">
                  <input id="name" type="text" class="form-control" name="name" required autofocus />
                </div>
              </div>
              <div class="mb-3">
                <label class="mb-2 text-muted" for="username">Username</label>
                <div class="input-group">
                  <input id="username" type="text" class="form-control" name="username" required />
                  <button type="button" name="checkBtn" class="btn btn-secondary" id="checkBtn" disabled>Check</button>
                </div>
              </div>
              <div class="mb-3 position-relative">
                <label for="password" class="mb-2 text-muted">Password</label>
                <div class="input-group">
                  <input type="password" id="password" name="password" class="form-control">
                  <span class="input-group-text" id="togglePassword">
                    <i id="eyeIcon" class="fa-regular fa-eye"></i>
                  </span>
                </div>
              </div>
              <div class="mb-3">
                <label class="mb-2 text-muted" for="confirm_password">Confirm Password</label>
                <input id="confirm_password" type="password" class="form-control" name="confirm_password" required />
              </div>
              <div id="invalid" class="text-danger mb-2 text-center"></div>
              <div class="d-flex justify-content-between">
                <button type="button" name="registerBtn" class="btn btn-primary btn-size ms-auto py-2" id="registerBtn">Register</button>
              </div>
            </form>
          </div>
          <div class="card-footer py-3 border-0">
            <div class="text-center">
              Already have an account? <a href="../app/login.php" class="text-dark">Login</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../js/register.js"></script>
</body>

</html>