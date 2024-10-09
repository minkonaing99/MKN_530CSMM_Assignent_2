<?php
include_once './dbinfo.php';

if (isset($_POST['username'])) {
    // to check if there is the same user name or not
    $username = htmlspecialchars($_POST['username']);

    $stmt = $con->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    $row = $result->num_rows;

    if ($row > 0) {
        // put key of exist and value true and false
        echo json_encode(['exists' => true]);
    } else {
        echo json_encode(['exists' => false]);
    }
}
