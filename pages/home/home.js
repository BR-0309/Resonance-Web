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
}).controller('HomeCtrl', ['$scope', '$translate', '$sce', function ($scope, $translate, $sce) {
    $scope.langs = [
        {
            key: 'en_US',
            img: 'images/us.png'
        },
        {
            key: 'en_GB',
            img: 'images/uk.png'
        }
    ];
    $scope.changeLanguage = function (langKey) {
        $translate.use(langKey);
        console.log("changed lang to: " + langKey)
    };
    $scope.getFlag = function (lang) {
        var tag;
        if (lang === "en_US") {
            tag = '<img src="images/us.png">';
        } else {
            tag = '<img src="images/uk.png">';
        }
        $sce.trustAsHtml(tag);
        return tag;
    }
}]);