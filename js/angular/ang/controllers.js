'use strict';

/* Controllers */

angular.module('myApp.controllers', [])
.controller('mainController', function($scope, $window, $location,$http, $anchorScroll) {
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
});