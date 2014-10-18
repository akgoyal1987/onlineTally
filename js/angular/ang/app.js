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
  .state('unload', {
      url: "/unload",
      template: ""
  });
});