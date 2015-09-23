'use strict';

angular.module('cleanAppApp')
  .service('Order', function ($q) {
  //order CRUD
  return {
    createOrder : function(type, extras, person, time) {
      var q = $q.defer();

      Parse.Cloud.run('createOrder', {
        type: type, 
        extrasFridge: extras.fridge, 
        fullname: person.fullname, 
        email: person.email, 
        street: person.street, 
        streetNumber: person.streetNumber, 
        apartment: person.apartment, 
        city: person.city,
        time: time
      }).then( function(result) {
        q.resolve(result);
      });

      return q.promise;
    },
    getOrder : function(orderId, name) {
      var q = $q.defer();

      Parse.Cloud.run('getOrder', {orderId: orderId, name: name}).then( function(result) {
        q.resolve(result);
      });

      return q.promise;
    },
    /* sendMail() is test function */
    sendMail : function(user) {
      var q = $q.defer();

      console.log(user);

      Parse.Cloud.run('sendOrderConfirmation', {
        fullname: user.fullname,
        email: user.email
      }).then( function(result) {
        q.resolve(result);
      });

      return q.promise;
    }
    /* /sendMail() */
    ,





    removeOrder : function(orderId) {
      var q = $q.defer();

      Parse.Cloud.run('removeOrder', {orderId: orderId}).then( function(result) {
        q.resolve(result);
      });

      return q.promise;
    },
    updateOrder : function(orderId, orderName, isOutside, isEmergency) {
      var q = $q.defer();

      Parse.Cloud.run('updateOrder', {orderId: orderId, ordername: orderName, outside: isOutside, emergency: isEmergency}).then( function(result) {
        q.resolve(result);
      });

      return q.promise;
    }
  }

});
