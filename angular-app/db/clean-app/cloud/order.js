var _ = require('underscore');

Parse.Cloud.define('createOrder', function(request, response) {

  var fullname = request.params.fullname;
  var email = request.params.email;

  var order = Parse.Object.extend('Order');
  var newOrder = new order();

  newOrder.set('type', request.params.type);
  newOrder.set('extrasFridge', request.params.extrasFridge);
  newOrder.set('fullname', fullname);
  newOrder.set('email', email);
  newOrder.set('street', request.params.street);
  newOrder.set('streetNumber', request.params.streetNumber);
  newOrder.set('apartment', request.params.apartment);
  newOrder.set('city', request.params.city);
  newOrder.set('time', request.params.time);

  newOrder.save(null, {
    success: function(newOrder) {
      Parse.Cloud.run('sendOrderConfirmation', {
        fullname: fullname,
        email: email,
        orderNumber: newOrder.id
      }).then( function(result) {
        response.success(result);
      }, function(error) {
        response.success(error);
      });
    },
    error: function(newOrder, error) {
      response.success(error);
    }
  });

});

Parse.Cloud.define('getOrder', function(request, response) {
  var orderId = request.params.orderId;
  var name = request.params.name;

  var order  = new Parse.Query('Order');
  order.equalTo('objectId', orderId);

  order.get(orderId, {
    success: function(object) {
      var fullEmail = object.attributes.email;
      var emailFirstPart = fullEmail.substring(0, fullEmail.indexOf("@"));

      if(name == emailFirstPart) {
        response.success(object.attributes);
      } else {
        response.success('nope');
      }
    }, 
    error: function(error) {
      response.success(error);
    }
  });

});






Parse.Cloud.define('removeOrder', function(request, response) {
  var orderId = request.params.orderId;
  var orders = new Parse.Query('Order');
  orders.equalTo('objectId', orderId);

  orders.first({
    success: function(object) {
      if (object) {
        object.set('f_removed', true);
        object.save(null, {
          success: function() {
            response.success(true);   
          }
        });
      } else {
        response.success(false);
      };
    },
    error: function(error) {
      response.success(error);
    }
  });
});

Parse.Cloud.define('updateOrder', function(request, response) {
  var orderId = request.params.orderId;
  var orders = new Parse.Query('Order');
  orders.equalTo('objectId', orderId);

  orders.first({
    success: function(object) {
      if (object) {
        object.set('ordername', request.params.ordername);
        object.set('f_emergency', request.params.emergency);
        object.set('f_outside', request.params.outside);
        object.save(null, {
          success: function(updatedObject) {
            response.success(updatedObject);
          }
        });
      } else {
        response.success(false);
      };
    },
    error: function(error) {
      response.success(error);
    }
  });
});