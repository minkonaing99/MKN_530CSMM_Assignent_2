<?php
session_start();
// if there is no session with login id 1280, refer the user to index page
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
    <!-- Jquery -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/012d22a369.js" crossorigin="anonymous"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/general_styles.css">
    <link rel="stylesheet" href="../css/announcement.css">
    <title>Announcement</title>
</head>

<body>
    <?php include_once './newnavbar.php'; ?>
    <div class="background"></div>
    <div class='topPadding'></div>

    <div class="container mt-sm-2">
        <!-- toggle button for announcement post, in smaller devices -->
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary w-75 d-md-none mt-3" id="show_hide_button">Announcement</button>
        </div>
        <!-- form handling by using post method and aciton to announcement insertion -->
        <form action="<?php echo "../api/announcement_insertion.php" ?>" method="post">
            <div class="row">
                <div class="col-12 col-md-4 p-md-4 d-md-block p-md-1" id="form_show_hide">
                    <div class="p-3 p-md-4 mt-md-4 mt-3 shadowBox me-md-2">
                        <div class="text-secondary">
                            <h5>New Post</h5>
                        </div>
                        <div class="mt-2"><input type="text" name="title" id="title" class="form-control" placeholder="Title.. ' / ' to type here"></div>
                        <div class="mt-2"><textarea type="text" name="description" id="description" class="form-control" placeholder="Description..." cols="30" rows="10"></textarea></div>
                        <div class="d-flex justify-content-end mt-2"><button type="submit" class="btn btn-primary btn-size" name="postBtn">Post</button></div>
                    </div>
                </div>
        </form>
        <div class="col-12 col-md-8 mt-md-1 mt-1">
            <div class="row">
                <!-- <div class="col-12 col-lg-11 mb-0 mb-sm-0">
                    <div class="shadow-sm p-2">
                        <div>
                            <h1>Announcement</h1>
                        </div>
                    </div>
                </div> -->
            </div>
            <?php include_once '../api/announcement_reading.php'; ?>
        </div>
    </div>
    <?php
    include_once '../app/alert.php';
    ?>
    <script src="../js/average_rating.js"></script>

    <script>
        $(document).ready(function() {
            $('#show_hide_button').click(function() {
                $('#form_show_hide').toggle();
            });
        });
    </script>
    <script src="../js/sessiontimeout.js"></script>


</body>

</html>