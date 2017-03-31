'use strict';

angular.module('resonance.about', ['ngRoute'])
    .controller('AboutCtrl', ['$scope', '$rootScope', function ($scope, $rootScope) {
        $rootScope.page = "About"
    }]);