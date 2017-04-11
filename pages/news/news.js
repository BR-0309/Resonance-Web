'use strict';

function test2() {
    console.error("HALP WHY IT NO WORK");
}

angular.module('resonance.news', ['ngRoute'])
    .controller('NewsCtrl', ['$scope', '$rootScope', '$http', '$window', function ($scope, $rootScope, $http, $window) {
        $scope.articles = null;
        $scope.update = function () {
            $scope.update = function () {
                $http.get('/backend/api/articles?limit=8').then(function (res) {
                    if ($scope.articles == null) {
                        $scope.articles = res.data;
                    } else {
                        $scope.articles = $scope.articles.concat(res.data);
                    }
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
    }]).directive('scroll', function () {

    return {

        restrict: 'A',
        link: function (scope, elem, attrs) {
            $(window).scroll(function () {
                var body = document.body,
                    html = document.documentElement;
                // Compatibility
                var height = Math.max(body.scrollHeight, body.offsetHeight,
                    html.clientHeight, html.scrollHeight, html.offsetHeight);
                if ($(this).scrollTop() >= height - 1000) {
                    scope.update();
                }
            });
        }

    }

});