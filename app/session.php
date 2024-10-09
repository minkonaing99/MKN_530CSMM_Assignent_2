<?php
if ($_POST['inactive'] == true) {
    session_start();
    session_unset();
    $_SESSION['last_page'] = $_POST['loc'];
    echo json_encode($_SESSION);
}
