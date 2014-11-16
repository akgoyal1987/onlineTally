    <!--body wrapper start-->
        <div class="wrapper" data-ng-init="getCompanyInfo();">
            <div class="row">
               
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Company Info
                        </header>
                        <div class="panel-body">
                            <div class=" form">
                                <form class="cmxform form-horizontal adminex-form" id="commentForm" method="get"  ng-submit="updateCompany();">
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Name (required)</label>
                                        <div class="col-lg-4">
                                            <input  class="form-control" ng-model="company.company_name" type="text" required />
                                        </div>
                                         <label for="cname" class="control-label col-lg-2">Mobile No (required)</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" ng-model="company.phone_no"  type="text" required />
                                        </div>
                                    </div>
                                     <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">Address (required)</label>
                                        <div class="col-lg-4">
                                            <input class=" form-control" ng-model="company.address" type="text" required />
                                        </div>
                                         <label for="cname" class="control-label col-lg-2">State (required)</label>
                                        <div class="col-lg-4">
                                           <select class=" form-control" ng-options="state.name for state in states| orderBy:'name'" ng-model="company.state" type="text" required >
                                              <option value="">--SELECT--</option>
                
                                            </select>      
                                        </div>
                                    </div>  
                                    <div class="form-group ">
                                        <label for="cname" class="control-label col-lg-2">District (required)</label>
                                        <div class="col-lg-4">
                                            <select class=" form-control" ng-options="district.name for district in getDistrictsByState(company.state) | orderBy:'name'" ng-model="company.district" type="text" required >
                                              <option value="">--SELECT--</option>
                                             
                                            </select>      
                                        </div>
                                       <label for="cname" class="control-label col-lg-2">City (required)</label>
                                        <div class="col-lg-3">
                                            <select ng-show="!addcity" ng-options="city.name for city in getCitiesByDistrict(company.district) | orderBy:'name'" class=" form-control" required type="text" ng-model="company.city">
                                            <option value="" selected>--SELECT--</option>
                                            </select>
                                            <input class="form-control" type="text" ng-show="addcity" ng-model="newcity.name"/>                                            
                                        </div>
                                        <div class="col-lg-1">
                                            <button type="button" ng-click="addcity = true" class="btn btn-main" ng-show="!addcity" title="click to add new city">+</button>                                            
                                            <button type="button" ng-click="addcity = false" class="btn btn-main" ng-show="addcity" title="click to select city">-</button>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">Pincode (required)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control " type="text" ng-model="company.pin_code" required />
                                        </div>
                                        <label for="curl" class="control-label col-lg-2">E-Mail (optional)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control "ng-model="company.email_id" type="email" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="cemail" class="control-label col-lg-2">CSL No. (optional)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control "  type="text" ng-model="company.csl_no" />
                                        </div>
                                        <label for="curl" class="control-label col-lg-2">TIN No. (optional)</label>
                                        <div class="col-lg-4">
                                            <input class="form-control " type="text" ng-model="company.tin_no" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="curl" class="control-label col-lg-2">Financial Year (required)</label>
                                        <div class="col-lg-4">
                                            <input datepicker class="form-control "  type="text" ng-model="company.financial_year" required />
                                           </div>
                                        <label for="curl" class="control-label col-lg-2">Book Begining From (required)</label>
                                        <div class="col-lg-4">
                                            <input datepicker class="form-control "  type="text" ng-model="company.book_begning" required /> </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button class="btn btn-primary" type="submit">Update</button>
                                            <button class="btn btn-default" ng-click="go('/home')" type="button" >Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </section>
                </div>
            </div>
           
            
        </div>
