'use strict';

angular.module('cleanAppApp')
  .controller('OrderEditCtrl', function ($scope, Order) {  

  $scope.order = $scope.order || {
    type : undefined
  };
  $scope.order.extras = $scope.order.extras || {
    fridge : undefined,
    dishes : undefined,
    toilet : undefined
  };
  $scope.order.person = $scope.order.person || {
    fullname : undefined,
    email : undefined,
    street : undefined,
    streetNumber : undefined,
    apartment : undefined,
    city : undefined
  };
  $scope.order.payment = $scope.order.payment || {
    name : $scope.order.person.fullname
  };

  $scope.order.datetime = $scope.order.datetime || '';
  
  //datatime
  $scope.$watch('order.datetime', function(dt) {
    $scope.order.datetime = dt;
  });

  $scope.createOrder = function() {

    var type = $scope.order.type; 
    var extras = $scope.order.extras; 
    var person = $scope.order.person;
    var time = $scope.order.datetime;
    
    console.log(type);
    console.log(extras);
    console.log(person);
    console.log(time);
    Order.createOrder(
      type,
      extras,
      person,
      time
    ).then(function(result) {
      console.log('Parse: ')
      console.log(result);
    });
  };
});

