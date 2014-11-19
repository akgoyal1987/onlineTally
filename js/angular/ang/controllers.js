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
  $scope.stock_items = [];
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
    var mygroup = $scope.stock_groups.filter(function(group){
      return (group.id == groupid);
    });
    if(mygroup.length>0)
      return mygroup[0];
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
    })
    .error(function(error){
      alert(error);
    })
  };  
  $scope.getStockItems = function(){
    $http.get("../stock_items/get")
    .success(function(response){
      $scope.stock_items = response;
    })
    .error(function(error){
      alert(error);
    })
  };  

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
  };

   $scope.setSelectedStockGroup = function(group, index){
    $scope.selectedStockGroup = angular.copy(group); 
    $scope.selectedStockGroup.index = index;

    $scope.selectedStockGroup.group_id = $scope.getGroupNameById(group.group_id);
  };
   $scope.setSelectedSitem = function(ledger){
    $scope.selectedSitem = angular.copy(ledger); 
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
        $scope.groups[$scope.selectedGroup.index].name = $scope.selectedGroup.name;
        $scope.groups[$scope.selectedGroup.index].group = $scope.selectedGroup.group;
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
        $scope.stock_groups[$scope.selectedStockGroup.index].name = $scope.selectedStockGroup.name;
        $scope.stock_groups[$scope.selectedStockGroup.index].group_id = $scope.selectedStockGroup.group_id.id;
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
        $scope.groups.splice(index, 1);
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
        $scope.stock_groups.splice(index, 1);
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
  $scope.getStockItems = function(){
    $http.get("../stock_items/get")
    .success(function(response){
      $scope.stock_items = response;
    })
    .error(function(error){
      alert(error);
    })
  };  
  $scope.setValue = function(v){
    if(v.rate && v.rate!="" && v.quantity && v.quantity!=""){
      v.value = v.rate*v.quantity;
    }
  }
  $scope.createVoucher = function(){
    $scope.newVoucher.voucherEntries = $scope.voucherEntries;
    $http.post("../voucher/create", $scope.newVoucher)
    .success(function(response){
      $scope.newVoucher.id = response.voucherid;
      var pt = '<link href="http://localhost/onlineTally/css/bootstrap.min.css" rel="stylesheet">';
      pt = pt+'<h1>'+$scope.newVoucher.type+' Voucher : # '+$scope.newVoucher.id+' <span style="text-transformation:capitalize" class="pull-right">'+$scope.company.company_name+'</span></h1><div class="panel-body"><form class="cmxform form-horizontal adminex-form ng-dirty ng-valid ng-valid-required"><div class="form-group "><label class="control-label col-lg-2">Credit Account</label>';
      pt = pt+'<label class="control-label col-lg-4">'+$scope.newVoucher.cr_acc.name+'</label>';
      pt = pt+'<label class="control-label col-lg-2">Debit Account</label><label class="control-label col-lg-4">'+$scope.newVoucher.dr_acc.name+'</label></div>';
      pt = pt+'<div class="form-group "><label class="control-label col-lg-2">Date</label><label class="control-label col-lg-10">'+$scope.newVoucher.date+'</label></div>';
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
      pt = pt+'<tr><td colspan="3">Total : </td><td>'+value+'</td></tr>';
      pt = pt+'</tbody></table></form></div>';
      var popupWin = $window.open('', '_blank', 'location=no,left=200px');

      popupWin.document.open();

      popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="print.css" /></head><body onload="window.print()">')

      popupWin.document.write(pt);

      popupWin.document.write('</html>');

      popupWin.document.close();

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
  $scope.removeUnusedItems = function(){

  }
});

