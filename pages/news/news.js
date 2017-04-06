'use strict';

function test2() {
    console.error("HALP WHY IT NO WORK");
}

angular.module('resonance.news', ['ngRoute'])
    .controller('NewsCtrl', ['$scope', '$rootScope', '$http', function ($scope, $rootScope, $http) {
        $scope.update = function () {
            $scope.valid = true;
            $rootScope.site = '';
            $rootScope.title = '';
            $scope.update = function () {
                $http.get('/backend/api/articles?limit=1').then(function (res) {
                    $scope.valid = res.data[0].xframe;
                    console.info($scope.valid);
                    $rootScope.site = res.data[0].url;
                    $rootScope.title = res.data[0].title;
                })
            };
        };

        $scope.test = function () {
            console.log("test");
            $scope.valid = false;
        };

        // Don't ask. It works. It makes three requests.
        $scope.update();
        $scope.update();
        $rootScope.page = "News"
    }]);