<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Offline -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Modal Example</title>
</head>

<body>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        Please rate for Today <?php echo $today_date ?>
                    </h1>
                </div>
                <div class="modal-body">
                    <div class="justify-content-center">
                        <div class="">
                            <div class="box my-lg-4 mx-lg-5 my-2 mx-0">
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
                <div class="modal-footer">
                    <button type="button" id="rateBtn" class="btn btn-primary btn-size">Rate</button>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/category_data_insertion.js"></script>

    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- Script to trigger modal on page load -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
                backdrop: 'static',
                keyboard: false
            });
            myModal.show();
        });
    </script>
</body>

</html>