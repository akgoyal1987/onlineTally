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
   
  .state('unload', {
      url: "/unload",
      template: ""
  });
});