'use strict';

angular.module('cleanAppApp')
  .config(function ($stateProvider) {
  $stateProvider
    .state('order', {
    url: '/order',
    templateUrl: 'app/order/order.html',
    controller: 'OrderCtrl'
  })
    .state('order.step-2', {
    url: '/step-2',
    templateUrl: 'app/order/step-2.html',
    controller: 'OrderCtrl'
  })
    .state('order.step-3', {
    url: '/step-3',
    templateUrl: 'app/order/step-3.html',
    controller: 'OrderCtrl'
  });
});