var app = angular.module('myApp', []);
app.controller('myController', function($scope) {

  $scope.date = "";
  
  $scope.test = function(){
    console.log('Hello');
  };

});

