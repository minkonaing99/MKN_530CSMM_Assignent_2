<?php
include_once './dbinfo.php';
session_start();
// echo "<pre>";
// getting user_id from session
$user_id = $_SESSION['user_id'];
// getting data from post request
$name = htmlspecialchars($_POST['name']);
$id_num = htmlspecialchars($_POST['id_num']);
$email = htmlspecialchars($_POST['email']);
// if user didn't touch the birthday input, and return emptry i want the birthday to be null
$birthday = !empty(htmlspecialchars($_POST['birthday'])) ? htmlspecialchars($_POST['birthday']) : null;
$ph_num = htmlspecialchars($_POST['ph_num']);
$major = htmlspecialchars($_POST['major']);
// echo $major;
// if major is not selected and return value as default which is 10, i want the major data to be the same as major
if ($major == 10) {
    $major = $_SESSION['major'];
}
// echo $major;

// making the $new_image_uploaded default as false
$new_image_uploaded = false;
// checking if there is file upload by checking the array of $_file method 
if (isset($_FILES['profile']['name']) && $_FILES['profile']['name'] != '') {
    $tmp_name = $_FILES['profile']['tmp_name'];
    $file_type = $_FILES['profile']['type'];
    // checking the file type is jpeg or png to rename the uploaded file as the username and its extension.
    if ($file_type == 'image/png' || $file_type == 'image/jpeg') {
        if ($file_type == 'image/png') {
            $image_name = $_SESSION['username'] . '_profile.png';
            $target_file = '../img/' . $image_name;
        } elseif ($file_type == 'image/jpeg') {
            $image_name = $_SESSION['username'] . '_profile.jpeg';
            $target_file = '../img/' . $image_name;
        }
        // if file upload, move it to target file
        if (move_uploaded_file($tmp_name, $target_file)) {
            echo "Upload Success";
            $new_image_uploaded = true;
        } else {
            echo "Fail...";
        }
    }
}

// checking if there is uploaded file, if new file uploaded update $image_name to new uploaded file name
if ($new_image_uploaded) {
    $sql = "UPDATE user SET name = ?, id_num = ?, email = ?, birthday = ?, ph_num = ?, major = ?, profile = ? WHERE user_id = ?";
    $statement = $con->prepare($sql);
    $statement->bind_param('sssssssi', $name, $id_num, $email, $birthday, $ph_num, $major, $image_name, $user_id);
} else {
    // checking if there is uploaded file, if new file is not uploaded, leave the image_name column.
    $sql = "UPDATE user SET name = ?, id_num = ?, email = ?, birthday = ?, ph_num = ?, major = ? WHERE user_id = ?";
    $statement = $con->prepare($sql);
    $statement->bind_param('ssssssi', $name, $id_num, $email, $birthday, $ph_num, $major, $user_id);
}
$statement->execute();
// update the session again for new input data
$_SESSION['name'] = $name;
$_SESSION['id_num'] = $id_num;
$_SESSION['email'] = $email;
$_SESSION['birthday'] = $birthday;
$_SESSION['ph_num'] = $ph_num;
$_SESSION['major'] = $major;
// if new uploaded, save the new image name in session
if ($new_image_uploaded) {
    $_SESSION['profile'] = $image_name;
}

// to save the major name from major_id if any changes occur
$sql = "SELECT * FROM major WHERE major_id = ?";
$statement = $con->prepare($sql);
$statement->bind_param('i', $major);
$statement->execute();

$result = $statement->get_result();
$majors = $result->fetch_assoc();

echo "<pre>";
print_r($_POST);
// print_r($_FILES);
print_r($_SESSION);
print_r($majors);

$_SESSION['major_name'] = $majors['major_name'];

$statement->close();
$con->close();

header("Location: ../app/profile_info.php");
exit();
