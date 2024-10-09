<?php
include_once './dbinfo.php';
session_start();
// if first register is successful, it will refer to the details register

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // checking if there is username in session, if there is one, use session username if not put 3
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : 3;

    $email = $_POST['email'];
    $birthday = !empty($_POST['birthday']) ? $_POST['birthday'] : null;
    $role = $_POST['role'];
    $ph_num = $_POST['ph_num'];
    $id_num = $_POST['id_num'];
    $major = $_POST['major'];
    // if user didnt select the major which is return value 10, then set it to null.
    if ($major == 10) {
        $major = null;
    }

    $update_query = "UPDATE user SET email = ?, birthday = ?, role = ?, ph_num = ?, id_num = ?, major = ? WHERE username = ?";
    $statement = $con->prepare($update_query);
    $statement->bind_param("ssissis", $email, $birthday, $role, $ph_num, $id_num, $major, $username);
    if ($statement->execute()) {
        echo "Record updated successfully";
        session_destroy();
    }

    $statement->close();
} else {
    echo "Failed to update: invalid request method!";
}

$con->close();
