var app = angular.module('myApp', []);
app.controller('myController', function($scope) {

  $scope.date = "";

  $scope.fuck = function(){
    var today = new Date();

    if($scope.date==1){
      //2 Days
      today.setDate(today.getDate() + 2); 
      var dd = today.getDate();
      var mm = today.getMonth()+1;
      var yyyy = today.getFullYear();
      if(dd<10) {
          dd='0'+dd
      } 
      if(mm<10) {
          mm='0'+mm
      } 
      var today2 = yyyy+'-'+mm+'-'+dd;
      $scope.slow = today2;
    }

    else if($scope.date==2){
      //3 Days
      today.setDate(today.getDate() + 3);
      var dd = today.getDate();
      var mm = today.getMonth()+1;
      var yyyy = today.getFullYear();
      if(dd<10) {
          dd='0'+dd
      } 
      if(mm<10) {
          mm='0'+mm
      } 
      var today2 = yyyy+'-'+mm+'-'+dd;
      $scope.slow = today2;
    }

    else if($scope.date==3){
      //10 Days
      today.setDate(today.getDate() + 5);
      var dd = today.getDate();
      var mm = today.getMonth()+1;
      var yyyy = today.getFullYear();
      if(dd<10) {
          dd='0'+dd
      } 
      if(mm<10) {
          mm='0'+mm
      } 
      var today2 = yyyy+'-'+mm+'-'+dd;
      $scope.slow = today2
    }

    else{
      $scope.slow = "No due date";
    }

    

  };

});

