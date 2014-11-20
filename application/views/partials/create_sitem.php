    <!--body wrapper start-->
        <div class="wrapper" ng-init="resetSelectedSitem();">
            <div class="row">
               
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Create Stock Item
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal adminex-form" id="ledgerform" ng-submit="createSitem();" method="get" action="">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Name (required)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control" type="text" required ng-model="selectedSitem.name"/>
                                        </div>
                                         <label for="cname" class="control-label col-lg-2">Stock Group (required)</label>
                                        <div class="col-lg-4">
                                           <select ng-options="state.name for state in stock_groups| orderBy:'name'" class=" form-control" type="text" required ng-model="selectedSitem.group_id">
                                              <option value="" selected="">--SELECT--</option> 
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Unit (required)</label>
                                        <div class="col-lg-4">
                                            <select ng-options="state.name for state in units| orderBy:'name'" class=" form-control" type="text" required ng-model="selectedSitem.unit_id">
                                              <option value="" selected="">--SELECT--</option> 
                                            </select> 
                                        </div>
                                        <label for="cname" class="control-label col-lg-2">Rate Of Duty </label>
                                        <div class="col-lg-4">
                                            <input class="form-control " pattern="[0-9]+([\.][0-9]+)?" ng-model="selectedSitem.rate_of_duty" type="text"  />     
                                        </div>
                                        
                                    </div>
                                    <div class="form-group ">
                                    <h1 for="cname" class="panel-heading col-lg-2">Opening Balance</h1>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Quantity</label>
                                        <div class="col-lg-2"> 
                                          <input class="form-control " pattern="[0-9]+([\.][0-9]+)?" ng-model="selectedSitem.quantity" type="text" ng-change="setValue(selectedSitem);" />     
                                        </div> 
                                        <label for="cname" class="control-label col-lg-1" ng-bind="selectedSitem.unit_id.name"></label>   
                                        <label for="cname" class="control-label col-lg-1">Rate </label>
                                        <div class="col-lg-2">
                                          <input class="form-control " pattern="[0-9]+([\.][0-9]+)?" ng-model="selectedSitem.rate" type="text" ng-change="setValue(selectedSitem);"  />     
                                        </div> 
                                         <label for="cname" class="control-label col-lg-1">Per <span ng-bind="selectedSitem.unit_id.name"></span></label>
                                          <label for="cname" class="control-label col-lg-1">Value </label>
                                        <div class="col-lg-2">
                                          <input class="form-control " pattern="[0-9]+([\.][0-9]+)?" ng-model="selectedSitem.value" type="text" ng-change="setValue(selectedSitem);" />     
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="#/stock_item" class="btn btn-default">Cancel</a>
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