<div class="header-section">

    <!--toggle button start-->
    <a class="toggle-btn"><i class="fa fa-bars"></i></a>
    <!--toggle button end-->

    <!--search start-->
    <!-- <form class="searchform" action="index.html" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
    </form> -->
    <!--search end-->

    <!--notification menu start -->
    <div class="menu-right">
        <ul class="notification-menu">                  
            <li>
                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <img src="images/photos/user-avatar.png" alt="" />
                    <?php echo $this->session->userdata('username');?>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                    <!-- <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li> -->
                    <li><a data-toggle="modal" href="#myModal"><i class="fa fa-cog"></i>  Change Password</a></li>
                    <li><a href="<?php echo base_url();?>logins/logout"><i class="fa fa-sign-out"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!--notification menu end -->
</div>
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