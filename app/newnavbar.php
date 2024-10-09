<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg nav-light bg-nav nav-shadow text-white">
        <div class="container">
            <a href="../app/welcome.php" class="mb-0">
                <img src="../img/logo-small.png" alt="LOGO" width="150">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a href="./welcome.php" class="nav-link mx-1 fs-5 mx-1 font-color" id="home"><u>H</u>ome</a>
                    </li>
                    <li class="nav-item active">
                        <a href="./well_beings.php" class="nav-link fs-5 mx-1 font-color" id="well_beings"><u>W</u>ell-Beings</a>
                    </li>
                    <li class="nav-item active">
                        <a href="./chart.php" class="nav-link fs-5 mx-1 font-color" id="chart">Cha<u>r</u>t</a>
                    </li>
                    <?php
                    if ($_SESSION['major'] != '') {
                        echo "<li class='nav-item active'>
                        <a href='./announcement.php' class='nav-link fs-5 mx-1 font-color' id='announcement'><u>A</u>nnouncement</a>
                    </li>";
                    }
                    ?>


                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown" id="username">
                        <a href="" class="nav-link fs-5 dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>
                                <span id="profile-name"><?php echo '@ ' . $_SESSION['username']; ?></span>
                                <img src="<?php echo '../img/' . $_SESSION['profile'] ?>" alt="Profile" class="profile-image border border-secondary border-2 rounded-circle">
                            </span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="../app/profile_info.php" class="dropdown-item" id="profile-key"><u>P</u>rofile</a></li>
                            <li><a href="#" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#logoutModal" id="logout-key">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmLogoutButton">Logout</button>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- Jquery Offline -->
    <script src="../js/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function() {
            $(document).keydown(function(e) {
                // Log the key pressed for debugging
                // console.log("Key pressed: " + e.key);

                // Check if any input of type 'text' is focused
                if ($("input[type='text'] , textarea").is(":focus")) {
                    if (e.key === "Escape") {
                        e.preventDefault();
                        $("input[type='text'], textarea").blur(); // Unfocus the input or textarea
                    }
                } else {
                    // Handle keyboard shortcuts when no input is focused
                    switch (e.key) {
                        case "/":
                            e.preventDefault();
                            $("input[type='text']").focus();
                            break;
                        case "h":
                            // console.log("Triggering home click");
                            $("#home").trigger("click");
                            break;
                        case "e":
                            // console.log("Triggering home click");
                            $("#editBtn").trigger("click");
                            break;
                        case "l":
                            // console.log("Triggering home click");
                            $("#logoutBtn").trigger("click");
                            break;
                        case "w":
                            // console.log("Triggering well_beings click");
                            $("#well_beings").trigger("click");
                            break;
                        case "a":
                            // console.log("Triggering announcement click");
                            $("#announcement").trigger("click");
                            break;
                        case "b":
                            // console.log("Triggering about click");
                            $("#about").trigger("click");
                            break;
                        case "r":
                            // console.log("Triggering chart click");
                            $("#chart").trigger("click");
                            break;
                        case "p":
                            // console.log("Triggering profile key click");
                            $("#profile-key").trigger("click");
                            break;
                        case "c":
                            // console.log("Triggering profile key click");
                            $("#cancelBtn").trigger("click");
                            break;
                        case "s":
                            // console.log("Triggering profile key click");
                            $("#saveBtn").trigger("click");
                            break;
                        default:
                            // console.log("Key not handled");
                    }
                }
            });

            // Handle clicks for each of the elements with specified IDs
            $("#home, #well_beings, #announcement, #about, #chart, #profile-key, #logout-key ,#editBtn, #logoutBtn, #cancelBtn, #saveBtn").on("click", function() {
                // console.log("Element clicked: " + this.id);
                window.location.href = $(this).attr('href');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            var currLoc = $(location).attr('href');
            if (currLoc === 'http://localhost/MKN_530CSMM_Assignent_2/app/welcome.php') {
                $('#home').css({
                    'font-weight': '500',
                    'color': 'black'
                });
            } else if (currLoc === 'http://localhost/MKN_530CSMM_Assignent_2/app/well_beings.php') {
                $('#well_beings').css({
                    'font-weight': '500',
                    'color': 'black'
                });
            } else if (currLoc === 'http://localhost/MKN_530CSMM_Assignent_2/app/announcement.php') {
                $('#announcement').css({
                    'font-weight': '500',
                    'color': 'black'
                });
            } else if (currLoc === 'http://localhost/MKN_530CSMM_Assignent_2/app/chart.php') {
                $('#chart').css({
                    'font-weight': '500',
                    'color': 'black'
                });
            }

            var lastScrollTop = 0;
            $(window).scroll(function(event) {
                var st = $(this).scrollTop();
                if (st > lastScrollTop) {
                    $('.navbar').addClass('navbar-hidden');
                } else {
                    $('.navbar').removeClass('navbar-hidden');
                }
                lastScrollTop = st;
            });

            $('#confirmLogoutButton').click(function() {
                window.location.href = '../api/logout.php';
            });
        });
    </script>
</body>