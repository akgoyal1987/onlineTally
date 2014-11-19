    <!--body wrapper start-->
        <div class="wrapper" ng-init="resetSelectedLedger();">
            <div class="row">
               
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Create Ledger
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal adminex-form" id="ledgerform" ng-submit="createLedger();" method="get" action="">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Name (required)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control" type="text" required ng-model="selectedLedger.name"/>
                                        </div>
                                         <label for="cname" class="control-label col-lg-2">Mobile No (required)</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" type="text" pattern="[0-9]{10}" title="For Ex.- 9074739352" required ng-model="selectedLedger.mobile_no"/>
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Group (required)</label>
                                        <div class="col-lg-4">
                                            <select class=" form-control" ng-model="selectedLedger.group_id" type="text" required>
                                             <option value="">--SELECT--</option>
                                             <option value="DR">DR</option>
                                             <option value="CR">CR</option>   
                                            </select>   
                                        </div>
                                        <label for="cname" class="control-label col-lg-2">State (required)</label>
                                        <div class="col-lg-4">
                                           <select ng-options="state.name for state in states| orderBy:'name'" class=" form-control" type="text" required ng-model="selectedLedger.state">
                                              <option value="" selected="">--SELECT--</option> 
                                            </select>      
                                        </div>
                                        
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">District (required)</label>
                                        <div class="col-lg-4">
                                            <select ng-options="district.name for district in getDistricts(selectedLedger.state) | orderBy:'name'" class=" form-control" type="text" required ng-model="selectedLedger.district">
                                             <option value="" selected>--SELECT--</option>
                                            </select>      
                                        </div>
                                        <label for="cname" class="control-label col-lg-2">City (required)</label>
                                        <div class="col-lg-4">
                                            <select class="form-control" type="text" required ng-model="selectedLedger.city">
                                                 <option value="">--SELECT--</option>
                                                 <option value="indore">indore</option>
                                            </select>                                       
                                         </div>
                                        
                                        
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Pincode (required)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control " pattern="[0-9]{6}" title="For Ex.- 452012" type="text" ng-model="selectedLedger.pin_code" required />
                                        </div>
                                        <label for="curl" class="control-label col-lg-2">E-Mail (optional)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control " ng-model="selectedLedger.email" type="email"  />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">User ID (required)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control "  type="text" ng-model="selectedLedger.user_id" required/>
                                        </div>
                                        <label for="curl" class="control-label col-lg-2">TIN No. (optional)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control "  type="text" ng-model="selectedLedger.tin_no" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Opening Balance (optional)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control " pattern="[0-9]+([\.][0-9]+)?" ng-model="selectedLedger.opening_balance" type="text"  />
                                        </div>
                                        <label for="curl" class="control-label col-lg-2">Type (optional)</label>
                                        <div class="col-lg-4">
                                           <select class=" form-control" ng-model="selectedLedger.type" minlength="2" type="text">
                                             <option value="">--SELECT--</option>
                                             <option value="DR">DR</option>
                                             <option value="CR">CR</option>   
                                            </select>   

                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Address (required)</label>
                                        <div class="col-lg-10">
                                            <input class=" form-control" type="text" required ng-model="selectedLedger.address"/>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="#/ledger" class="btn btn-default" >Cancel</a>
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