<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AMDABIDSS Health Recommendation System</title>
    <meta name="description" content="Recommendation System for Covid-19">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/logo-b.png">

    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/jqvmap/dist/jqvmap.min.css">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat">

    <link rel="stylesheet" href="<?=base_url()?>/assets/vendors/chosen/chosen.min.css">

    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/map-icons-master/dist/css/map-icons.min.css"> -->

    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>/assets/css/sweetalert2.min.css">
</head>

<body style=" font-family: 'Montserrat' !important;font-size: 22px !important;">


    <!-- Left Panel -->

    <!-- <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="" href="./dashboard"><img src="<?=base_url()?>/assets/images/logo.png" alt="Logo" style="width:50%"></a>     
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="./newschedule"> <i class="menu-icon fa fa-dashboard"></i>Set Schedule</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside> -->
    <!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-9">
                    <!-- <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a> -->
                    <a href="./dashboard">
                        <img  class="pull-left col-1" src="<?=base_url()?>/assets/images/logo.png" alt="Logo" style="width:70%"><h2><strong style="color:yellow;text-shadow:2px 2px black">AMDABIDSS Health</strong> Recommendation System</h2>
                    </a>     
                    
                </div>

                <div class="col-sm-3">
                    <div class="user-area dropdown loat-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?=base_url()?>/assets/images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="<?=base_url()?>/Main_C/logout" ><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->