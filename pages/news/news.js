'use strict';

angular.module('resonance.news', ['ngRoute'])
    .controller('NewsCtrl', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.update = function () {
            $rootScope.site = '';
            $rootScope.title = '';
            $scope.update = function () {
                $http.get('/backend/api/articles?limit=1').then(function (res) {
                    $rootScope.site = res.data[0].url;
                    $rootScope.title = res.data[0].title;
                    console.log("executed");
                })
            };
        };
        // Don't ask. It works. It makes three requests.
        $scope.update();
        $scope.update();
        $rootScope.page = "News"
    }]);