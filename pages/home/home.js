'use strict';
var translations = {
    HEADLINE: 'What an awesome module!',
    PARAGRAPH: 'Srsly!'
};
// Declare app level module which depends on views, and components
angular.module('resonance-home', [
    'ngRoute',
    'ngMaterial'
]).config(['$locationProvider', '$routeProvider', function ($locationProvider, $routeProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider.otherwise({redirectTo: '/'});
}]).config(function ($mdThemingProvider) {
    $mdThemingProvider.theme('default')
        .primaryPalette('teal', {
            'default': '600',
            'hue-1': '700'
        })
        .accentPalette('pink');
});