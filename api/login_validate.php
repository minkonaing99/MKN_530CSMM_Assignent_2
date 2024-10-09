<?php
include_once './dbinfo.php';
session_start();
// timezone for Myanmar time
date_default_timezone_set('Asia/Yangon');
$date = date('Y-m-d');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $input_password = htmlspecialchars($_POST['password']);
    // this query is to check whether user login for the first time, if the user logged in for the first time, it will add count and date

    $query = "SELECT attempt_count, attempt_date FROM user WHERE username = ?";
    $statement = $con->prepare($query);
    $statement->bind_param("s", $username);
    $statement->execute();
    $result = $statement->get_result();
    $count = $result->fetch_assoc();
    // if the count is not null, the query will check the last attempt date is today or not
    if ($count) {
        if ($count['attempt_date'] !== $date) {
            // if the date is not the same as today date, it will update the date and reset the attempt count
            $resetQuery = $con->prepare("UPDATE user SET attempt_count = 0, attempt_date = ? WHERE username = ?");
            $resetQuery->bind_param("ss", $date, $username);
            $resetQuery->execute();
            $count['attempt_count'] = 0;
        } else if ($count['attempt_count'] >= 3) {
            // if the attempt_count is 3 times or more, the account will be lock until the date change.
            $fail = [
                "status" => "You have been locked out due to multiple failed login attempts. Please try again tomorrow."
            ];
            echo json_encode($fail);
            exit();
        }
    }
    // if attempt count is less than 3, this query will select the data from the database
    $select_query = "SELECT user_id, name, email, birthday, ph_num, id_num, role, major, profile, password FROM user WHERE username = ?";
    $statement = $con->prepare($select_query);
    $statement->bind_param("s", $username);
    $statement->execute();
    $statement->store_result();
    $statement->bind_result($user_id, $name, $email, $birthday, $ph_num, $id_num, $role_id, $major, $profile, $password);

    // if the return rows is greater than 0, there is data with the same username,
    if ($statement->num_rows > 0) {
        $statement->fetch();

        // if the password is the same as hashed password stored in the database, by using password_hash and password_verify function
        // if success the user data will be store in the session
        if (password_verify($input_password, $password)) {
            $_SESSION['login'] = 1280;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['birthday'] = $birthday;
            $_SESSION['ph_num'] = $ph_num;
            $_SESSION['id_num'] = $id_num;
            $_SESSION['role_id'] = $role_id;
            $_SESSION['major'] = $major;
            $_SESSION['profile'] = $profile;
            $_SESSION['username'] = $username;


            // this portion is to store major name for further use
            if (!empty($_SESSION['major'])) {
                $query = "SELECT major_name FROM major WHERE major_id = '$major';";
                $result = $con->query($query);
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $_SESSION['major_name'] = $row['major_name'];
            } else {
                $_SESSION['major_name'] = '';
            }
            if (!isset($_SESSION['last_page'])) {
                $_SESSION['last_page'] = false;
            }

            $success = [
                "status" => "Login Successful",
                "last_page" => $_SESSION['last_page']
            ];

            echo json_encode($success);

            // if login is successful, the attempt_count will be reset to 0
            $updateQuery = $con->prepare("UPDATE user SET attempt_count = 0 WHERE username = ?");
            $updateQuery->bind_param("s", $username);
            $updateQuery->execute();
        } else {
            if ($count) {
                // if login failed, the attempt_count will be plus one to the previous count
                $updateQuery = $con->prepare("UPDATE user SET attempt_count = attempt_count + 1 WHERE username = ?");
                $updateQuery->bind_param("s", $username);
                $updateQuery->execute();
            }
            $fail = [
                "status" => "Incorrect username or password."
            ];

            echo json_encode($fail);
        }
    } else {
        $fail = [
            "status" => "User does not exist."
        ];

        echo json_encode($fail);
    }
} else {
    $fail = [
        "status" => "Invalid Server Request"
    ];
    echo json_encode($fail);
}
$con->close();
