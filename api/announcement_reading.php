<?php
include_once '../api/dbinfo.php';
// SQLquery to fetch data for TODAY update POST
$sqltoday = "SELECT announcement.announcement_id, announcement.title, announcement.description, announcement.create_date, major.major_name, user.name ,user.user_id
        FROM announcement 
        INNER JOIN major ON announcement.major_id = major.major_id
        INNER JOIN user ON announcement.user_id = user.user_id
        WHERE DATE(announcement.create_date) = CURRENT_DATE
        ORDER BY announcement.create_date DESC";

$result = $con->query($sqltoday);

// if there is today post, return those post

if ($result->num_rows > 0) {
    echo "<div class='row'>
                <div class='col-12 col-md-12 col-lg-11 p-1 mb-0 '>
                    <div class='d-flex justify-content-center pb-0'>
                        <span class='border-bottom p-1 fs-5'>Today Post</span>
                    </div>
                </div>
            </div>";
    while ($item = $result->fetch_assoc()) {
        echo "<div class='row p-1 mt-0'>
        <div class='p-1'>
        <div class='col-12 col-md-12 col-lg-11 p-2 shadowBox mb-1 today_post'>
        <div class='d-flex justify-content-between pb-2'>
            <h4>" . $item['title'] . "</h4>
            <span class='text-end text-secondary flex-grow-1'>" . $item['major_name'] . "</span>
        </div>
        <div class='p-2'>" . $item['description'] . "</div>
        <div class='pt-2'></div>
        <div class='text-right pt-2 d-flex justify-content-end align-items-center'>
                            <div class='d-flex flex-column text-end'>
                                <div class='small-text'>Written By " . $item['name'] . "</div>
                                <div class='small-text' id='post_date'>" . $item['create_date'] . "</div>
                            </div>";
        if ($item['user_id'] == $_SESSION['user_id']) {
            echo  "<a href='../api/announcement_deletion.php?id=" . $item['announcement_id'] . "' class='m-2 ms-3 me-2 text-danger'><i class='fa-solid fa-trash'></i></a>";
        }
        echo "   </div>
        </div></div>
    </div>";
    }
}
// SQLquery to fetch data for previous with is not Today update POST

$sqltoday = "SELECT announcement.announcement_id, announcement.title, announcement.description, announcement.create_date, major.major_name, user.name ,user.user_id
        FROM announcement 
        INNER JOIN major ON announcement.major_id = major.major_id
        INNER JOIN user ON announcement.user_id = user.user_id
        WHERE NOT DATE(announcement.create_date) = CURRENT_DATE
        ORDER BY announcement.create_date DESC";

$result = $con->query($sqltoday);

echo "<div class='row'>
                <div class='col-12 col-md-12 col-lg-11 p-1 shadow-md mb-0'>
                    <div class='d-flex justify-content-center pb-0'>
                        <span class='border-bottom p-1 fs-5'>Previous Post</span>
                    </div>
                </div>
            </div>";
while ($item = $result->fetch_assoc()) {
    echo "<div class='row p-1'>
        <div class='p-1'>
        <div class='col-12 col-md-12 col-lg-11 p-2 shadowBox mb-1 '>
            <div class='d-flex justify-content-between pb-2'>
                <h4>" . $item['title'] . "</h4>
                <span style='color: grey;'>" . $item['major_name'] . "</span>
            </div>
            <div class='p-2'>" . $item['description'] . "</div>
            <div class='pt-2'></div>
            <div class='text-right pt-2 d-flex justify-content-end align-items-center'>
                            <div class='d-flex flex-column text-end'>
                                <div class='small-text'>Written By " . $item['name'] . "</div>
                                <div class='small-text' id='post_date'>" . $item['create_date'] . "</div>
                            </div>";
    if ($item['user_id'] == $_SESSION['user_id']) {
        echo  "<a href='../api/announcement_deletion.php?id=" . $item['announcement_id'] . "' class='m-2 ms-3 me-2 text-danger'><i class='fa-solid fa-trash'></i></a>";
    }
    echo "   </div>
        </div></div>
    </div>";
}

$result->close();
$con->close();
