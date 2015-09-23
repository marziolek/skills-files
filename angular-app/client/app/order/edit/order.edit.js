'use strict';

angular.module('cleanAppApp')
  .config(function ($stateProvider) {
  $stateProvider
    .state('order-details.edit', {
    url: '/edit',
    templateUrl: 'app/order/edit/order.edit.html',
    controller: 'OrderEditCtrl'
  });
});