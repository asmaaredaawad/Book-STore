<?php
    session_start();
    // if(isset($_SESSION['user_id'])) {
    //     header('location:home.php');
    // }
?>
<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Book Store | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="assets/css/glDatePicker.default.css" rel="stylesheet" type="text/css">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> -->
    <link href="assets/metronic/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/metronic/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/metronic/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/metronic/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDssATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="assets/metronic/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/metronic/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="assets/metronic/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/metronic/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="assets/metronic/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="assets/metronic/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="assets/metronic/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/metronic/layouts/layout4/css/themes/light.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="assets/metronic/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/mystyle.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <!-- <link rel="shortcut icon" href="favicon.ico" /> </head> -->
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="#">
                <a class="logo-default" style="font-size: 18px;" /> Book Store </a></a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->

        <a href="" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
       
        <div class="page-top">
           
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                   
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <?php
                             if(!isset($_SESSION['user_id'])){
                            ?>
                            <a href="/store/login.php" style="display: inline-table; padding-top: 0px;">Login</a>
                            <a href="/store/register.php" style="display: inline-table;padding-top: 0px;">Register</a>
                            <?php }else{ ?>
                            <a href="/store/logout.php" style="display: inline-table;padding-top: 0px;">Logout</a>
                            <?php } ?>
                       
                    </li>
                   
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <?php
        if(isset($_SESSION['user_id'])){
    ?>
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
           
            <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item start active open">
                    <a href="" class="nav-link nav-toggle">
                        <i class="icon-home"></i>
                        <span class="title">Dashboard</span>
                        <span class="selected"></span>
                        <span class="arrow open"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item start active open">
                            <a href="" class="nav-link ">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Book Dashboard</span>
                                <span class="selected"></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="heading">
                    <h3 class="uppercase">Components</h3>
                </li>
               
                <li class="nav-item  ">
                    <a href="" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-book"></i>
                        <span class="title">Books</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="/store/list_book.php" class="nav-link ">
                                <span class="title">ALL</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="/store/add_book.php" class="nav-link ">
                                <span class="title">Add Book</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item  ">
                    <a href="" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-folder-open"></i>
                        <span class="title">Categories</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="/store/list_category.php" class="nav-link ">
                                <span class="title">ALL</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="/store/add_category.php" class="nav-link ">
                                <span class="title">Add Category</span>
                            </a>
                        </li>
                       
                    </ul>
                </li>
                <li class="nav-item ">
                    <a href="" class="nav-link nav-toggle">
                        <i class="glyphicon glyphicon-folder-open"></i>
                        <span class="title">Sub Category</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  ">
                            <a href="/store/list_subcategory.php" class="nav-link ">
                                <span class="title">ALL</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="/store/add_subcategory.php" class="nav-link ">
                                <span class="title">Add  Subcategory</span>
                            </a>
                        </li>
                    </ul>
                </li>
            
              
            </ul>
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
    </div>

    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-head">
                <div class="page-title">
                    <h1>Dashboard
                        <small>dashboard & statistics</small>
                    </h1>
                </div>
               
                <div class="page-toolbar">
                    <div id="dashboard-report-range" class="pull-right tooltips btn btn-fit-height green" data-placement="top" data-original-title="Change dashboard date range">
                        <i class="icon-calendar"></i>&nbsp;
                        <span class="thin uppercase hidden-xs"></span>&nbsp;
                        <i class="fa fa-angle-down"></i>
                    </div>
                    
                </div>
            </div>
           
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span class="active">Dashboard</span>
                </li>
            </ul>
<?php } ?>
