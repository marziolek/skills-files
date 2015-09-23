//Mailing notifications
var _ = require('underscore');

var Mandrill = require('mandrill');
Mandrill.initialize('APIkey');

Parse.Cloud.define('sendOrderConfirmation', function(request, response) {

  var email = request.params.email;
  var fullname = request.params.fullname;
  
  var orderNumber = request.params.orderNumber;

  var emailFirstPart = email.substring(0, email.indexOf("@"));
  //temoporary url
  var orderURL = '<a href="http://localhost:9000/order/' + emailFirstPart + '/' + orderNumber + '">' + orderNumber + '</a>';
  
  Mandrill.sendTemplate({
    template_name: 'order-confirmation',
    template_content: [{
      name: 'orderNumber',
      content: orderNumber
    }, {
      name: 'orderURL',
      content: orderURL
    }],
    message: {
      subject: "Order #"+ orderNumber +" confirmation",
      to: [{
        email: email,
        name: fullname
      }]
    },
    async: true
  },{
    success: function(httpResponse) {
      response.success('Email sent!');
    },
    error: function(httpResponse) {
      response.error('Uh oh, something went wrong');
    }
  });

});
