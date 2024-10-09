<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap Offline -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Jquery Offline -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/012d22a369.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/general_styles.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css" />
</head>

<body>
    <div class="background"></div>

    <div class="container h-100">
        <div class="row justify-content-sm-center h-100">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="text-center mt-5 mb-4">
                    <a href="../index.php"><img src="../img/logo-small.png" alt="logo" width="350" /></a>
                </div>
                <div class="padding"></div>
                <div class="card  border-0 shadowBox">
                    <div class="card-body p-5 pb-3">
                        <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                        <form id="loginForm" action="" method="post">
                            <div class="mb-3">
                                <label for="username" class="mb-2 text-muted">Username</label>
                                <input type="text" id="username" name="username" class="form-control" autofocus>
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
                            <div id="response" class="my-2 text-center"></div>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-primary btn-size ms-auto py-2 " id="loginBtn">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Don't have an account?
                            <a href="../app/register.php" class="text-dark">Create One</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/login.js"></script>

    </div>

</html>