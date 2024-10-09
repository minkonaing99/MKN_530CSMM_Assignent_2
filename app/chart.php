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
    <script src="https://kit.fontawesome.com/012d22a369.js" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap Offline -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/general_styles.css">
    <title>Welcome</title>

</head>

<body>
    <div class="background"></div>

    <?php
    include_once './newnavbar.php';
    ?>
    <div class='topPadding'></div>

    <div class="container">
        <h2 class="mb-4 d-none d-md-block mt-3">Well-Beings Chart through the Time</h2>
        <h2 class="mb-4 d-block d-md-none mt-1">Well-Beings</h2>
    </div>

    <?php
    include_once './filter_google_chart.php';
    ?>
    <?php
    include_once '../app/alert.php';
    ?>
    <script src="../js/average_rating.js"></script>


    <script src="../js/sessiontimeout.js"></script>

</body>

</html>