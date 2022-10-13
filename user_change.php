<?php
// set session
session_start();
require 'server/server.php';

if (!isset($_SESSION['username'])){
	header ('location: index.php');
} else {
	// set session for sessioned data
	$username = $_SESSION['username'];
}

// fetch out data for sessioned user
$qry="SELECT * FROM students WHERE username='".$username."' LIMIT 1";
$qrycheck=$conn->query($qry);
if ($qrycheck->num_rows > 0){
    while($fetch = $qrycheck->fetch_assoc()){
        $fullname = $fetch['first_name']." ".$fetch['last_name'];
        $username=$fetch['username'];
        $email=$fetch['email'];

    }
} else {
    echo "No user data found";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="http://preview.thesoftking.com/thesoftking/ibanking/assets/image/favicon.png" type="image/x-icon">
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
    <title>ITFMS | Change Password</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/admin/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/admin/css/toastr.min.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="assets/admin/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/admin/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/admin/fileInput/bootstrap-fileinput.css">
    <link rel="stylesheet" href="assets/admin/css/morris.css">
    </head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="dashboard.php">ITFMS</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="user_profile.php"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="user_change.php"><i class="fa fa-key"></i>Change password</a></li>
                <li><a class="dropdown-item" href="logout">
                        <i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>

<!-- Sidebar menu-->
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="" >
        <div>
            <p style="margin-left: 20px;" class="app-sidebar__user-name">Student Dashboard</p>
        </div>
    </div>
    <ul class="app-menu">
    <?php include 'User_Aside.php'; ?>
    </ul>
</aside>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> Change Password</h1>
            </div>

        </div>
        <div class="row">

            <div class="col-md-12">

                <div class="tile">
                        <?php 
                        include 'server/server.php';
                                            
                        $User = $_SESSION['username'];
                        $Omang = "SELECT * FROM students WHERE username = '$User' ";
                        $OmangConn = $conn->query($Omang);
                            if($OmangConn->num_rows > 0){
                                while($i = $OmangConn->fetch_assoc()){
                        ?>
                    <form action="change_password" method="post" class="form-horizontal form-bordered" >
                        <input type="hidden" name="id" value="<?php echo $i['id']?>" >
                            <div class="form-group col-md-12">
                               <h5> <label for="exampleInputEmail1">New password</label></h5>
                                <input class="form-control form-control-lg" type="password" name="new_password">
                            </div>
                            <div class="form-group col-md-12">
                                <h5><label for="exampleInputEmail1">Confirm password</label></h5>
                                <input class="form-control form-control-lg" type="password" name="new_password_confirmation">
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" style="width: 100%!important;" type="submit">Update</button>
                        </div>
                    </form>
                    <?php }}?>
                </div>
            </div>
        </div>
    </main>






<!-- Essential javascripts for application to work-->
<script type="text/javascript" src="assets/admin/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="assets/admin/js/popper.min.js"></script>
<script type="text/javascript" src="assets/admin/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/admin/js/main.js"></script>
<!-- The javascript plugin to display page loading on top-->
<script type="text/javascript" src="assets/admin/js/plugins/pace.min.js"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="assets/admin/js/bootstrap-toggle.min.js"></script>
<script type="text/javascript" src="assets/admin/fileInput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="assets/admin/js/jscolor.js"></script>
<script type="text/javascript" src="assets/admin/js/toastr.min.js"></script>
<script type="text/javascript" src="assets/admin/js/chart.js"></script>

<script src="assets/admin/js/raphael-min.js"></script>
    <script src="assets/admin/js/morris.min.js"></script>

<script>
    $('#edit').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var title = button.data('mytitle');
        var description = button.data('mydescription');
        var cat_id = button.data('catid');
        var modal = $(this);
        modal.find('.modal-body #title').val(title);
        modal.find('.modal-body #des').val(description);
        modal.find('.modal-body #cat_id').val(cat_id);
    });

    $('#delete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var cat_id = button.data('catid');
        var modal = $(this);
        modal.find('.modal-body #cat_id').val(cat_id);
    });



</script>

</body>
</html>
