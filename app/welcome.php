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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Bootstrap Offline -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Jquery Offline -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/012d22a369.js" crossorigin="anonymous"></script>


    <!-- <link rel="stylesheet" href="../css/quotestyles.css"> -->
    <link rel="stylesheet" href="../css/general_styles.css">
    <link rel="stylesheet" href="../css/autocomplete.css">
    <link rel="stylesheet" href="../css/quotestyles.css">

</head>

<body>
    <div class="background"></div>

    <?php
    include_once './newnavbar.php';
    ?>
    <div class='topPadding'></div>


    <header class="header" style="background-image: url('../img/overlay_background.jpg');">
        <div class="color-overlay d-flex flex-column flex-md-row justify-content-center align-items-center">
            <h1 class="me-md-1">Welcome, </h1>
            <h1 class="ms-md-1"><?php echo $_SESSION['name']; ?></h1>
        </div>
    </header>

    <div class="container">
        <h2 class="mt-3">Quote for the day...</h2>
        <div class="d-flex justify-content-end me-md-5 my-3" style="width: 100%;">
            <div class="input-group" id="input-group">
                <input type="text" id="searchbox" class="form-control" placeholder=" '/' to type here...">
                <a class="btn btn-primary w-lg-25" id="searchBtn" style="border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
        </div>
        <div id="resultsContainer"></div>

        <div class="custon-container d-flex mx-auto">

            <blockquote>
                <p>Loading...</p>
                <p>Loading ...</p>
            </blockquote>

        </div>

        <div class="d-flex justify-content-center mb-2">
            <button class="btn btn-primary mx-auto" id="previousBtn"><i class="fa-solid fa-angles-left"></i></button>
            <button class="btn btn-primary mx-auto" id="nextBtn"><i class="fa-solid fa-angles-right"></i></button>
        </div>
    </div>

    <?php
    include_once '../app/alert.php';
    ?>
    <script src="../js/average_rating.js"></script>


    <script src="../js/fetching.js"></script>
    <script src="../js/sessiontimeout.js"></script>

</body>

</html>