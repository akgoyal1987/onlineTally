'use strict';

/* Controllers */

angular.module('myApp.controllers', [])
.controller('mainController', function($rootScope, $scope, $window, $location,$http, $anchorScroll) {
  $scope.ledgers = [];
  $scope.groups = [];
  $scope.stock_groups = [];
  $scope.stock_items = [];
  $scope.units = [];
  $scope.selectedLedger = {};
  $scope.selectedGroup = {};
  $scope.selectedStockGroup = {};
  $scope.selectedUnit = {};
  $scope.selectedSitem= {};
  $scope.newLedger = {};
  $scope.company=[];
  $scope.states = [];
  $scope.districts = [];
  $scope.cities = [];
  $scope.newcity = { name : ""};
  $scope.newVoucher = {};
  $scope.creditorLedgers = [];
  $scope.debtorLedgers = [];
  $scope.trialBalance = [];
  $scope.voucherEntries = [{
    item_id : "",
    quantity : "",
    rate : "",
    value : ""
  }];

  $scope.getCompanyInfo = function(){
    $http.get("../userinfo/getCompany")
    .success(function(response){
      if(response.success)
        $scope.company = response.company;
      else
        $window.alert(response.message);    
    })
    .error(function(error){
      console.log(error);
    });
  }
  $scope.getCompanyInfo();

  function getAllStates(){
    $http.get("../data/states")
    .success(function(states){
      $scope.states = states;
    })
    .error(function(error){
      console.log(error);
    });
  }
  getAllStates();

  function getAllDistricts(){
    $http.get("../data/districts")
    .success(function(districts){
      $scope.districts = districts;
    })
    .error(function(error){
      console.log(error);
    });
  }
  getAllDistricts();

  function getAllCities(){
    $http.get("../data/cities")
    .success(function(cities){
      $scope.cities = cities;
    })
    .error(function(error){
      //console.log(error);
    });
  }
  getAllCities();

  $scope.getAllGroups = function(){
    $http.get("../group/get")
    .success(function(response){
      $scope.groups = response;
      
    })
    .error(function(error){
      alert(error);
    })
  };
  $scope.getAllGroups();

  $scope.getAllStockGroups = function(){
    $http.get("../stock_group/get")
    .success(function(response){
      $scope.stock_groups = response;
    })
    .error(function(error){
      alert(error);
    })
  };
  $scope.getAllStockGroups();

  $scope.getAllUnits = function(){
    $http.get("../unit/get")
    .success(function(response){
      $scope.units = response;
    })
    .error(function(error){
      alert(error);
    })
  };
  $scope.getAllUnits();

  function closeModal(){
    $(".close").click();
  }

  $scope.getGroupNameById = function(groupid){
    var mygroup = $scope.groups.filter(function(group){
      return (group.id == groupid);
    });
    if(mygroup.length>0)
      return mygroup[0];
    else
      return "";
  }

  $scope.getStockGroupNameById = function(groupid){
    var mygroup = $scope.stock_groups.filter(function(group){
      return (group.id == groupid);
    });
    if(mygroup.length>0)
      return mygroup[0];
    else
      return "";
  }

  $scope.stockgroupsWithoutPrimary = function(){
    var mygroup = $scope.stock_groups.filter(function(group){
      return (group.group_id != 0);
    });
    if(mygroup.length>0)
      return mygroup;
    else
      return "";
  }

  $scope.groupsWithoutPrimary = function(){
    var mygroup = $scope.groups.filter(function(group){
      return (group.user_id != null);
    });
    if(mygroup.length>0)
      return mygroup;
    else
      return "";
  }

  function hasCity(cityname, districtid){
    var cities = $scope.cities.filter(
      function(city){
        return (city.name.toUpperCase() == cityname.toUpperCase() && city.district_id == districtid);
      }
    );
    if(cities && cities.length>0)
      return true;
    else
      return false;
  }

  $scope.getCreditors = function(){

    var creditorGroup = $scope.groups.filter(function(group){
      return (group.name.toLowerCase().trim() == 'Sales Accounts'.toLowerCase().trim());
    }); 
    if(creditorGroup.length>0){
      $scope.creditorLedgers = $scope.ledgers.filter(function(ledger){
        return ledger.group_id+'' == creditorGroup[0].id+''; 
      }); 
    }
  }

  $scope.getDebitors = function(){
    var debitorGroup = $scope.groups.filter(function(group){
      return (group.name.toLowerCase().trim() == 'sundry debtors' || group.name.toLowerCase().trim() == 'sundry creditors'.toLowerCase().trim() || group.name.toLowerCase().trim() == 'Cash-in-hand'.toLowerCase().trim());
    });
    if(debitorGroup.length>0){
      var takeThis;
      $scope.debitorLedgers = $scope.ledgers.filter(function(ledger){
        takeThis = false;
        angular.forEach(debitorGroup, function(group){
          if (!takeThis && ledger.group_id+''.trim() == group.id+''.trim()){
            takeThis = true;
          }
        });
        return takeThis;
      });
    }
  }

  $scope.resetSelectedLedger = function(){
    $scope.selectedLedger = {};
  };

  $scope.resetSelectedSitem = function(){
    $scope.selectedSitem = {};
  };

  $scope.getDistrictsByState = function(state){
    if(!state){
      return [];
    }
    var districts = $scope.districts.filter(
      function(district){
        return (district.state_id==state.id);
      }
    );
    return districts;
  };

  $scope.getCitiesByDistrict = function(district){
    if(!district){
      return [];
    }
    var cities = $scope.cities.filter(
      function(city){
        return (city.district_id == district.id);
      }
    );
    return cities;
  };

  $scope.resetSelectedGroup = function(){
    $scope.selectedGroup = {};
  }

    $scope.resetSelectedStockGroup = function(){
    $scope.selectedStockGroup = {};
  }

  $scope.createLedger = function(){
    $http.post("../ledger/create", $scope.selectedLedger)
    .success(function(response){
      if(response){
        $window.alert("Ledger Created Successfully");
      }
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.createGroup = function(){
    $http.post("../group/create", $scope.selectedGroup)
    .success(function(response){
      if(response){
        //$window.alert("Group Created Successfully");
        $scope.selectedGroup = {};
        closeModal();
        $scope.getAllGroups();
      }
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.createStockGroup = function(){
    $http.post("../stock_group/create", $scope.selectedStockGroup)
    .success(function(response){
      if(response){
        //$window.alert("Group Created Successfully");
        $scope.selectedStockGroup= {};
        closeModal();
        $scope.getAllStockGroups();
      }
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.createSitem = function(){
    $http.post("../stock_items/create", $scope.selectedSitem)
    .success(function(response){
      if(response){
        $window.alert("Stock Item Created Successfully");
        $location.path("/stock_item");
      }
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.createUnit = function(){
    $http.post("../unit/create", $scope.selectedUnit)
    .success(function(response){
      if(response){
        //$window.alert("Group Created Successfully");
        $scope.selectedUnit= {};
        closeModal();
        $scope.getAllUnits();
      }
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.getLedgers = function(){
    $http.get("../ledger/get")
    .success(function(response){
      $scope.ledgers = response;
      $scope.getCreditors();
      $scope.getDebitors();
    })
    .error(function(error){
      alert(error);
    })
  };
  $scope.getLedgers();
  
  $scope.getStockItems = function(){
    $http.get("../stock_items/get")
    .success(function(response){
      $scope.stock_items = response;
    })
    .error(function(error){
      alert(error);
    })
  };  
  $scope.getStockItems();

  $scope.setSelectedLedger = function(ledger){
    $scope.selectedLedger = angular.copy(ledger); 
    var temp = $scope.states.filter(
      function(state){
        return ($scope.selectedLedger.state.toUpperCase()==state.name.toUpperCase());
      }
    );  
    if(temp.length>0)
      $scope.selectedLedger.state = temp[0];
    
    temp = $scope.districts.filter(
      function(district){
        return ($scope.selectedLedger.state.id == district.state_id && $scope.selectedLedger.district.toUpperCase()==district.name.toUpperCase());
      }
    );  
    if(temp.length>0)
      $scope.selectedLedger.district = temp[0];

    temp = $scope.cities.filter(
      function(city){
        return ($scope.selectedLedger.district.id == city.district_id && $scope.selectedLedger.state.id == city.state_id && $scope.selectedLedger.city.toUpperCase()==city.name.toUpperCase());
      }
    );  
    if(temp.length>0)
      $scope.selectedLedger.city = temp[0];

    temp = $scope.groups.filter(
      function(group){
        return ($scope.selectedLedger.group_id == group.id);
      }
    );  
    if(temp.length>0)
      $scope.selectedLedger.group_id = temp[0];
  };

  $scope.setSelectedGroup = function(group, index){
    $scope.selectedGroup = angular.copy(group); 
    $scope.selectedGroup.index = index;   
    $scope.selectedGroup.group = $scope.getGroupNameById(group.group);
  };

   $scope.setSelectedStockGroup = function(group, index){
    $scope.selectedStockGroup = angular.copy(group); 
    $scope.selectedStockGroup.index = index;

    $scope.selectedStockGroup.group_id = $scope.getStockGroupNameById(group.group_id);
  };
   $scope.setSelectedSitem = function(ledger){
    $scope.selectedSitem = angular.copy(ledger); 
      var temp = $scope.stock_groups.filter(
      function(state){
        return ($scope.selectedSitem.group_id==state.id);
      }      
    );  
    if(temp.length>0)
      $scope.selectedSitem.group_id = temp[0];
    var temp1 = $scope.units.filter(
      function(state){
        return ($scope.selectedSitem.unit_id==state.id);
      }      
    );  
    if(temp1.length>0)
      $scope.selectedSitem.unit_id = temp1[0];
  }

   $scope.setSelectedUnit = function(group, index){
    $scope.selectedUnit = angular.copy(group); 
    $scope.selectedUnit.index = index;   
  };
  
  $scope.updateLedger = function(){  
    if($scope.newcity.name && $scope.newcity.name!=""){
      if(hasCity($scope.newcity.name, $scope.selectedLedger.district.id)){
        $window.alert("This City Already Exist, Please Select From Available cities");
        return;   
      }
      $scope.selectedLedger.city.id = 0;
      $scope.selectedLedger.city.name = $scope.newcity.name;
      $scope.selectedLedger.city.district_id = $scope.selectedLedger.district.id;
      $scope.selectedLedger.city.state_id = $scope.selectedLedger.state.id;
      getAllCities();
    }
    $http.post("../ledger/update", $scope.selectedLedger)
    .success(function(response){
      if(response){
        $scope.newcity.name = "";
        $location.path("/ledger");
      }
    })
    .error(function(error){
      alert(error);
    })
  };
  $scope.updateCompany = function(){
    $http.post("../userinfo/updateCompany", $scope.company)
    .success(function(response){
      if(response){
        $window.alert("Company Profile Updated Successfully");
        $location.path("/home");
      }
    })
    .error(function(error){
      $window.alert(error);
    })
  };
  $scope.updateSitem = function(){
    $http.post("../stock_items/update", $scope.selectedSitem)
    .success(function(response){
      if(response){
        $window.alert("Stock Item Updated Successfully");
        $location.path("/stock_item");
      }
    })
    .error(function(error){
      $window.alert(error);
    })
  };
  $scope.updateGroup = function(){
    $http.post("../group/update", $scope.selectedGroup)
    .success(function(response){
      if(response){
        //$window.alert("Group Updated Successfully");
        $scope.getAllGroups();
        closeModal();
        $scope.selectedGroup = {};
      }
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.updateStockGroup = function(){
    $http.post("../stock_group/update", $scope.selectedStockGroup)
    .success(function(response){
      if(response){
        //$window.alert("Group Updated Successfully");
        $scope.getAllStockGroups();
        closeModal();
        $scope.selectedStockGroup = {};

      }
    })
    .error(function(error){
      alert(error);
    })
  };
  $scope.updateUnit = function(){
    $http.post("../unit/update", $scope.selectedUnit)
    .success(function(response){
      if(response){
        //$window.alert("Group Updated Successfully");
        $scope.units[$scope.selectedUnit.index].name = $scope.selectedUnit.name;
        closeModal();
        $scope.selectedUnit = {};
      }
    })
    .error(function(error){
      alert(error);
    })
  };


  $scope.deleteLedger = function(ledger, index){
    var retVal = confirm("Do you want to delete ?");
    if (retVal == true) {
      $http.post("../ledger/delete", {id : ledger.s_no})
      .success(function(data){
        $scope.ledgers.splice(index, 1);
      }).
      error(function(err){

      });
    }
  }

  $scope.deleteGroup = function(group, index){
    var retVal = confirm("Do you want to delete ?");
    if (retVal == true) {
      $http.post("../group/delete", {id : group.id})
      .success(function(data){
        $scope.getAllGroups();
      }).
      error(function(err){

      });
    }
  }

   $scope.deleteStockGroup = function(group, index){
    var retVal = confirm("Do you want to delete ?");
    if (retVal == true) {
      $http.post("../stock_group/delete", {id : group.id})
      .success(function(data){
       $scope.getAllStockGroups();
      }).
      error(function(err){

      });
    }
  }
    $scope.deleteSitem = function(group, index){
    var retVal = confirm("Do you want to delete ?");
    if (retVal == true) {
      $http.post("../stock_items/delete", {id : group.id})
      .success(function(data){
        $scope.stock_items.splice(index, 1);
      }).
      error(function(err){

      });
    }
  }

  $scope.resetNewVoucher = function(){
    $scope.voucherEntries.splice(0, $scope.voucherEntries.length);
    $scope.newVoucher = {};
    $scope.addMoreItem();
  }
  $scope.deleteUnit = function(group, index){
    var retVal = confirm("Do you want to delete ?");
    if (retVal == true) {
      $http.post("../unit/delete", {id : group.id})
      .success(function(data){
        $scope.units.splice(index, 1);
      }).
      error(function(err){
      });
    }
  }

  $scope.setValue = function(v){
    if(v.rate && v.rate!="" && v.quantity && v.quantity!=""){
      v.value = v.rate*v.quantity;
    }
  }

  $scope.printPage = function(id){
    $scope.newVoucher.voucherEntries = $scope.voucherEntries;
    var pt = '<link href="http://localhost/onlineTally/css/bootstrap.min.css" rel="stylesheet">';
      pt = pt+'<div class="container">';
      pt = pt+'<p style="text-align: right;">TIN NO :'+$scope.company.tin_no+'</p>';
      pt = pt+'<h3 style="text-align: center;">'+$scope.company.company_name+'</h2>';
      pt = pt+'<h5 style="text-align: center;">Phone: '+$scope.company.phone_no+', email: '+$scope.company.email_id+'</h5>';
      pt = pt+'<h5 style="text-align: center;">Regd Office: '+$scope.company.address+'</h5>';
      pt = pt+'<hr><h3 style="text-align: center;">INVOICE</h3><hr>';
      pt=  pt+'<div class="row"> <div class="col-sm-6" style= "border: 1px solid;"><p>To,</p><p>'+$scope.newVoucher.cr_acc.name+'</p><p>'+$scope.newVoucher.cr_acc.address+'</p><p>'+$scope.newVoucher.cr_acc.city+'</p><p> district :'+$scope.newVoucher.cr_acc.district+'</p><p>State :'+$scope.newVoucher.cr_acc.state+'</p><p>Contact No. :'+$scope.newVoucher.cr_acc.mobile_no+'</p></div>';
      pt=  pt+'<div class="col-sm-6" style= "border: 1px solid; height:212px;"><p>Invoice No. '+(id?id:$scope.newVoucher.id)+'<span class="pull-right">Date: '+$scope.newVoucher.date+'</span></p></div></div>';
      pt = pt+'<table  class="display table table-bordered table-striped" id="dynamic-table"><thead><tr><th>Item</th><th>Quantity</th><th class="hidden-phone">Rate</th><th class="hidden-phone">Value</th></tr></thead><tbody>';
      var value = 0;
        angular.forEach($scope.newVoucher.voucherEntries, function(item, index){
          pt = pt+'<tr class="gradeX">';
          pt = pt+'<td><label class="control-label form-control">'+item.item_id.name+'</td>';
          pt = pt+'<td><label class="control-label form-control">'+item.quantity+'</td>';
          pt = pt+'<td><label class="control-label form-control">'+item.rate+'</td>';
          pt = pt+'<td><label class="control-label form-control">'+item.value+'</td>';
          pt = pt+'</tr>';
          value = value+item.value;
        });
      pt = pt+'</tbody></table></form>';
      pt = pt+'<p>1. Interest will be charged for delayed payments.<p>';
      pt = pt+'<p>2. Seeds for Sowing & Gardening purpose are exempted under item no.<p>';
      pt = pt+'<p>44 of schedule-1, List of goods exempt from Tax under Section-7 of AP VAT ACT No. 5 of 2005.<p>';
      pt = pt+'<p>3. SUBJECT TO KURNOOL JURISDICTION ONLY.<p>';
       pt = pt+'<h3 class="pull-right">Total :'+value+'</h3>';
      pt = pt+'</div>';
      var popupWin = $window.open('', '_blank', 'location=no,left=200px');

      popupWin.document.open();

      popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')

      popupWin.document.write(pt);

      popupWin.document.write('</html>')

      popupWin.document.close();
  }

  $scope.createVoucher = function(type){
    delete $scope.newVoucher.voucherEntries;
    $scope.newVoucher.type = type;
    if(type == 'sale')
      $scope.newVoucher.voucherEntries = $scope.voucherEntries;
    $http.post("../voucher/create", $scope.newVoucher)
    .success(function(response){
      $scope.newVoucher.id = response.voucherid;
      
      $scope.printPage();

      $scope.newVoucher = {};
      $scope.voucherEntries.splice(0, $scope.voucherEntries.length);
      $scope.addMoreItem();

    })
    .error(function(){

    });
  }
  $scope.addMoreItem = function(){
    $scope.voucherEntries.push({
      item_id : "",
      quantity : "",
      rate : "",
      value : ""
    });
  }

  $scope.getGroupNameById = function(groupid){
    var mygroup = $scope.groups.filter(function(group){
      return (group.id == groupid);
    });
    if(mygroup.length>0)
      return mygroup[0];
    else
      return "";
  }

  $scope.getTrialBalance = function(){
    $http.get("../display/trialBalance")
    .success(function(response){
      $scope.trialBalance = {};
      $scope.displayTrialBalance = {};
      $scope.displayLedgers = {};
      $scope.ledgerSummery = {};
      $scope.trialbalancedebitsum = 0;
      $scope.trialbalancecreditsum = 0;
      $scope.backTrialBalance = null;
      var accids = [];
      angular.forEach(response.debitacc, function(acc){
        $scope.ledgerSummery[acc.dr_acc] = { debit : acc.amount?parseInt(acc.amount):0};
        if(accids.indexOf(acc.dr_acc)==-1){
          accids.push(acc.dr_acc);          
        }
      });
      angular.forEach(response.creditacc, function(acc){
        if($scope.ledgerSummery[acc.cr_acc])
          $scope.ledgerSummery[acc.cr_acc]['credit'] = acc.amount?parseInt(acc.amount):0;
        else
          $scope.ledgerSummery[acc.cr_acc] = {credit : acc.amount?parseInt(acc.amount):0};          
        if(accids.indexOf(acc.cr_acc)==-1){
          accids.push(acc.cr_acc);          
        }
      });

      $http.post("../display/getLedgersByIdArray", accids)
      .success(function(res){
        angular.forEach(res.ledgers, function(ledger){
          $scope.ledgerSummery[ledger.s_no]["ledger"] = ledger;
        });

        angular.forEach($scope.ledgerSummery, function(summery, groupid){
          if(!$scope.trialBalance[summery.ledger.group_id]){
            $scope.trialBalance[summery.ledger.group_id] = { group : {}, ledgers : [], debit : 0, credit : 0};
          }
          if(summery.debit)
            $scope.trialBalance[summery.ledger.group_id].debit = $scope.trialBalance[summery.ledger.group_id].debit+parseInt(summery.debit);
          if(summery.credit)
          $scope.trialBalance[summery.ledger.group_id].credit = $scope.trialBalance[summery.ledger.group_id].credit+parseInt(summery.credit);
          $scope.trialBalance[summery.ledger.group_id].ledgers.push(summery);
          $scope.trialBalance[summery.ledger.group_id].group = $scope.getGroupNameById(summery.ledger.group_id);
        });                
        
        angular.forEach($scope.trialBalance, function(info){          
          if(info.group.group){
            $scope.trialBalance[info.group.group].children = {};
            $scope.trialBalance[info.group.group].children[info.group.id] = info;
          }
        });

        angular.forEach($scope.trialBalance, function(info){          
          if(info.group.group){
            delete $scope.trialBalance[info.group.id];
          }
        });
        $scope.displayTrialBalance = angular.copy($scope.trialBalance);
      })
      .error(function(err){
        //{ groupid : { group : {}, ledgers : [], childresn : []}}
      });
    })
    .error(function(error){
      alert(error);
    })
  }

  $scope.showGroupSummery = function(value){
    $scope.trialbalancedebitsum = 0;
    $scope.trialbalancecreditsum = 0;
    $scope.backTrialBalance = angular.copy($scope.displayTrialBalance);
    $scope.displayTrialBalance = value.children;
    $scope.displayLedgers = value.ledgers;     
  }

  $scope.getDebitSum = function(value){
    var val = angular.copy(value);
    var sum = val.debit;
    if(val.children){      
      sum = sum+$scope.calculateChildrenDebitSum(val.children);
    }
    value.childrenDebitSum = sum;
  }

  $scope.calculateChildrenDebitSum = function(children){
    var sum = 0;
    angular.forEach(children, function(child){
      sum = sum+child.debit;
      if(child.children)
        sum = sum+$scope.calculateChildrenDebitSum(child.children);
    });
    return sum;
  }

  $scope.getCreditSum = function(value){
    var val = angular.copy(value);
    var sum = val.credit;
    if(val.children){
      sum = sum+$scope.calculateChildrenCreditSum(val.children);
    }
    value.childrenCreditSum = sum;
  }

  $scope.calculateChildrenCreditSum = function(children){
    var sum = 0;
    angular.forEach(children, function(child){
      sum = sum+child.credit;
      if(child.children)
        sum = sum+$scope.calculateChildrenCreditSum(child.children);
    });
    return sum;
  }

  $scope.calculateCreditTotal = function(){
    var total = 0;
    angular.forEach($scope.displayTrialBalance, function(value){
      total = total+value.childrenCreditSum;
    });
    angular.forEach($scope.displayLedgers, function(ledger){
      if(ledger.credit)
        total = total+parseInt(ledger.credit);
    });
    return total;
  }

  $scope.calculateDebitTotal = function(){
    var total = 0;
    angular.forEach($scope.displayTrialBalance, function(value){
      total = total+value.childrenDebitSum;
    });
    angular.forEach($scope.displayLedgers, function(ledger){
      if(ledger.debit)
        total = total+parseInt(ledger.debit);
    });
    return total;
  }

  $scope.showVouchers = function(ledger){
    $scope.selectedLedger = ledger.ledger;
    $http.post("../voucher/getbyledgerid", {id : ledger.ledger.s_no})
    .success(function(response){
      $scope.selectedLedgerVouchers=response.vouchers; 
      $scope.calculateLedgerCreditDebitTotal();  
    })
    .error(function(error){

    });
  }

  $scope.getLedgerNameById = function(id){
    var ledgerName = '';
    angular.forEach($scope.ledgers, function(ledger){      
      if(ledger.s_no == id){
        ledgerName = ledger.name;
        return;
      }        
    });
    return ledgerName;
  }

  $scope.calculateLedgerCreditDebitTotal = function(){
    var creditTotal = 0;
    var debitTotal = 0;
    angular.forEach($scope.selectedLedgerVouchers, function(voucher){  
      if($scope.selectedLedger.s_no == voucher.cr_acc){        
        debitTotal = debitTotal+parseInt(voucher.amount);
      }else{
        creditTotal = creditTotal+parseInt(voucher.amount);
      }
    });
    $scope.ledgerDebitTotal = debitTotal;
    $scope.ledgerCreditTotal = creditTotal;
  }

  $scope.showVoucherDetail = function(voucher){
    $scope.selectedVoucher = voucher;
    $scope.newVoucher = {};
    $scope.voucherEntries.splice(0, $scope.voucherEntries.length);
    $http.post("../voucher/getVoucherDetailByVoucherId", {id : voucher.id})
    .success(function(response){      
      $scope.newVoucher.cr_acc = $scope.getLedgerById($scope.selectedVoucher.cr_acc);
      $scope.newVoucher.dr_acc = $scope.getLedgerById($scope.selectedVoucher.dr_acc);
      $scope.newVoucher.date = $scope.selectedVoucher.date; 
      if(response && response.voucherdetails && response.voucherdetails.length>0)     
      angular.forEach(response.voucherdetails , function(entry){
        var tempId = entry.item_id;
        entry.item_id = $scope.stock_items[$scope.getStockItemById(tempId)];
        entry.rate = parseInt(entry.rate);
        entry.quantity = parseInt(entry.quantity);
        entry.value = parseInt(entry.value);
        $scope.voucherEntries.push(entry);
      });
    })
    .error(function(error){

    });
  }

  $scope.getStockItemById = function(item_id){
      var index = -1;
      for(var i = $scope.stock_items.length-1; i>=0;i--){
        if($scope.stock_items[i].id == item_id){
          index = i;
          break;
        }
      }
      return index;      
  }
  $scope.getLedgerById = function(ledgerid){
    var new_ledger = null;
    angular.forEach($scope.ledgers, function(ledger){
      if(ledger.s_no == ledgerid){
        new_ledger = ledger;
        return;
      }        
    });
    return new_ledger;
  }
});
