<?php
include_once '../api/dbinfo.php';
// to use as select option when register and editing the profile

$sql = "SELECT * FROM major";

$result = $con->query($sql);

echo "<select name='major' id='major' class='form-control'>
<option selected value='10'>Select Major</option>";

while ($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['major_id'] . "'>" . $row['major_name'] . "</option>";
}

echo "</select>";


// echo $result->rowCount();

// echo "
// <pre>";
// print_r($majors);