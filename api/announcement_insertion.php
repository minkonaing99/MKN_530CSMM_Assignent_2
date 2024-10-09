<?php
include_once './dbinfo.php';
session_start();

if (isset($_POST['postBtn'])) {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);

    // getting user_id and major_id from session
    $user_id = $_SESSION['user_id'];
    $major_id = $_SESSION['major'];
    // checking if empty or not in the title and description
    if (($title != '') && !empty($title) && ($description != '') && !empty($description)) {

        $select_query = "INSERT INTO announcement (user_id,major_id,title,description) VALUES(?, ?, ?, ?)";
        $statement = $con->prepare($select_query);
        $statement->bind_param("iiss", $user_id, $major_id, $title, $description);
        $statement->execute();
        $statement->close();
    } else {
        echo "Can't Update the Post";
    }
    header("Location: ../app/announcement.php");
}
$con->close();
