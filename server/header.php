<?php
include 'server/server.php';
// set session
session_start();

if (!isset($_SESSION['email'])){
	header ('location: index.php');
} else {
	// set session for sessioned data
	$email = $_SESSION['email'];
}

// fetch out data for sessioned user
$qry="SELECT * FROM admin WHERE email='".$email."' LIMIT 1";
$qrycheck=$conn->query($qry);
if ($qrycheck->num_rows > 0){
    while($fetch = $qrycheck->fetch_assoc()){
        $fullname = $fetch['fullname'];
        $email = $fetch['email'];
        $last_log_date = $fetch['last_log_date'];

    }
} else {
    echo "No user data found";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script lang="javascript" type="text/javascript">
        window.history.forward();
    </script>
    <link rel="shortcut icon" href="../assets/image/favicon.png" type="image/x-icon">
    <meta name="description" content="">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="">
    <meta property="twitter:site" content="">
    <meta property="twitter:creator" content="">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="">
    <meta property="og:site_name" content="">
    <meta property="og:title" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">
    <title>CBT | Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="./assets/admin/css/main.css">
    <link rel="stylesheet" type="text/css" href="./assets/admin/css/paginate.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/css/animation.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/frontend/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="./assets/admin/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/admin/css/sweet-alert.css">
    <link href="./assets/admin/js/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="./assets/admin/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./assets/admin/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/admin/fileInput/bootstrap-fileinput.css">
    <link rel="stylesheet" href="./assets/admin/css/morris.css">
    <script lang="javascript" type="text/javascript">
    document.onkeydown = function (e) {
        if(event.keyCode == 116){
          event.preventDefault();
        }
        
        // if(event.keyCode = 123){
        //     return false;
        // }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
            return false;
        }
        if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
            return false;
        }
    }
 </script>

</head>
<body oncontextmenu="return false;" class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="Dashboard">GSS CBT </a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="Profile"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="Logout">
                        <i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
