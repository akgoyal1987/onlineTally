'use strict';

/* Controllers */

angular.module('myApp.controllers', [])
.controller('mainController', function($rootScope, $scope, $window, $location,$http, $anchorScroll) {
  $scope.ledgers = [];
  $scope.groups = [];
  $scope.selectedLedger = {};
  $scope.newLedger = {};
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
    console.log(error);
  });

  $scope.resetSelectedLedger = function(){
    $scope.selectedLedger = {};
  }

  $scope.createLedger = function(){
    $http.post("../ledger/create", $scope.selectedLedger)
    .success(function(response){
      if(response){
        $window.alert("Ledger Created SuccessFully");
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

  $scope.setSelectedLedger = function(ledger){
    $scope.selectedLedger = angular.copy(ledger);    
  };

  $scope.updateLedger = function(){
    $http.post("../ledger/update", $scope.selectedLedger)
    .success(function(response){
      if(response){
        $window.alert("Ledger Updated SuccessFully");
      }
    })
    .error(function(error){
      alert(error);
    })
  };

  $scope.deleteLedger = function(ledger, index){
    $http.post("../ledger/delete", {id : ledger.s_no})
    .success(function(data){
      $scope.ledgers.splice(index, 1);
    }).
    error(function(err){

    });
  }
  $scope.deleteGroup = function(group, index){
    $http.post("../group/delete", {id : group.id})
    .success(function(data){
      $scope.groups.splice(index, 1);
    }).
    error(function(err){

    });
  }
});