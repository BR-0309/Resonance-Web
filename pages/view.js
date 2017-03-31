'use strict';

angular.module('resonance', [
    'ngRoute',
    'ngMaterial',
    'resonance.news',
    'resonance.about',
    'resonance.contact'
])
    .config(['$locationProvider', '$routeProvider', function ($locationProvider, $routeProvider) {
        $locationProvider.hashPrefix('!');

        $routeProvider.when('/news', {
            templateUrl: 'news/news.html',
            controller: 'NewsCtrl'
        }).when('/about', {
            templateUrl: 'about/about.html',
            controller: 'AboutCtrl'
        }).when('/contact', {
            templateUrl: 'contact/contact.html',
            controller: 'ContactCtrl'
        })
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
            'http://www.bbc.co.uk/**',
            'http://*.bbc.co.uk/**',
            'http://www.bbc.com/**',
            'http://www.dailymail.co.uk/**',
            'http://www.srf.ch/**',
            'http://www.faz.net/**',
            'http://www.srf.ch/**'
        ]);
    })
    .controller('NavCtrl', ['$scope', '$rootScope', '$location', '$mdSidenav', '$window', function ($scope, $rootScope, $location, $mdSidenav, $window) {
        $scope.openLeftMenu = function () {
            $mdSidenav('left').toggle();
        };
        $scope.isNews = function () {
            return $location.path() === "/news";
        };
        $scope.isAbout = function () {
            return $location.path() === "/about";
        };
        $scope.isContact = function () {
            return $location.path() === "/contact";
        };
        $scope.search = function () {
            // Does a Google news search in a new browser tab
            $window.open('https://www.google.com/search?q=' + $rootScope.title + '&tbm=nws&*', '_blank');
        };
        $scope.source = function () {
            // Does a Google news search in a new browser tab
            $window.open($rootScope.site, '_blank');
        };
    }]);