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
<header class="app-header"><a class="app-header__logo" href="http://preview.thesoftking.com/thesoftking/ibanking/admin/dashboard">e-Banking </a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="profile.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="change.html"><i class="fa fa-key"></i>Change password</a></li>
                <li><a class="dropdown-item" href="http://preview.thesoftking.com/thesoftking/ibanking/admin/logout"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                <form id="logout-form" action="http://preview.thesoftking.com/thesoftking/ibanking/admin/logout" method="POST" style="display: none;">
                    <input type="hidden" name="_token" value="wOMyxnZDufM0GkBUYL4d4PDc09WYRlraGa6FI36e">                </form>

            </ul>
        </li>
    </ul>
</header>

<!-- Sidebar menu-->
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="" >
        <div>
            <p style="margin-left: 20px;" class="app-sidebar__user-name">admin</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/dashboard"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/branch"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">Branch</span></a></li>
        <li><a class="app-menu__item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/other/bank"><i class="app-menu__icon fa fa-university"></i><span class="app-menu__label">Other banks</span></a></li>


        <li class="treeview   ">
            <a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Settings</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/settings"><i class="icon fa fa-cog"></i> General Settings</a></li>
                <li> <a class="treeview-item  " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/charges"><i class="icon fa fa-money"></i>Charge Settings </a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/settings-email"><i class="icon icon fa fa-envelope"></i> Email Settings</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/settings-sms-api"><i class="icon icon fa fa-phone"></i> Sms api Settings</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/settings-facebook-api"><i class="icon fa fa-facebook"></i> Facebook api</a></li>
            </ul>
        </li>

        <li class="treeview ">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Deposit</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/deposits"><i class="icon fa fa-dollar"></i>Deposits</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/gateway"><i class="icon  fa fa-credit-card"></i> Payment Gateway</a></li>

            </ul>
        </li>
        <li class="treeview  ">
            <a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-rss"></i><span class="app-menu__label">Latest News</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/add-news"><i class="icon fa fa-plus"></i>Add new</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/latest-news"><i class="icon fa fa-circle-o"></i>View all</a></li>


            </ul>
        </li>


        <li class="treeview ">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">Transaction</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item  " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/Other-bank/transaction/request"><i class="icon fa fa-spinner"></i>Bank transaction request </a></li>
                <li>  <a class="treeview-item  " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/Other-bank/transaction/approved"><i class="icon fa fa-check"></i>Bank transaction Approved  </a></li>
                <li>  <a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/Other-bank/transaction/rejected"><i class="icon fa fa-times"></i> Bank transaction Rejected </a></li>


            </ul>
        </li>
        <li class="treeview ">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-money"></i><span class="app-menu__label">withdraw</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item  " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/withdraw/request"><i class="icon fa fa-spinner"></i>Withdraw request </a></li>
                <li>  <a class="treeview-item  " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/approve/withdraw"><i class="icon fa fa-check"></i> Approved Withdraw </a></li>
                <li>  <a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/rejected/withdraw"><i class="icon fa fa-times"></i> Rejected Withdraw </a></li>
                <li> <a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/wmethod"> <i class="icon fa fa-credit-card"></i> Withdraw Method</a></li>

            </ul>
        </li>
        <li class="treeview    " ><a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">User Management </span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/allUser"><i class="icon fa fa-desktop"></i>All User</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/verifiedUsers"><i class="icon fa fa-check-circle"></i>Verified Users</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/bannedUsers"><i class="icon fa fa-ban"></i>Banned Users</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/mobileUnverifiedUsers"><i class="icon fa fa-mobile"></i>Mobile Unverified</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/emailUnverifiedUsers"><i class="icon fa fa-envelope"></i>Email Unverified</a></li>
            </ul>
        </li>
        <li class="treeview ">
            <a class="app-menu__item " href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Interface Control</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/home-page"><i class="icon fa fa-home"></i>Home Page</a></li>

                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/logo"><i class="icon fa fa-picture-o"></i> Logo & Favicon </a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/social-icon"><i class="icon fa a fa-picture-o"></i>Social Icon</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/contacts"><i class="icon fa fa-compress"></i>Contact Information</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/breadcrumb"><i class="icon fa fa-picture-o"></i>Change Breadcrumb</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/subscribe-section"><i class="icon fa fa-cogs"></i>Subscribe Section</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/faq"><i class="icon fa fa-quora"></i>Faq</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/sliders"><i class="icon fa fa-image"></i>Sliders</a></li>
                <li><a class="treeview-item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/services"><i class="icon fa fa-bars"></i>Services</a></li>

            </ul>
        </li>



        <li><a class="app-menu__item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/subscribe"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label">Newsletter</span></a></li>
        <li><a class="app-menu__item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/all-ads"><i class="app-menu__icon app-menu__icon fa fa-picture-o"></i><span class="app-menu__label">Advertisement</span></a></li>
        <li><a class="app-menu__item " href="http://preview.thesoftking.com/thesoftking/ibanking/admin/language/manager"><i class="app-menu__icon fa fa-language"></i><span class="app-menu__label">Language</span></a></li>
        <li><a class="app-menu__item" href="http://preview.thesoftking.com/thesoftking/ibanking/admin/logout" onclick="event.preventDefault();
                       document.getElementById('logout').submit();">
                <i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a>
            <form id="logout" action="http://preview.thesoftking.com/thesoftking/ibanking/admin/logout" method="POST">
                <input type="hidden" name="_token" value="wOMyxnZDufM0GkBUYL4d4PDc09WYRlraGa6FI36e">            </form>
        </li>
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

                    <form action="http://preview.thesoftking.com/thesoftking/ibanking/admin/change/password" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="wOMyxnZDufM0GkBUYL4d4PDc09WYRlraGa6FI36e">
                        <div class="row">
                            <div class="form-group col-md-12">
                               <h5> <label for="exampleInputEmail1">Old password</label></h5>
                                <input class="form-control form-control-lg" type="password" name="old_password">
                            </div>
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
