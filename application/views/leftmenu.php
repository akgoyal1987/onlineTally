<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title><?php echo $pagename?></title>

  <!--icheck-->
  <link href="<?php echo base_url();?>js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
  <link href="<?php echo base_url();?>js/iCheck/skins/square/square.css" rel="stylesheet">
  <link href="<?php echo base_url();?>js/iCheck/skins/square/red.css" rel="stylesheet">
  <link href="<?php echo base_url();?>js/iCheck/skins/square/blue.css" rel="stylesheet">

  <!--dashboard calendar-->
  <link href="<?php echo base_url();?>css/clndr.css" rel="stylesheet">


  <!--common-->
  <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
  <link href="<?php echo base_url();?>css/style-responsive.css" rel="stylesheet">




  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="sticky-header">

<section>
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <a href="index.html"><img src="<?php echo base_url();?>images/logo.png" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="index.html"><img src="<?php echo base_url();?>images/logo_icon.png" alt=""></a>
    </div>
    <!--logo and iconic logo end-->

    <div class="left-side-inner">

        <!-- visible to small devices only -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">
            <div class="media logged-user">
                <img alt="" src="<?php echo base_url();?>images/photos/user-avatar.png" class="media-object">
                <div class="media-body">
                    <h4><a href="#">John Doe</a></h4>
                    <span>"Hello There..."</span>
                </div>
            </div>

            <h5 class="left-nav-title">Account Information</h5>
            <ul class="nav nav-pills nav-stacked custom-nav">
              <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
              <li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li <?php if($pagename=="Dashboard"){echo "class='active'";} ?>><a href="<?php echo base_url();?>logins/home"><i class="fa fa-home"></i> <span>Dashboard</span></a>                
            </li>
            <li <?php if($pagename=="States"){echo "class='active'";} ?>><a href="<?php echo base_url();?>states/"><i class="fa fa-home"></i> <span>States</span></a>                
            </li>
            <li <?php if($pagename=="Cities"){echo "class='active'";} ?>><a href="<?php echo base_url();?>cities/"><i class="fa fa-home"></i> <span>Cities</span></a>                
            </li>
            <li <?php if($pagename=="Locations"){echo "class='active'";} ?>><a href="<?php echo base_url();?>locations/"><i class="fa fa-home"></i> <span>Locations</span></a>                
            </li>
             <li <?php if($pagename=="Categories"){echo "class='active'";} ?>><a href="<?php echo base_url();?>category/"><i class="fa fa-home"></i> <span>Categories</span></a>                
            </li>
            <li <?php if($pagename=="Sub-Category"){echo "class='active'";} ?>><a href="<?php echo base_url();?>sub_category/"><i class="fa fa-home"></i> <span>Sub-Categories</span></a>                
            </li>

        
        
            <li class="menu-list" style="display:none;"><a href=""><i class="fa fa-file-text"></i> <span>Extra Pages</span></a>
                <ul class="sub-menu-list">
                    <li><a href="profile.html"> Profile</a></li>
                    <li><a href="invoice.html"> Invoice</a></li>
                    <li><a href="pricing_table.html"> Pricing Table</a></li>
                    <li><a href="timeline.html"> Timeline</a></li>
                    <li><a href="blog_list.html"> Blog List</a></li>
                    <li><a href="blog_details.html"> Blog Details</a></li>
                    <li><a href="directory.html"> Directory </a></li>
                    <li><a href="chat.html"> Chat </a></li>
                    <li><a href="404.html"> 404 Error</a></li>
                    <li><a href="500.html"> 500 Error</a></li>
                    <li><a href="registration.html"> Registration Page</a></li>
                    <li><a href="lock_screen.html"> Lockscreen </a></li>
                </ul>
            </li>
            <li><a href="login.html" style="display:none;"><i class="fa fa-sign-in"></i> <span>Login Page</span></a></li>

        </ul>
        <!--sidebar nav end-->

    </div>
</div>