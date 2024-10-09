<?php
include_once '../api/dbinfo.php';
session_start();
// getting userid from session
$user_id = $_SESSION['user_id'];

$select_query = "SELECT * FROM category WHERE user_id =? LIMIT 3";
$statement = $con->prepare($select_query);
$statement->bind_param('i', $user_id);
$statement->execute();
$result = $statement->get_result();
$row = $result->num_rows;

if ($row == 3) {
    $select_query = 'SELECT AVG(happiness) AS avg_happiness,
    AVG(anxiety) AS avg_anxiety,
    AVG(workload_mgmt) AS avg_workload_mgmt
FROM (
 SELECT happiness, anxiety, workload_mgmt
 FROM category
 WHERE user_id = ?
 ORDER BY input_date DESC
 LIMIT 3 
) AS latest_three_days';

    $statement = $con->prepare($select_query);
    $statement->bind_param('i', $user_id);
    $statement->execute();

    $result = $statement->get_result();
    $data = $result->fetch_assoc();

    // print_r($cateData);

    echo json_encode($data);
} else {
    echo "nan";
}



// to get to average of the last 3 days to show on well-begins page


$statement->close();
$con->close();
