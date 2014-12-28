<div class="wrapper" ng-init="getTrialBalance();">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                  Trial Balance
                    <span class="tools pull-right">
                        
                    </span>
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <div class="clearfix">
                          
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
                                    <th>Particulars</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                 </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeX" ng-repeat="(key, value) in displayTrialBalance">
                                    <td><a href="javascript:void(0);" ng-click="showGroupSummery(value);" ng-bind="value.group.name;"></a></td>
                                    <td ng-bind="getDebitSum(value);"></td>
                                    <td ng-bind="getCreditSum(value);"></td>
                                </tr>
                                <tr class="gradeX" ng-repeat="ledger in displayLedgers">
                                    <td ng-bind="ledger.ledger.name;"></td>
                                    <td ng-bind="ledger.debit?ledger.debit:0"></td>
                                    <td ng-bind="ledger.credit?ledger.credit:0"></td>
                                </tr> 
                                <tr class="gradeX total" >
                                    <td ng-bind="'Total'"></td>
                                    <td ng-bind="trialbalancedebitsum"></td>
                                    <td ng-bind="trialbalancecreditsum"></td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
