'use strict';

function test2() {
    console.error("HALP WHY IT NO WORK");
}

angular.module('resonance.news', ['ngRoute'])
    .controller('NewsCtrl', ['$scope', '$rootScope', '$http', '$window', function ($scope, $rootScope, $http, $window) {
        $scope.articles = null;
        $scope.update = function () {
            $scope.update = function () {
                $http.get('/backend/api/articles?limit=16').then(function (res) {
                    $scope.articles = res.data;
                })
            };
        };
        $scope.test = function () {
            console.log("test");
        };
        $scope.viewStory = function (path) {
            $window.open(path, '_blank');
        };
        // Don't ask. It works. It makes three requests.
        $scope.update();
        $scope.update();
        $rootScope.page = "News"
    }]);