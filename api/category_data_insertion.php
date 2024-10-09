<?php
session_start();
include "dbinfo.php";

// getting user_id from session
$user_id = $_SESSION['user_id'];

//getting data with post method
$anxiety = htmlspecialchars($_POST['anxiety']);
$happiness = htmlspecialchars($_POST['happiness']);
$wl_mgmt = htmlspecialchars($_POST['wl_mgmt']);


//setting timezone for Myanmar to check data
date_default_timezone_set('Asia/Yangon');
$date = date('Y-m-d');

if (!empty($anxiety) && !empty($happiness) && !empty($wl_mgmt)) {
    include_once './category_date_check.php';
    // $check comes from category_date_check.php as true or false
    if ($check) {
        //if there is data for today date, overwrite those data.
        $sql = "UPDATE category SET anxiety = ?, happiness = ?, workload_mgmt = ? WHERE user_id = ? AND input_date = ?";
        $statement = $con->prepare($sql);
        $statement->bind_param('iiiis', $anxiety, $happiness, $wl_mgmt, $user_id, $date);
        $statement->execute();

        if ($statement->affected_rows > 0) {
            echo "Successfully Updated";
            // header('Location: ../app/well_beings.php');
        }
    } else {
        //if there is no data for today date, insert as new line in the category table 
        $sql = "INSERT INTO category (user_id, anxiety, happiness, workload_mgmt, input_date) VALUES (?,?,?,?,?)";
        $statement = $con->prepare($sql);
        $statement->bind_param('iiiis', $user_id, $anxiety, $happiness, $wl_mgmt, $date);
        $statement->execute();

        echo "Successfully Updated";
        // head to the specific url
        // header('Location: ../app/well_beings.php');
    }
} else {
    // if fail
    echo "Please Rate";
    // head to the specific url
    // header('Location: ../app/well_beings.php');
}
$statement->close();
$con->close();
