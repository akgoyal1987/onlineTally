    <!--body wrapper start-->
        <div class="wrapper" ng-init="getLedgers();getStockItems();">
            <div class="row">
               
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sale
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal adminex-form" id="ledgerform" ng-submit="createVoucher();" method="get" action="">
                                    <div class="form-group ">
                                        <label class="control-label col-lg-2">Credit Account</label>
                                        <div class="col-lg-4">
                                            <!-- <div custom-select ng-model="newVoucher.cr_acc" ng-options="ledger.name for ledger in ledgers"></div> -->
                                            <input type="text" typeahead ng-model="newVoucher.cr_acc">
                                            <!-- <input list="_ledgers" class="form-control" ng-model="newVoucher.cr_acc"/>
                                            <datalist id="_ledgers">
                                                <option ng-repeat="ledger in ledgers" value="{{ledger.name}}"/>
                                            </datalist>    -->                                       
                                            <!-- <select ng-options="ledger.name for ledger in ledgers" class="form-control" ng-model="newVoucher.cr_acc" required>
                                                <option value="" selected>--SELECT--</option>
                                            </select> -->
                                        </div>
                                         <label for="cname" class="control-label col-lg-2">Debit Account</label>
                                        <div class="col-lg-4">
                                            <select class="form-control" ng-options="ledger.name for ledger in ledgers" required  ng-model="newVoucher.dr_acc">
                                                <option value="" selected>--SELECT--</option>
                                            </select>      
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Date</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" type="text" required ng-model="newVoucher.date" datepicker/>                                                
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="gradeX" ng-repeat="v in voucherEntries">
                                                <td>
                                                    <select ng-options="item.name for item in stock_items" class="form-control" ng-model="v.item_id" required >
                                                        <option value="" selected>Select Item</option>
                                                    </select>
                                                </td>
                                                <td><input type="number" ng-model="v.quantity"  ng-change="setValue(v);" class="form-control" placeholder="Quantity" required/></td>
                                                <td><input type="number" ng-model="v.rate" ng-change="setValue(v);" class="form-control" placeholder="Rate" required/></td>
                                                <td><input type="number" ng-model="v.value" class="form-control" placeholder="Value" required/></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit" ng-click="newVoucher.type='sale'">Create</button>
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
        <style>
            .custom-select {
                position: relative;
                display: inline-block;
                vertical-align: middle;
                font-size: 13px;
                zoom: 1;
                *display: inline;
                width: 220px;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            .custom-select.small {
                width: 104px;
            }
            .custom-select.medium {
                width: 164px;
            }
            .custom-select.large {
                width: 300px;
            }
            .custom-select.xlarge {
                width: 380px;
            }
            .custom-select > select {
                display: none !important;
            }
            .custom-select > a.dropdown-toggle {
                border-radius: 0;
                line-height: 28px;
                box-shadow: none;
                background: #ffffff;
                position: relative;
                display: block;
                overflow: hidden;
                padding: 0 0 0 8px;
                border: 1px solid #aaa;
                text-decoration: none;
                white-space: nowrap;
                cursor: pointer;
                color: #888;
                width: 100%;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                height: 30px;
            }
            .custom-select > a.dropdown-toggle.disabled,
            .custom-select > a.dropdown-toggle.disabled:hover {
                cursor: not-allowed;
                color: #aaa;
                background: #eee;
            }
            .custom-select > a.dropdown-toggle:hover, 
            .custom-select.open > a.dropdown-toggle {
                color: #333;
            }
            .custom-select.open > a.dropdown-toggle {
                border-bottom: 0;
                line-height: 29px;
            }
            .control-group.error .custom-select > a.dropdown-toggle {
                border-color: #f09784;
                color: #d68273;
            }
            .custom-select > a.dropdown-toggle > span {
                display: block;
                overflow: hidden;
                margin-right: 26px;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .custom-select > a.dropdown-toggle > b {
                position: absolute;
                top: 0;
                right: 0;
                display: block;
                width: 18px;
                height: 100%;
            }
            .custom-select > a.dropdown-toggle > b:before {
                content: "\f0d7";
                display: inline-block;
                font-family: FontAwesome;
                font-size: 12px;
                position: relative;
                top: -1px;
                left: 1px;
            }
            .custom-select.open > a.dropdown-toggle > b:before {
                content: "\f0d8";
            }
            .custom-select > .dropdown-menu {
                margin-top: 0;
                border-color: #aaa;
                border-top: 0;
                padding-bottom: 0;
                width: auto;
                min-width: 100%;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                border-radius: 0;
            }
            .custom-select > .dropdown-menu > .custom-select-search {
                position: relative;
                z-index: 1010;
                margin: 0;
                padding: 0 4px;
                white-space: nowrap;
            }
            .custom-select > .dropdown-menu > .custom-select-search > input {
                width: 100%;
                height: 30px;
                margin: 0;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 4px 20px 4px 5px;
                border-radius: 0;
            }
            .custom-select > .dropdown-menu > .custom-select-search:after {
                content: "\f002";
                display: inline-block;
                color: #888;
                font-family: FontAwesome;
                font-size: 14px;
                position: absolute;
                top: 4px;
                right: 10px;
            }
            .custom-select > .dropdown-menu > ul {
                border-color: #aaa;
                border-top: 0;
                margin: 4px 0;
                padding: 0;
                list-style: none;
                background-color: #fff;
                overflow-x: hidden;
                overflow-y: auto;
                max-height: 240px;
                padding-right: 14px;
            }
            .custom-select > .dropdown-menu > ul > li > a {
                font-size: 13px;
                margin-bottom: 1px;
                margin-top: 1px;
                display: block;
                padding: 3px 8px;
                clear: both;
                font-weight: normal;
                line-height: 20px;
                color: #333;
                cursor: pointer;
                width: 100%;
            }
            .custom-select > .dropdown-menu > ul > li > a:hover, 
            .custom-select > .dropdown-menu > ul > li > a:focus {
                color: #fff;
                text-decoration: none;
                background-repeat: repeat-x;
            }
            .custom-select > .dropdown-menu > ul > li > a:hover {
                background: #4f99c6;
            }
            .custom-select > .dropdown-menu > ul > li > a:focus {
                background: #2283c5;
            }
            .custom-select > .dropdown-menu > ul > li.empty-result > em {
                text-align: center;
                padding: 4px 8px;
                display: block;
            }
            .custom-select > .dropdown-menu > .custom-select-action > button {
                border-radius: 0;
                background-image: none;
            }
        </style>