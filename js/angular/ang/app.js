'use strict';


// Declare app level module which depends on filters, and services
angular.module('myApp', [
  'ui.router',
  'myApp.filters',
  'myApp.services',
  'myApp.directives',
  'myApp.controllers'
]).
config(function($stateProvider, $urlRouterProvider) {
  //$urlRouterProvider.otherwise('newsfeed');
  $stateProvider
  .state('unload', {
      url: "/unload",
      template: ""
  })
  .state('index', {
      url: "",
      templateUrl: "../views/home"
  })
  .state('home', {
      url: "/home",
      templateUrl: "../views/home"
  })
  .state('company_profile', {
      url: "/company_profile",
      templateUrl: "../views/company_profile"
  })  
   .state('group', {
      url: "/group",
      templateUrl: "../views/group"
  })
  .state('ledger', {
      url: "/ledger",
      templateUrl: "../views/ledger"
  })
   .state('create_ledger', {
      url: "/create_ledger",
      templateUrl: "../views/create_ledger"
  })
   .state('view_ledger', {
      url: "/view_ledger",
      templateUrl: "../views/view_ledger"
  })
   .state('stock_group', {
      url: "/stock_group",
      templateUrl: "../views/stock_group"
  })
    .state('stock_item', {
      url: "/stock_item",
      templateUrl: "../views/stock_item"
  })
    .state('create_sitem', {
      url: "/create_sitem",
      templateUrl: "../views/create_sitem"
  })
    .state('view_sitem', {
      url: "/view_sitem",
      templateUrl: "../views/view_sitem"
  })
    .state('unit_of_measure', {
      url: "/unit_of_measure",
      templateUrl: "../views/unit_of_measure"
  })
  .state('sale', {
      url: "/sale",
      templateUrl: "../views/sales_voucher"
  })
  .state('printvoucher', {
      url: "/printvoucher",
      templateUrl: "../views/printvoucher.html"
  })
 .state('trialBalance', {
      url: "/trialBalance",
      templateUrl: "../views/trialBalance"
  })
 .state('dayBook', {
      url: "/dayBook",
      templateUrl: "../views/dayBook"
  })
 .state('accountBook', {
      url: "/accountBook",
      templateUrl: "../views/accountBook"
  })
 .state('inventoryBook', {
      url: "/inventoryBook",
      templateUrl: "../views/inventoryBook"
  })
 .state('trialBalanceGrp', {
      url: "/trialBalanceGrp",
      templateUrl: "../views/trialBalanceGrp"
  })
 .state('purchase', {
      url: "/purchase",
      templateUrl: "../views/purchase"
  })
 .state('contra', {
      url: "/contra",
      templateUrl: "../views/contra"
  })
 .state('payment', {
      url: "/payment",
      templateUrl: "../views/payment"
  })
 .state('receipt', {
      url: "/receipt",
      templateUrl: "../views/receipt"
  })
 .state('showvouchers', {
      url : "/showvouchers",
      templateUrl : "../views/showvouchers"
 })
});