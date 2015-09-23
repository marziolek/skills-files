'use strict';

angular.module('cleanAppApp')
  .config(function ($stateProvider) {
  $stateProvider
    .state('order-details', {
    url: '/order/:user/:orderId',
    templateUrl: 'app/order/details/order.details.html',
    controller: 'OrderDetailsCtrl'
  });
});
