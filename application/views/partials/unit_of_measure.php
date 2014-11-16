<div class="wrapper" ng-init="getAllUnits();">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Units Of Measure
                    <span class="tools pull-right">
                        
                     </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <div class="clearfix">
                            <div class="btn-group">
                                <a href="#create_unit" data-toggle="modal" id="editable-sample_new" class="btn btn-primary">
                                    Add New <i class="fa fa-plus"></i>
                                </a>
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
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th class="hidden-phone">Edit</th>
                                    <th class="hidden-phone">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeX" ng-repeat="group in units">
                                    <td>{{group.name}}</td>
                                    <td class="center hidden-phone"><a href="#update_unit" data-toggle="modal" ng-click="setSelectedUnit(group, $index);">Edit <span class="fa fa-book"></span></a></td>
                                    <td class="center hidden-phone"><a href="javascript:void(0);" ng-click="deleteUnit(group, $index);">Delete <span class="fa fa-trash-o"></span></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="create_unit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Unit</h4>
            </div>
            <div class="modal-body">
                <div class="form">
                    <form class="cmxform form-horizontal adminex-form" id="ledgerform"  method="get" ng-submit="createUnit();">
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Name (required)</label>
                            <div class="col-lg-10">
                                <input class=" form-control" minlength="2" type="text" required ng-model="selectedUnit.name"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        </div>
        </div>
        </div>
        <!-- Modal -->
    <!-- Update Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="update_unit" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Unit</h4>
                </div>
                <div class="modal-body">
                    <form class="cmxform form-horizontal adminex-form" ng-submit="updateUnit();" method="get" action="">
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Name (required)</label>
                            <div class="col-lg-10">
                                <input class=" form-control" ng-model="selectedUnit.name"  minlength="2" type="text" required />
                            </div>
                            <br><br>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
<!-- Update Modal -->