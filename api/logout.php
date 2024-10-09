<?php
// if logout, destroy session and head to index page
session_start();

session_destroy();

header('Location: ../index.php');
exit;
