<?php
date_default_timezone_set('Asia/Yangon');
$today_date = date('d-m-Y');
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
    <!-- Bootstrap Offline -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Jquery Offline -->
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="https://kit.fontawesome.com/012d22a369.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/general_styles.css">
    <link rel="stylesheet" href="../css/glow.css">
    <link rel="stylesheet" href="../css/rating_star.css">
    <title>Well Beings</title>
</head>

<body>
    <div class='topPadding'></div>
    <div class="background"></div>

    <?php
    include_once '../app/newnavbar.php';

    echo "<div class='padding d-none d-sm-block'></div>";
    include_once '../api/category_date_check.php';

    if ($check) {
        echo "<div class='container' style='width:96%'>
                <div class='alert alert-success mt-md-4 mt-3' role='alert'>
                    You have already rated for today. If you would like to Resubmit, click 
                    <a type='button' data-bs-toggle='modal' data-bs-target='#staticBackdrop' class='alert-link'>Here</a>
                    </div>
              </div>";
    } else {

        include_once './rate.php';
        echo "<div class='container' style='width:96%'>
                <div class='alert alert-danger mt-md-4 mt-3' role='alert'>
                    You have not Rate for Today...
                    </div>
              </div>";
    }
    ?>
    <div class='container'>
        <div class='padding d-none d-sm-block'></div>

        <h4 class="my-4 mb-sm-4">Average score of your well-beings in last 3 days is ...</h4>

        <div class="p-2 my-5">
            <div class="row justify-content-center">
                <div class="col-10 col-md-4 col-lg-3 text-center my-3 my-md-2 ">
                    <div class=" mx-2 p-2 shadowBox rounded-5" id="anxietyBox">
                        <div class="text-muted">Anxiety</div>
                        <div class="fs-2" id="anxiety-score">Loading...</div>
                    </div>
                </div>
                <div class="col-10 col-md-4 col-lg-3 text-center my-3 my-md-2 ">
                    <div class=" mx-2 p-2 rounded-5 shadowBox" id="happinessBox">
                        <div class="text-muted">Happiness</div>
                        <div class="fs-2" id="happiness-score">Loading...</div>
                    </div>
                </div>
                <div class="col-10 col-md-4 col-lg-3 text-center my-3 my-md-2 ">
                    <div class=" mx-2 p-2 rounded-5 shadowBox" id="workloadBox">
                        <div class="text-muted">Workload Management</div>
                        <div class="fs-2" id="workload-score">Loading...</div>
                    </div>
                </div>
                <div class="my-4 mt-sm-5 text-center" id="consult">No Enough Data to Calculate for Average</div>
            </div>
        </div>

        <div class='padding'></div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                            <?php
                            echo "Please rate for $today_date"
                            ?></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="justify-content-center">

                            <div class="">
                                <div class="box my-lg-4 mx-lg-5 mb-2 mt-1 mx-0">
                                    <div class="ratinglabel my-1">Anxiety</div>
                                    <div class="star-widget">
                                        <input type="radio" name="anxiety" id="anxiety_rate1" value="5">
                                        <label for="anxiety_rate1" class="fas fa-star"></label>
                                        <input type="radio" name="anxiety" id="anxiety_rate2" value="4">
                                        <label for="anxiety_rate2" class="fas fa-star"></label>
                                        <input type="radio" name="anxiety" id="anxiety_rate3" value="3">
                                        <label for="anxiety_rate3" class="fas fa-star"></label>
                                        <input type="radio" name="anxiety" id="anxiety_rate4" value="2">
                                        <label for="anxiety_rate4" class="fas fa-star"></label>
                                        <input type="radio" name="anxiety" id="anxiety_rate5" value="1">
                                        <label for="anxiety_rate5" class="fas fa-star"></label>
                                    </div>
                                </div>

                                <div class="box my-lg-4 mx-lg-5 my-2 mx-0">

                                    <div class="ratinglabel my-1">Happiness</div>
                                    <div class="star-widget">
                                        <input type="radio" name="happiness" id="happiness_rate1" value="5">
                                        <label for="happiness_rate1" class="fas fa-star"></label>
                                        <input type="radio" name="happiness" id="happiness_rate2" value="4">
                                        <label for="happiness_rate2" class="fas fa-star"></label>
                                        <input type="radio" name="happiness" id="happiness_rate3" value="3">
                                        <label for="happiness_rate3" class="fas fa-star"></label>
                                        <input type="radio" name="happiness" id="happiness_rate4" value="2">
                                        <label for="happiness_rate4" class="fas fa-star"></label>
                                        <input type="radio" name="happiness" id="happiness_rate5" value="1">
                                        <label for="happiness_rate5" class="fas fa-star"></label>
                                    </div>
                                </div>

                                <div class="box my-lg-4 mx-lg-5 my-2 mx-0">

                                    <div class="ratinglabel my-1">Workload Management</div>
                                    <div class="star-widget">
                                        <input type="radio" name="wl_mgmt" id="wl_mgmt_rate1" value="5">
                                        <label for="wl_mgmt_rate1" class="fas fa-star"></label>
                                        <input type="radio" name="wl_mgmt" id="wl_mgmt_rate2" value="4">
                                        <label for="wl_mgmt_rate2" class="fas fa-star"></label>
                                        <input type="radio" name="wl_mgmt" id="wl_mgmt_rate3" value="3">
                                        <label for="wl_mgmt_rate3" class="fas fa-star"></label>
                                        <input type="radio" name="wl_mgmt" id="wl_mgmt_rate4" value="2">
                                        <label for="wl_mgmt_rate4" class="fas fa-star"></label>
                                        <input type="radio" name="wl_mgmt" id="wl_mgmt_rate5" value="1">
                                        <label for="wl_mgmt_rate5" class="fas fa-star"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="rateResult" class="mb-2 text-center"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-size" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="rateBtn" class="btn btn-primary btn-size">Rate</button>
                    </div>
                </div>
            </div>
        </div>
    </div>\
    <?php
    include_once '../app/alert.php';
    ?>


    <script src="../js/category_data_insertion.js"></script>
    <script src="../js/average_rating.js"></script>
    <script src="../js/sessiontimeout.js"></script>


</body>

</html>