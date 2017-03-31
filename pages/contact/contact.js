'use strict';

angular.module('resonance.contact', ['ngRoute'])
    .controller('ContactCtrl', ['$scope', '$rootScope', function ($scope, $rootScope) {
        $rootScope.page = "Contact"
    }]);