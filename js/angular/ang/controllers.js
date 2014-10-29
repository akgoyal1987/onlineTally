'use strict';

/* Controllers */

angular.module('myApp.controllers', [])
.controller('mainController', function($scope, $window, $location,$http, $anchorScroll) {
  $scope.ledgers = [];
  $scope.setSelectedLedger;
  $scope.newLedger;

  $scope.createLedger = function(){
    var ledger = {};
    ledger.firstname = $("#f-name").val();
    $http.post("../ledger/create", ledger)
    .success(function(response){
      alert(response.firstname);
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

  $scope.setSelectedLedger = function(ledger){
    $scope.setSelectedLedger = ledger;    
  };

  $scope.updateLedger = function(){
    $http.post("../ledger/update", {data : $("#ledgerform").serialize(), id : $scope.setSelectedLedger.s_no})
    .success(function(data){
      console.log(data);
    }).
    error(function(err){

    });
  }

  $scope.deleteLedger = function(ledger){
    console.log(ledger);
    $http.post("../ledger/delete", {id : ledger.s_no})
    .success(function(data){
      ledger = null;
    }).
    error(function(err){

    });
  }
});