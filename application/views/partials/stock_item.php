<div class="wrapper" data-ng-init="getStockItems()">
        <div class="row">
        <div class="col-sm-12">
        <section class="panel">
        <header class="panel-heading">
           Stock Items
            <span class="tools pull-right">
                
             </span>
        </header>
        <div class="panel-body">
        <div class="adv-table">
        <div class="clearfix">
                    <div class="btn-group">
                        <a href="#/create_sitem" id="editable-sample_new" class="btn btn-primary">
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
            <th>Stock Group</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th>Value</th>
            <th class="hidden-phone">View Item</th>
            <th class="hidden-phone">Delete</th>
        </tr>
        </thead>
        <tbody>
        <tr class="gradeX" ng-repeat="ledger in stock_items">
            <td>{{ledger.name}}</td>
            <td>{{ledger.group_id}}</td>
            <td>{{ledger.quantity}}</td>
            <td>{{ledger.rate}}</td>
            <td>{{ledger.value}}</td>
            <td class="center hidden-phone"><a href="#/view_sitem" ng-click="setSelectedSitem(ledger);">View Item <span class="fa fa-book"></span></a></td>
            <td class="center hidden-phone" ng-click="deleteSitem(ledger, $index);"><a>Delete <span class="fa fa-trash-o"></span></a></td>
        </tr>
        </tfoot>
        </table>
        </div>
        </div>
        </section>
        </div>
        </div>
        </div>