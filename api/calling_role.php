<?php
include_once '../api/dbinfo.php';
// to use as select option when register and editing the profile

$sql = "SELECT * FROM role";

$result = $con->query($sql);

echo "<select name='role' id='role' class='form-control'>";
while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['role_id'] . "'>" . $row['role_name'] . "</option>";
}
echo "</select>";

// echo $result->num_rows;

// echo "<pre>";
// print_r($roles);
