<?php

include_once './dbinfo.php';
$id = htmlspecialchars($_GET['id']);

// Delete Announcement according to own User_ID
$delete_query = "DELETE FROM announcement where announcement_id=?";
$statement = $con->prepare($delete_query);
$statement->bind_param("i", $id);
$statement->execute();
if ($statement->execute()) {
    echo "Announcement deleted successfully.";
    header("Location:../app/announcement.php");
} else {
    echo "Fail to delete";
}
$statement->close();
$con->close();
