'use strict';

angular.module('cleanAppApp')
  .controller('OrderDetailsCtrl', function ($scope, $stateParams, Order) {  

  var user = $stateParams.user;
  $scope.orderId = $stateParams.orderId;
  
  var order = function(orderId, name) {
    Order.getOrder(orderId, name).then( function(result) {
      console.log(result);
      $scope.username = result.fullname;
      $scope.orderTime = result.createdAt;
    });
  }
  
  order($scope.orderId, user);
  
});

