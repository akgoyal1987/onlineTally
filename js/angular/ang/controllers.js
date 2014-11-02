'use strict';

/* Controllers */

angular.module('myApp.controllers', [])
.controller('mainController', function($rootScope, $scope, $window, $location,$http, $anchorScroll) {
  $scope.ledgers = [];
  $scope.groups = [];
  $scope.selectedLedger = {};
  $scope.selectedGroup = {};
  $scope.newLedger = {};
  $scope.company={};
  $scope.states = [];
  $scope.districts = [];
  $scope.cities = [];

  $http.get("../data/states")
  .success(function(states){
    $scope.states = states;
  })
  .error(function(error){
    console.log(error);
  });
  $http.get("../userinfo/getCompany")
  .success(function(company){
    $scope.company = company;
  })
  .error(function(error){
    console.log(error);
  });

  $http.get("../data/districts")
  .success(function(districts){
    $scope.districts = districts;
  })
  .error(function(error){
    console.log(error);
  });

  $http.get("../data/cities")
  .success(function(cities){
    $scope.cities = cities;
  })
  .error(function(error){
    //console.log(error);
  });

  $scope.resetSelectedLedger = function(){
    $scope.selectedLedger = {};
  };

  $scope.getDistricts = function(state){
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
        $window.alert("Group Created Successfully");
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
  $scope.getGroups = function(){
    $http.get("../group/get")
    .success(function(response){
      $scope.groups = response;
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.getGroups = function(){
    $http.get("../group/get")
    .success(function(response){
      $scope.groups = response;
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.setSelectedLedger = function(ledger){
    $scope.selectedLedger = angular.copy(ledger);    
  };
   $scope.setSelectedGroup = function(group){
    $scope.selectedGroup = angular.copy(group);    
  };

  $scope.updateLedger = function(){
    $http.post("../ledger/update", $scope.selectedLedger)
    .success(function(response){
      if(response){
        $window.alert("Ledger Updated Successfully");
      }
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.updateLedger = function(){
    $http.post("../group/update", $scope.selectedGroup)
    .success(function(response){
      if(response){
        $window.alert("Group Updated Successfully");
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
});