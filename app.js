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

angular.module('resonance-main', ['ngMaterial'])
    .config(function($mdThemingProvider) {
        $mdThemingProvider.theme('default')
            .primaryPalette('teal', {
                'default': '600'
            })
            .accentPalette('pink');
    });