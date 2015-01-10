    <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
               
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Purchase
                           <i class="fa fa-print pull-right" ng-click="printPage();" style="cursor: pointer;"> Print </i>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal adminex-form" name="ledgerform" id="ledgerform" ng-submit="createVoucher('purchase');" method="post" action="">
                                    <div class="form-group ">
                                        <label class="control-label col-lg-2">Purchase Ledger</label>
                                        <div class="col-lg-4">
                                            <div class="form-control" custom-select ng-model="newVoucher.cr_acc" ng-options="ledger.name for ledger in creditorLedgers"></div>
                                            <span><p style="color:red" ng-if="!newVoucher.cr_acc.s_no">Please Select Purchase Account</p></span>
                                        </div>
                                         <label for="cname" class="control-label col-lg-2">Party's Account Name</label>
                                        <div class="col-lg-4">
                                            <div class="form-control" custom-select ng-model="newVoucher.dr_acc" ng-options="ledger.name for ledger in debitorLedgers"></div>
                                            <span><p style="color:red" ng-if="!newVoucher.dr_acc.s_no">Please Select  Party's Account Name</p></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Date</label>
                                        <div class="col-lg-4">
                                            <input class="form-control" type="text" name="voucherdate" readonly required ng-model="newVoucher.date" datepicker/>
                                            <span><p style="color:red" ng-if="ledgerform.voucherdate.$error.required">Please Select Date</p></span>
                                        </div>
                                        <label for="cname" class="control-label col-lg-2">Amount</label>
                                        <div class="col-lg-4">
                                            <input class="form-control" type="number" name="amount" ng-model="newVoucher.amount" required>
                                            <span><p style="color:red" ng-if="ledgerform.amount.$error.required">Please Enter Amount</p></span>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button ng-disabled="!newVoucher.cr_acc.s_no || !newVoucher.dr_acc.s_no" class="btn btn-primary" type="submit" ng-click="newVoucher.type='sale'">Create</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
           
            
        </div>
        <!--body wrapper end-->