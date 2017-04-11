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
        }).otherwise({redirectTo: '/news'});
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
            'http://www.faz.net/**',
            'https://www.srf.ch/**',
            'http://www.srf.ch/**',
            'https://www.theguardian.com/**'
        ]);
    })
    .controller('NavCtrl', ['$scope', '$rootScope', '$location', '$mdSidenav', '$window', function ($scope, $rootScope, $location, $mdSidenav, $window) {
        $scope.toggleLeftMenu = function () {
            $mdSidenav('left').toggle();
        };
        $scope.navigateLocal = function (path) {
            $window.open(path, '_self');
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
        $scope.getNavClass = function (target) {
            if (target === "/news" && $scope.isNews()) {
                return "nav-active";
            } else if (target === "/about" && $scope.isAbout()) {
                return 'nav-active';
            } else if (target === "/contact" && $scope.isContact()) {
                return 'nav-active';
            } else {
                return '';
            }
        }
    }]);