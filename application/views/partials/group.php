<div class="wrapper" data-ng-init="getGroups()">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                    Groups
                    <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                     </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <div class="clearfix">
                            <div class="btn-group">
                                <a href="#create_group" data-toggle="modal" id="editable-sample_new" class="btn btn-primary">
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
                                    <th>Under Group</th>
                                    <th class="hidden-phone">Edit</th>
                                    <th class="hidden-phone">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeX" ng-repeat="group in groups">
                                    <td>{{group.name}}</td>
                                    <td>{{group.group}}</td>
                                    <td class="center hidden-phone"><a href="#update_group" data-toggle="modal" ng-click="">Edit <span class="fa fa-book"></span></a></td>
                                    <td class="center hidden-phone" ng-click="deleteGroup(group, $index);"><a>Delete <span class="fa fa-trash-o"></span></a></td>
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
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="create_group" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Group</h4>
            </div>
            <div class="modal-body">
                <div class="form">
                    <form class="cmxform form-horizontal adminex-form" id="ledgerform"  method="get" action="">
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Name (required)</label>
                            <div class="col-lg-4">
                                <input class=" form-control" id="cname" name="name" minlength="2" type="text" required />
                            </div>
                            <label for="cname" class="control-label col-lg-2">Group (required)</label>
                            <div class="col-lg-4">
                                <select class=" form-control" id="cname" name="name" minlength="2" type="text" required >
                                    <option value="">--SELECT--</option>
                                    <option value="Bank Accounts">Bank Accounts</option>
                                    <option value="Capital Accounts">Capital Accounts</option>   
                                    <option value="Cash-in-hand">Cash-in-hand</option>   
                                    <option value="Current Assets">Current Assets</option>
                                    <option value="Current Liabilities">Current Liabilities</option>
                                    <option value="Deposits(Asset)">Deposits(Asset)</option>
                                    <option value="Fixed Assets">Fixed Assets</option>
                                    <option value="Direct Expenses">Direct Expenses</option>
                                    <option value="Direct Incomes">Direct Incomes</option>
                                    <option value="Indirect Expenses">Indirect Expenses</option>
                                    <option value="Indirect Incomes">Indirect Incomes</option>  
                                    <option value="Purchase Accounts">Purchase Accounts</option>
                                    <option value="Sales Accounts">Sales Accounts</option>
                                    <option value="Stock-in-hand">Stock-in-hand</option>
                                    <option value="Sundry Creditors">Sundry Creditors</option>
                                    <option value="Sundry Debtors">Sundry Debtors</option>
                                </select>                                       
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        </div>

        <table  class="display table table-bordered table-striped" id="dynamic-table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Under Group</th>
            <th class="hidden-phone">Edit</th>
            <th class="hidden-phone">Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr class="gradeX" ng-repeat="group in groups">
            <td>{{group.name}}</td>
            <td>{{group.group}}</td>
            <td class="center hidden-phone"><a href="#update_group" data-toggle="modal" ng-click="setSelectedGroup(group);">Edit <span class="fa fa-book"></span></a></td>
            <td class="center hidden-phone" ng-click="deleteGroup(group, $index);"><a>Delete <span class="fa fa-trash-o"></span></a></td>
        </tr>
        </tfoot>
        </table>
        </div>
        </div>
        </section>
        </div>
        </div>
        </div>
        <!-- Modal -->
    <!-- Update Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="update_group" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Update Group</h4>
                </div>
                <div class="modal-body">
                    <form class="cmxform form-horizontal adminex-form" ng-submit="updateGroup();" method="get" action="">
                        <div class="form-group ">
                            <label for="cname" class="control-label col-lg-2">Name (required)</label>
                            <div class="col-lg-4">
                                <input class=" form-control" ng-model="selectedGroup.name"  minlength="2" type="text" required />
                            </div>
                            <label for="cname" class="control-label col-lg-2">Group (required)</label>
                            <div class="col-lg-4">
                                <select class=" form-control" ng-model="selectedGroup.group" minlength="2" type="text" required >
                                    <option value="">--SELECT--</option>
                                    <option value="Bank Accounts">Bank Accounts</option>
                                    <option value="Capital Accounts">Capital Accounts</option>   
                                    <option value="Cash-in-hand">Cash-in-hand</option>   
                                    <option value="Current Assets">Current Assets</option>
                                    <option value="Current Liabilities">Current Liabilities</option>
                                    <option value="Deposits(Asset)">Deposits(Asset)</option>
                                    <option value="Fixed Assets">Fixed Assets</option>
                                    <option value="Direct Expenses">Direct Expenses</option>
                                    <option value="Direct Incomes">Direct Incomes</option>
                                    <option value="Indirect Expenses">Indirect Expenses</option>
                                    <option value="Indirect Incomes">Indirect Incomes</option>  
                                    <option value="Purchase Accounts">Purchase Accounts</option>
                                    <option value="Sales Accounts">Sales Accounts</option>
                                    <option value="Stock-in-hand">Stock-in-hand</option>
                                    <option value="Sundry Creditors">Sundry Creditors</option>
                                    <option value="Sundry Debtors">Sundry Debtors</option>
                                </select>                                       
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