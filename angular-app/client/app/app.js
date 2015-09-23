'use strict';

angular.module('cleanAppApp', [
  'ngCookies',
  'ngResource',
  'ngSanitize',
  'ui.router',
  'pascalprecht.translate',
  'ui.mask',
  'datePicker'
])
  .config(function ($stateProvider, $urlRouterProvider, $locationProvider, $translateProvider) {
  $urlRouterProvider
    .otherwise('/');

  $locationProvider.html5Mode(true);

  //init parse - TODO keys to other file
  Parse.initialize('APIkey', 'JSkey');

  //translations
  $translateProvider.useStaticFilesLoader({
    prefix: 'assets/translations/',
    suffix: '.json'
  });

  $translateProvider.useSanitizeValueStrategy('escape');

  $translateProvider.preferredLanguage('pl');

});