'use strict';
angular.module('resonance-home', [
    'ngRoute',
    'ngMaterial',
    'ngSanitize',
    'pascalprecht.translate'
]).config(['$locationProvider', '$routeProvider', '$translateProvider', function ($locationProvider, $routeProvider, $translateProvider) {
    $locationProvider.hashPrefix('!');
    $routeProvider.otherwise({redirectTo: '/'});

    $translateProvider.useStaticFilesLoader({
        prefix: 'lang/locale-',
        suffix: '.json'
    });
    $translateProvider.preferredLanguage('en');
    $translateProvider.useSanitizeValueStrategy(null);
}]).config(function ($mdThemingProvider) {
    $mdThemingProvider.theme('default')
        .primaryPalette('teal', {
            'default': '600',
            'hue-1': '700'
        })
        .accentPalette('pink');
});