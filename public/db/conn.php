<?php

ob_start();
session_start();
date_default_timezone_set('Asia/Kolkata');
$current_date = date("d-m-Y");
$current_time = date("H:i:s");
$current_dt = date("d-m-Y H:i:s");

$connection = mysqli_connect('localhost', 'root', '', 'billing');

if(!$connection){
    alertBox("Database Not Connected");
}

if(isset($_SESSION['login_user_id'])){
    $login_user_id = $_SESSION['login_user_id'];
}else{
    header("location: login/login.php");
}

function alertBox($msg){
    echo "<script>alert('$msg');</script>";
}

?>