<?php
$host = '127.0.0.1';
$username = 'root';
$password = 'Minkonaing1';
$dbname = 'wit';
$port = '3306';

try {
    $con = new mysqli($host, $username, $password, $dbname, $port);
    // echo 'success';
} catch (PDOException $error) {
    echo "Connection failed to database." . $error->getMessage();
}


// name email birthday role major ph_num username password profile -> user
//category_id user_id happiness anxiety workload_mgmt input_date -> category
//announcement_id user_id major_id title description create_date -> announcement