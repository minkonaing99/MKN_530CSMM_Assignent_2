<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overlay</title>
    <!-- Bootstrap Offline -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

        header {
            background: no-repeat center center;
            background-size: cover;
            color: white;
        }

        .color-overlay h1 {
            font-family: "Ubuntu", sans-serif;
            font-weight: bolder;
            text-transform: uppercase;

        }

        .color-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            min-height: 40vh;

        }

        @media (max-width: 767.98px) {
            .color-overlay {
                min-height: 30vh;
            }
        }
    </style>
</head>

<body>
    <header class="header" style="background-image: url('../images/overlay_background.jpg');">
        <div class="color-overlay d-flex flex-column flex-md-row justify-content-center align-items-center">
            <h1 class="me-md-1">Welcome, </h1>
            <h1 class="ms-md-1"><?php echo $_SESSION['name']; ?></h1>
        </div>
    </header>
</body>

</html>