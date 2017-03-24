'use strict';

// Declare app level module which depends on views, and components
angular.module('resonance-home', [
    'ngRoute',
    'ngMaterial'
]).
config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
    $locationProvider.hashPrefix('!');

    $routeProvider.otherwise({redirectTo: '/'});
}]);

angular.module('resonance-home', ['ngMaterial'])
    .config(function($mdThemingProvider) {
        $mdThemingProvider.theme('default')
            .primaryPalette('teal', {
                'default': '600',
                'hue-1': '700'
            })
            .accentPalette('pink');
    });