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
  .state('home_alt', {
      url: "/home_alt",
      templateUrl: "../views/home_alt"
  })
  .state('unload', {
      url: "/unload",
      template: ""
  });
  
});