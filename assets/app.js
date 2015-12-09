var app = angular.module('myApp', []);
app.controller('myController', function($scope) {

  $scope.test = 0;
  $scope.count = 0;
  $scope.wal = false;
  var today = new Date();
  $scope.month = today.getMonth() + 1;
  $scope.year = today.getFullYear();
  var year = ""+$scope.year;
  if($scope.month<10) {
    $scope.month ='0'+$scope.month;
  }
  $scope.year = parseInt(year.slice(2));
  
  $scope.counting = function(){
    $scope.count =  $scope.count + 1;
  };

  $scope.test = function(){
    if ($scope.sp==true) {
      $scope.sp=false;  
    }else{
      $scope.sp=true;
    }
  }

  $scope.due = function(){
    // if($scope.count==10){
    //    $scope.count=0;
        if($scope.choice==1){
          //2 Days
          var tt = $scope.date_received;

          var date = new Date(tt);
          var newdate = new Date(date);
          var newdate2 = new Date(date);

          newdate.setDate(newdate.getDate() + 2);
          newdate2.setDate(newdate.getDate() - 2);
          // if(newdate.getDay() == 6){

          // }
          // if(newdate.getDay() == 0){
            
          // }
          var dd = newdate.getDate();
          var mm = newdate.getMonth() + 1;
          var y = newdate.getFullYear();

          if(dd<10) {
              dd='0'+dd
          } 
          if(mm<10) {
              mm='0'+mm
          } 
          var today2 = y+'-'+mm+'-'+dd;
          $scope.slow = today2;

          dd = newdate2.getDate();
          mm = newdate2.getMonth() + 1;
          y = newdate2.getFullYear();
          
          if(dd<10) {
              dd='0'+dd
          } 
          if(mm<10) {
              mm='0'+mm
          } 
          today2 = y+'-'+mm+'-'+dd;
          $scope.follow = today2;
        }
        else if($scope.choice==2){
        //3 Days
        var tt = $scope.date_received;

        var date = new Date(tt);
        var newdate = new Date(date);
        var newdate2 = new Date(date);

        newdate.setDate(newdate.getDate() + 3);
        newdate2.setDate(newdate.getDate() - 2);
          
        var dd = newdate.getDate();
        var mm = newdate.getMonth() + 1;
        var y = newdate.getFullYear();
        if(dd<10) {
            dd='0'+dd
        } 
        if(mm<10) {
            mm='0'+mm
        } 
        var today2 = y+'-'+mm+'-'+dd;
        $scope.slow = today2;
        dd = newdate2.getDate();
        mm = newdate2.getMonth() + 1;
        y = newdate2.getFullYear();
          
        if(dd<10) {
          dd='0'+dd
        } 
        if(mm<10) {
          mm='0'+mm
        }

        today2 = y+'-'+mm+'-'+dd;
        $scope.follow = today2;
      }

      else if($scope.choice==0){
        $scope.slow = "";
      }

      else if($scope.choice==3){
      //5 Days
        var tt = $scope.date_received;

        var date = new Date(tt);
        var newdate = new Date(date);
        var newdate2 = new Date(date);

        newdate.setDate(newdate.getDate() + 5);
        newdate2.setDate(newdate.getDate() - 2);
          
        var dd = newdate.getDate();
        var mm = newdate.getMonth() + 1;
        var y = newdate.getFullYear();
        if(dd<10) {
            dd='0'+dd
        } 
        if(mm<10) {
            mm='0'+mm
        } 

        var today2 = y+'-'+mm+'-'+dd;

        $scope.slow = today2;

        dd = newdate2.getDate();
        mm = newdate2.getMonth() + 1;
        y = newdate2.getFullYear();
          
        if(dd<10) {
          dd='0'+dd
        } 
        if(mm<10) {
          mm='0'+mm
        }

        today2 = y+'-'+mm+'-'+dd;
        $scope.follow = today2;
    }
    else{
      $scope.slow = "No due date";
      $scope.follow = "0000-00-00"
    }
  // }
  };
});

