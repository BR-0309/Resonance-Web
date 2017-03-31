'use strict';

angular.module('resonance', [
    'ngRoute',
    'ngMaterial',
    'resonance.news'
])
    .config(['$locationProvider', '$routeProvider', function ($locationProvider, $routeProvider) {
        $locationProvider.hashPrefix('!');

        $routeProvider.when("/news", {templateUrl: "news/news.html"})
            .otherwise({redirectTo: '/news'});
    }])
    .config(function ($mdThemingProvider) {
        $mdThemingProvider.theme('default')
            .primaryPalette('teal', {
                'default': '600',
                'hue-1': '700'
            })
            .accentPalette('pink');
    })
    .config(function ($sceDelegateProvider) {
        $sceDelegateProvider.resourceUrlWhitelist([
            'self',
            'https://www.google.**',
            'http://*.bbc.com/**',
            'http://www.bbc.com/**',
            'http://www.dailymail.co.uk/**',
            'http://www.srf.ch/**',
            'http://www.faz.net/**'
        ]);
    })
    .controller('NavCtrl', ['$scope', '$rootScope', '$location', '$mdSidenav', '$window', function ($scope, $rootScope, $location, $mdSidenav, $window) {
        $scope.openLeftMenu = function () {
            $mdSidenav('left').toggle();
        };
        $scope.isNews = function () {
            return $location.path() === "/news";
        };
        $scope.search = function () {
            $window.open('https://www.google.com/search?q=' + $rootScope.title, '_blank');
        };
    }]);