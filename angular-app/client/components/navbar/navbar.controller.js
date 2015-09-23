'use strict';

angular.module('cleanAppApp')
  .controller('NavbarCtrl', function ($scope, $location, $translate) {
  $scope.menu = [{
    'title': 'Home',
    'link': '/'
  }];

  $scope.isCollapsed = true;

  $scope.isActive = function(route) {
    return route === $location.path();
  };

  $scope.activeLang = 'pl';
  
  $scope.changeLanguage = function (lang) {
    $translate.use(lang);
    $scope.activeLang = lang;
  }
});