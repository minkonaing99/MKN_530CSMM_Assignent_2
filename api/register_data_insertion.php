<?php
include_once './dbinfo.php';
// this is for first register page
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // check input password and confirm password are the same
    if ($_POST['password'] == $_POST['confirm_password']) {
        $username = $_POST['username'];
        // double check if the username exist or not, firt check by register_data_name_check
        $select_query = "SELECT * FROM user WHERE username = ?";
        $statement = $con->prepare($select_query);
        $statement->bind_param("s", $username);
        $statement->execute();
        $statement->store_result();
        if ($statement->num_rows > 0) {
            echo "Username already exists.";
        } else {
            // if there is no comflict in usernanme, continuse the process
            $name = $_POST['name'];
            // hash the input password by using php function password_hash() BCRYPT method
            $hash_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            // and insert them into database
            $insert_query = "INSERT INTO user (username, password, name) VALUES (?, ?, ?)";
            $statement = $con->prepare($insert_query);
            $statement->bind_param("sss", $username, $hash_password, $name);
            if ($statement->execute()) {
                echo "New record created successfully";
                session_start();
                $_SESSION['login'] = 2580;
                $_SESSION['username'] = $username;
            } else {
                echo "Error: " . $statement->error;
            }
        }
        $statement->close();
    } else {
        echo 'Passwords do not match.';
    }
}
