<div class="wrapper" data-ng-init="getLedgers()">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
            Ledgers
            <span class="tools pull-right">
                <a href="javascript:;" class="fa fa-chevron-down"></a>
                <a href="javascript:;" class="fa fa-times"></a>
             </span>
        </header>
        <div class="panel-body">
        <div class="adv-table">
        <div class="clearfix">
                    <div class="btn-group">
                        <a href="#/create_ledger" id="editable-sample_new" class="btn btn-primary">
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
            <th>Mobile No.</th>
            <th>City</th>
            <th>Opening Balance</th>
            <th>Type</th>
            <th class="hidden-phone">View Profile</th>
            <th class="hidden-phone">Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr class="gradeX" ng-repeat="ledger in ledgers">
            <td>{{ledger.name}}</td>
            <td>{{ledger.mobile_no}}</td>
            <td>{{ledger.city}}</td>
            <td>{{ledger.opening_bal}}</td>
            <td>{{ledger.type}}</td>
            <td class="center hidden-phone"><a href="#/view_ledger" ng-click="setSelectedLedger(ledger);">View Profile <span class="fa fa-book"></span></a></td>
            <td class="center hidden-phone" ng-click="deleteLedger(ledger);"><a>Delete <span class="fa fa-trash-o"></span></a></td>
        </tr>
        </tfoot>
        </table>
        </div>
        </div>
        </section>
        </div>
        </div>
        </div>