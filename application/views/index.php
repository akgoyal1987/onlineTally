<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Login</title>

    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

<form class="form-signin" accept-charset="utf-8" method="post" action="<?php echo base_url();?>logins/signin">
        
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">Sign In</h1>
            <img src="<?php echo base_url();?>images/login-logo.png" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="email" class="form-control" placeholder="Email" autofocus name="email" required>
            <input type="password" class="form-control" placeholder="Password" name="password" required>

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                
            </label>

        </div>
</form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/modernizr.min.js"></script>

</body>
</html>
