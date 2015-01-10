    <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
               
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sale
                           <i class="fa fa-print pull-right" ng-click="printPage();" style="cursor: pointer;"> Print </i>
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal adminex-form" name="ledgerform" id="ledgerform" ng-submit="createVoucher('sale');" method="post" action="">
                                    <div class="form-group ">
                                        <label class="control-label col-lg-2">Sales Ledger</label>
                                        <div class="col-lg-4">
                                            <div class="form-control" custom-select ng-model="newVoucher.cr_acc" ng-options="ledger.name for ledger in creditorLedgers"></div>
                                            <span><p style="color:red" ng-if="!newVoucher.cr_acc.s_no">Please Select Sales Ledger</p></span>
                                        </div>
                                         <label for="cname" class="control-label col-lg-2">Party's Account Name</label>
                                        <div class="col-lg-4">
                                            <div class="form-control" custom-select ng-model="newVoucher.dr_acc" ng-options="ledger.name for ledger in debitorLedgers"></div>
                                            <span><p style="color:red" ng-if="!newVoucher.dr_acc.s_no">Please Select Party's Account Name</p></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Date</label>
                                        <div class="col-lg-4">
                                            <input class="form-control" type="text" name="voucherdate" readonly required ng-model="newVoucher.date" datepicker/>
                                            <span><p style="color:red" ng-if="ledgerform.voucherdate.$error.required">Please Select Date</p></span>
                                        </div>
                                        <div class="col-lg-6">
                                            <button type="button" class="btn btn-default pull-right" ng-click="addMoreItem();" >Add More Item</button>
                                        </div>
                                    </div>
                                    <table  class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th class="hidden-phone">Rate</th>
                                                <th class="hidden-phone">Value</th>
                                                <th class="hidden-phone"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="gradeX" ng-repeat="v in voucherEntries">
                                                <td width="150px">
                                                    <!-- <div class="form-control" custom-select ng-model="v.item_id" ng-options="item.name for item in stock_items"></div> -->
                                                    <select class="form-control" required ng-model="v.item_id" ng-options="item.name for item in stock_items">
                                                        <option value="">-- Select Product --</option>
                                                    </select>
                                                </td>
                                                <td><input type="number" ng-model="v.quantity"  ng-change="setValue(v);" class="form-control" placeholder="Quantity" required/></td>
                                                <td><input firstfill type="number" ng-model="v.rate" ng-change="setValue(v);" class="form-control" placeholder="Rate" required/></td>
                                                <td><input firstfill type="number" ng-model="v.value" class="form-control" placeholder="Value" required/></td>
                                                <td><button ng-if="$index!=0" class="btn btn-main" type="button" ng-click="voucherEntries.splice($index,1);">-</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
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