<?php
require_once '../api/dbinfo.php';
// session_start();
$user_id = $_SESSION['user_id'];

// setting date for Myanmar
date_default_timezone_set('Asia/Yangon');
$date = date('Y-m-d');

// to check if there is today input or not
$sql = "SELECT category_id FROM category WHERE user_id = ? AND input_date = ?";
$statement = $con->prepare($sql);
$statement->bind_param('is', $user_id, $date);
$statement->execute();
$statement->store_result();
$statement->bind_result($category_id);
$statement->fetch();
$check = ($statement->num_rows > 0);


// if ($check) {
//     echo 'true';
//     echo $date;
// } else {
//     false;
// }
