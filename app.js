'use strict';

// Declare app level module which depends on views, and components
angular.module('resonance-main', [
    'ngRoute',
    'ngMaterial'
]).
config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
    $locationProvider.hashPrefix('!');

    $routeProvider.otherwise({redirectTo: '/'});
}]);
