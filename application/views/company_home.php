<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>AdminX</title>

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

<body class="sticky-header" ng-controller="mainController">

<section>
    <!-- left side start-->
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
                   
                    <div class="media-body">
                        <h4 ng-bind="company.company_name"></h4>
                        <span>"Hello There..."</span>
                    </div>
                </div>

                <h5 class="left-nav-title">Account Information</h5>
                <ul class="nav nav-pills nav-stacked custom-nav">
                  <li><a href="#/company_profile"><i class="fa fa-user"></i> <span>Company Profile</span></a></li>
                  <li><a href="#myModal" data-toggle="modal"> <i class="fa fa-cog"></i> <span>Change Password</span></a></li>
                  <li><a href="<?php echo base_url();?>logins/logout"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
                </ul>
            </div>

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">    
                </li>
                <li><a href="#/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>                
            </li>

                <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>Accounts Info</span></a>
                    <ul class="sub-menu-list">
                        <li ><a href="#/group"> Groups</a></li>
                        <li ><a href="#/ledger"> Ledgers</a></li>
                    </ul>
                </li>
                
               

                

                <li class="menu-list"><a href=""><i class="fa fa-book"></i> <span> Inventory Info</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="#/stock_group"> Stock Groups</a></li>
                        <li><a href="#/stock_item"> Stock Items</a></li>
                        <li><a href="#/unit_of_measure"> Units of Measure</a></li>
                    </ul>
                </li>

                <li class="menu-list"><a href=""><i class="fa fa-edit"></i> <span> Accounting Vouchers</span></a>
                    <ul class="sub-menu-list">
                    	<li><a href="#/sale"> Sale</a></li>
                    	<li><a href="#/purchase"> Purchase</a></li>
                        <li><a href="#"> Contra</a></li>
                        <li><a href="#"> Payment</a></li>
                        <li><a href="#"> Receipt</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href=""><i class="fa fa-tag"></i> <span> Inventory Vouchers</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="#"> Stock Journal</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href="#"><i class="fa fa-list-alt"></i> <span> Display</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="#"> Trial Balance</a></li>
                        <li><a href="#"> Day Book</a></li>
                        <li><a href="#"> Account Books</a></li>
                        <li><a href="#"> Inventory Books</a></li>
                    </ul>
                </li> 
                <li><a href="#"><i class="fa fa-sign-in"></i> <span>Login Page</span></a></li>
            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--toggle button start-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->

            <!--search start-->
           
            <!--search end-->

            <!--notification menu start -->
            <div class="menu-right">
                <ul class="notification-menu">

                    
                    <li>
                        <a href="" class="btn btn-default dropdown-toggle" data-toggle="dropdown" ng-bind="company.company_name">
                           
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="#/company_profile"><i class="fa fa-user"></i> Company Profile</a></li>
                           <li><a href="#myModal" data-toggle="modal"><i class="fa fa-cog"></i> Change Password</a></li>
                            <li><a href="<?php echo base_url();?>logins/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!--notification menu end -->
     
        </div>
        <!-- header section end-->


        <div class="wrapper" ui-view></div>
        

        <!--footer section start-->
        <footer>
            2014 &copy; AdminEx by ThemeBucket
        </footer>
        <!--footer section end-->


    </div>
    <!-- main content end-->
    <!-- Modal -->
       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Change Password ?</h4>
                    </div>
                    <div class="modal-body">
                    
                        <input type="password" name="email" placeholder="Enter your current password" autocomplete="off" class="form-control placeholder-no-fix">
                        <br>
                        <input type="password" name="email" placeholder="Enter your new password" autocomplete="off" class="form-control placeholder-no-fix">
                        <br>
                        <input type="password" name="email" placeholder="Confirm your new password" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-primary" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->
    <!-- modal -->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>js/angular/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo base_url();?>js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-typeahead.js"></script>
<script src="<?php echo base_url();?>js/modernizr.min.js"></script>
<script src="<?php echo base_url();?>js/jquery.nicescroll.js"></script>
<!--easy pie chart-->
<script src="<?php echo base_url();?>js/easypiechart/jquery.easypiechart.js"></script>
<script src="<?php echo base_url();?>js/easypiechart/easypiechart-init.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo base_url();?>js/sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url();?>js/sparkline/sparkline-init.js"></script>

<!--icheck -->
<script src="<?php echo base_url();?>js/iCheck/jquery.icheck.js"></script>
<script src="<?php echo base_url();?>js/icheck-init.js"></script>

<script src="<?php echo base_url();?>js/scripts.js"></script>

<!-- jQuery Flot Chart -->
<script src="<?php echo base_url();?>js/flot-chart/jquery.flot.js"></script> 
<script src="<?php echo base_url();?>js/flot-chart/jquery.flot.tooltip.js"></script>
<script src="<?php echo base_url();?>js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo base_url();?>js/flot-chart/jquery.flot.pie.resize.js"></script>
<script src="<?php echo base_url();?>js/flot-chart/jquery.flot.selection.js"></script>
<script src="<?php echo base_url();?>js/flot-chart/jquery.flot.stack.js"></script>
<script src="<?php echo base_url();?>js/flot-chart/jquery.flot.time.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>js/advanced-datatable/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/data-tables/DT_bootstrap.js"></script>
<script src="<?php echo base_url();?>js/dynamic_table_init.js"></script>
<!--common scripts for all pages-->


<script src="<?php echo base_url();?>js/angular/lib/angular/angular.js"></script>
//<script src="<?php echo base_url();?>js/angular/ang/angular-ui-router.js"></script>
<script src="<?php echo base_url();?>js/angular/ang/ui-utils.min.js"></script>
//<script src="<?php echo base_url();?>js/angular/ang/app.js"></script>
<script src="<?php echo base_url();?>js/angular/ang//directives.js"></script>
<script src="<?php echo base_url();?>js/angular/ang/services.js"></script>
<script src="<?php echo base_url();?>js/angular/ang/controllers.js"></script>
<script src="<?php echo base_url();?>js/angular/ang/filters.js"></script>  


<script src="<?php echo base_url();?>js/main-chart.js"></script>

</body>
</html>
