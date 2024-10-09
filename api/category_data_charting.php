<?php
include_once '../api/dbinfo.php';
session_start();
$user_id = $_SESSION['user_id'];
$from = $_POST['from'];
$to = $_POST['to'];

$sql = "SELECT happiness, anxiety, workload_mgmt, input_date
        FROM category
        WHERE user_id = ?
        AND input_date >= ? 
        AND input_date <= ?
        ORDER BY input_date ASC";

$stmt = $con->prepare($sql);
$stmt->bind_param('iss', $user_id, $from, $to);
$stmt->execute();

$result = $stmt->get_result();
$cateData = $result->fetch_all(MYSQLI_ASSOC);

$json_data = json_encode($cateData);
echo $json_data;
