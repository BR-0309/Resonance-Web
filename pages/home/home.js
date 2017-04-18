'use strict';
angular.module('resonance-home', [
    'ngRoute',
    'ngMaterial',
    'ngCookies',
    'pascalprecht.translate'
]).config(['$locationProvider', '$routeProvider', '$translateProvider', function ($locationProvider, $routeProvider, $translateProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider.otherwise({redirectTo: '/'});

    $translateProvider.useStaticFilesLoader({
        prefix: 'lang/',
        suffix: '.json'
    })
        .fallbackLanguage('en_GB')
        .determinePreferredLanguage()
        .useSanitizeValueStrategy(null)
        .useLocalStorage();
}]).config(function ($mdThemingProvider) {
    $mdThemingProvider.theme('default')
        .primaryPalette('teal', {
            'default': '600',
            'hue-1': '700'
        })
        .accentPalette('pink');
});