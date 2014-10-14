    <!-- left side start-->
    <?php include 'leftmenu.php';?>
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" >
        <!-- header section start-->
        <?php include 'header.php'; ?>
        <!-- header section end-->
        <!--body wrapper start-->
        <div class="wrapper">
             <div class="row">
                <div class="col-sm-12">
                <section class="panel">
                <header class="panel-heading">
                    Cities
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                <div class="adv-table editable-table ">
                <div class="clearfix">
                    <div class="btn-group">
                        <button id="editable-sample_new" class="btn btn-primary">
                            Add New <i class="fa fa-plus"></i>
                        </button>
                    </div>
                    <div class="btn-group pull-right">
                        <!-- <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                        </ul> -->
                    </div>
                </div>
                <div class="space15"></div>
                <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach($cities as $city) : ?>
                        <tr class="">
                            <td><?php echo $city['id']?></td>
                            <td><?php echo $city['name']?></td>
                            <td><?php echo $city['state']?></td>
                            <td><a class="edit" href="javascript:;">Edit</a></td>
                            <td><a class="delete" href="javascript:;">Delete</a></td>
                        </tr>
                <?php endforeach; ?>                
                </tbody>
                </table>
                </div>
                </div>
                </section>
                </div>
                </div>
        </div>
        <!--body wrapper end-->
    <!--data table-->    
    <!--footer section start-->
    <?php include 'footer.php';?>
    <script type="text/javascript" src="<?php echo base_url();?>js/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/data-tables/DT_bootstrap.js"></script>
    <!--script for editable table-->
    <script>
        var selectedstate = "";
        var select = "<select  class='state  form-control'><option value=''>Select State</option>";
        <?php foreach($states as $state) : ?>
        select = select + "<option value='<?php echo $state['name']?>'><?php echo $state['name']?></option>";
        <?php endforeach; ?>
        select = select + "</select>";
        jQuery(document).ready(function() {
            $(document).on('change', '.state',function(){
                selectedstate =  $(this).val();
            });
        });
    </script>
    <script src="<?php echo base_url();?>js/editable-table-city.js"></script>
    <!-- END JAVASCRIPTS -->
    <script>
        jQuery(document).ready(function() {
            EditableTable.init();
        });
    </script>
</html>