<?php
include 'server/server.php';



$admissionNo = $_POST['admissionNo'];
$pass = $_POST['password'];
$last_log_date = date('Y-m-d H:i:s');

if ($pdo->auth_student($admissionNo, $pass) == 200) {
    echo 200;
};
