<div class="wrapper" ng-init="getTrialBalance();">
    <div class="row">
        <div class="col-sm-12">
            <section class="panel">
                <header class="panel-heading">
                  {{selectedLedger.name}}
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
                                <tr class="gradeX" ng-repeat="voucher in selectedLedgerVouchers">
                                    <td> <a href="#/voucherDetail" ng-click="showVoucherDetail(voucher);" ng-bind="selectedLedger.s_no==voucher.cr_acc?getLedgerNameById(voucher.dr_acc):getLedgerNameById(voucher.cr_acc)"></a></td>
                                    <td ng-bind="selectedLedger.s_no==voucher.cr_acc?voucher.amount:0"></td>
                                    <td ng-bind="selectedLedger.s_no==voucher.dr_acc?voucher.amount:0"></td>
                                </tr>
                                <tr class="gradeX total">
                                    <td ng-bind="'Total'"></td>
                                    <td ng-bind="ledgerDebitTotal"></td>
                                    <td ng-bind="ledgerCreditTotal"></td>
                                </tr>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
