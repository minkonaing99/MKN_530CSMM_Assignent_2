<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Home</title>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/012d22a369.js" crossorigin="anonymous"></script>
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./css/general_styles.css">
  <link rel="stylesheet" href="./css/about.css">

  <!-- Bootstrap Offline -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <style>
    #fixed {
      background-image: url('./img/landingpage_background.jpg');
    }
  </style>
</head>

<body>
  <!-- <div class="topPadding"></div> -->

  <?php
  include_once './app/homenav.php';
  ?>

  <div class="">
    <div class="carousel-container">
      <div id="home">
        <div class="landing-text">
          <h1>Where Ambition Meets Opportunity</h1>
          <div class="row justify-content-center">
            <h2 class="text-center align-content-center d-none d-sm-block">Cultivating Potential for a Brighter Tomorrow</h2>
            <?php
            if (!isset($_SESSION['login'])) {
              echo "<button type='button' class='btn btn-outline-light mt-2 fs-5' data-bs-toggle='modal' data-bs-target='#exampleModal' id='signInModal'><u>L</u>ogin</button>";
            } else {
              echo "<a href='./api/logout.php' type='button' class='btn btn-outline-danger mt-2' id='signInModal'>Logout</a>";
            }
            ?>
          </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="./img/carousel1.jpg" class="d-block w-100" alt="School Building" />
            </div>
            <div class="carousel-item">
              <img src="./img/carousel2.jpg" class="d-block w-100" alt="Studying Students" />
            </div>
            <div class="carousel-item">
              <img src="./img/carousel3.jpg" class="d-block w-100" alt="Outdoor Teaching" />
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-4 fw-bold" id="exampleModalLabel">Login</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-md-5">
              <form>
                <div class="mb-3">
                  <label for="username" class="mb-2 ms-1 text-muted">Username</label>
                  <div class="input-group">
                    <input type="text" id="username" name="username" class="form-control w-75" style="color: black; font-weight: normal;" autofocus>
                  </div>
                </div>
                <div class="mb-4">
                  <label for="password" class="mb-2 ms-1 text-muted">Password</label>
                  <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control">
                    <span class="input-group-text" id="togglePassword">
                      <i id="eyeIcon" class="fa fa-eye" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
                <div id="response" class="mb-4 text-center"></div>

                <div class="modal-footer row justify-content-end">
                  <button type="button" class="btn btn-primary btn-size" id="loginBtn">Login</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="paddingTop d-none d-sm-block"></div>

    <div class="achi_bar d-none d-md-block" style="width: 100%;">
      <div class="row text-center justify-content-evenly align-content-center text bg-light">
        <div class="col-md-4 col-xl-3 p-3">
          <img src="./img/graduated.png" alt="Graduate Icon" width="60px" class="m-2">
          <h5>More than <span>+1000</span> Graduated Students</h5>
        </div>
        <div class="col-md-4 col-xl-3 p-3">
          <img src="./img/medal.png" alt="Price Icon" width="60px" class="m-2">
          <h5 class="mb-0 ms-3 small-text">Top <span>15</span> World Ranking Universiy awards</h5>
        </div>
        <div class="col-md-4 col-xl-3 p-3">
          <img src="./img/summit.png" alt="Achievement" width="60px" class="m-2">
          <h5>More than <span>100+</span> Achievements</h5>
        </div>
      </div>
    </div>

    <div class="achi_bar d-block d-md-none" style="width: 100%;">
      <div class="row text-left align-content-center bg-light">
        <div class="">
          <div class="d-flex align-items-center py-3 px-0 border-bottom">
            <img src="./img/graduated.png" alt="Graduate Icon" width="50px" height="50px" class="">
            <h5 class="mb-0 ms-3 small-text">More than <span>+1000</span> Graduated Students</h5>
          </div>
        </div>
        <div class="">
          <div class="d-flex align-items-center py-3 px-0 border-bottom">
            <img src="./img/medal.png" alt="Price Icon" width="50px" height="50px" class="">
            <h5 class="mb-0 ms-3 small-text">Top <span>15</span> World Ranking Universiy awards</h5>
          </div>
        </div>
        <div class="">
          <div class="d-flex align-items-center py-3 px-0">
            <img src="./img/summit.png" alt="Achievement" width="50px" height="50px" class="">
            <h5 class="mb-0 ms-3 small-text">More than <span>100+</span> Achievements</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="paddingBot d-none d-sm-block"></div>

    <div id="fixed" class="justify-content-center justify-content-sm-end" style="display:flex; align-items: center;">
      <div class="overlay-text p-2 text-white d-flex align-items-center col-11 col-lg-8 p-md-5 ">Mental health is crucial for engineering students as it directly impacts their academic performance, creativity, and overall well-being. Maintaining good mental health helps students manage stress, stay focused, and build resilience against challenges. It fosters a balanced lifestyle, enhances problem-solving skills, and supports personal growth. Prioritizing mental health enables students to thrive both academically and personally, ensuring they are equipped to tackle the rigorous demands of their studies and future careers.</div>
    </div>
  </div>

  <footer>
    <div class="container text-center">
      <div class="row">
        <div class="col-sm-4">
          <h2>Contact Us</h2>
          <br class="d-none d-md-block">
          <h5><a href="index.php">winchester@mkn.com</a></h5>
          <h5>(+95) 9 7877 53307</h5>
          <h5>Junction Square Campus</h5>
          <h5>Yangon</h5>
        </div>
        <div class="col-sm-4 mt-5 mt-md-0">
          <h2>Connect</h2>
          <br class="d-none d-md-block">
          <a href="#" class="footer-icon"><i class="fa-brands fa-facebook"></i></a>
          <a href="#" class="footer-icon"><i class="fa-brands fa-github"></i></a>
          <a href="#" class="footer-icon"><i class="fa-brands fa-instagram"></i></a>
          <a href="#" class="footer-icon"><i class="fa-brands fa-twitter"></i></a>
          <a href="#" class="footer-icon"><i class="fa-brands fa-linkedin"></i></a>
        </div>
        <div class="col-sm-4 mt-5 mt-md-0">
          <img src="./img/logo-small.png" alt="Footer Logo Icon" id="icon" class="img-fluid">
        </div>
      </div>
    </div>
  </footer>

  <!-- Jquery Offline -->
  <script src="./js/jquery-3.7.1.min.js"></script>
  <script src="./js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function() {
      $(document).on("keydown", function(e) {
        if (e.key === "Enter") {
          e.preventDefault();
          $("#loginBtn").trigger("click");
        }

        if (!$("input[type='text'], input[type='password']").is(":focus")) {
          switch (e.key) {
            case "l":
              $("#signInModal").trigger("click");
              break;
            case "r":
              $("#registerBtn").trigger("click");
              break;
          }
        }
      });

      $("#registerBtn").on("click", function() {
        window.location.href = $(this).attr('href');
      });
      $("#loginBtn").click(function() {
        $("#response").empty();

        var username = $("#username").val().trim();
        var password = $("#password").val().trim();

        $.post(
          "./api/login_validate.php", {
            username: username,
            password: password,
          },
          function(data) {
            var res = JSON.parse(data);
            console.log(res.status);
            console.log(res.last_page);

            if (res.status === "Login Successful") {
              $("#response").text(res.status);
              $("#response").addClass("text-success").removeClass("text-danger");
              setTimeout(function() {
                if (res.last_page) {
                  window.location.replace(res.last_page);
                } else {
                  window.location.replace("./app/welcome.php");
                }
              }, 500);
            } else {
              $("#response").text(res.status);
              $("#response").addClass("text-danger").removeClass("text-success");
            }
          }
        );
      });

      $("#togglePassword").on("click", function() {
        var passwordField = $("#password");
        var eyeIcon = $("#eyeIcon");

        if (passwordField.attr("type") === "password") {
          passwordField.attr("type", "text");
          eyeIcon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
          passwordField.attr("type", "password");
          eyeIcon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
      });
    });
  </script>
</body>


</html>