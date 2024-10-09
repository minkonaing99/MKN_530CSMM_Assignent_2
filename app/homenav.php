<head>
    <!-- Bootstrap Offline -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        .bg-nav {
            background-color: transparent !important;
            transition: background-color 0.3s ease;
        }

        .bg-white {
            background-color: white !important;
            transition: background-color 0.3s ease;
        }

        .navbar-light .navbar-nav .nav-link {
            color: black;
        }

        .btn-primary {
            border: 2px solid #1a4460 !important;
            transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: transparent !important;
            border: 2px solid #1a4460 !important;
            color: #1a4460 !important;
        }

        .btn-white {
            border: 2px solid white !important;
            background-color: transparent;
            transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-white:hover {
            background-color: white !important;
            border: 2px solid white !important;
            color: black !important;
        }
    </style>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-sm navbar-light bg-nav text-white">
        <div class="container">
            <a href="./index.php" class="mb-0">
                <img id="navbar-logo" src="./img/logo-white-small.png" alt="" width="150">
            </a>

            <div class="">
                <ul class="navbar-nav ms-auto">
                    <?php
                    if (!isset($_SESSION['login'])) {
                        echo "<li class='nav-item active'>
                    <a href='./app/register.php' class='nav-link btn btn-white btn-size text-white mx-1 active' id='registerBtn'><u>R</u>egister</a>
                    </li>";
                    } else {
                        echo "<li class='nav-item active'>
                        <a href='./api/logout.php' class='nav-link btn btn-danger btn-size text-white mx-1 fs-5 active' id='confirmLogoutButton'>Logout</a>
                    </li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Bootstrap Script Offline -->
    <script src="./js/bootstrap.bundle.min.js"></script>
    <!-- Jquery Offline -->
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll > 0) {
                    $('.navbar').removeClass('bg-nav').addClass('bg-white');
                    $('li a:first-child').removeClass('btn-white').addClass('btn-primary');
                    $('#navbar-logo').attr('src', './img/logo-small.png');
                } else {
                    $('.navbar').removeClass('bg-white').addClass('bg-nav');
                    $('li a:first-child').removeClass('btn-primary').addClass('btn-white');

                    $('#navbar-logo').attr('src', './img/logo-white-small.png');
                }
            });

            $('#confirmLogoutButton').click(function() {
                window.location.href = './api/logout.php';
            });
        });
    </script>
</body>