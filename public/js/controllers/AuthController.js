app.controller('AuthController', ['$scope', '$http', '$location', '$window', 'AuthService', 'CatererAccountModel','$uibModal','toastr',
  function ($scope, $http, $location, $window, AuthService, CatererAccountModel,$uibModal,toastr) {
    
    // redirect to home, if loged in
    AuthService.auth_check('user').then(function(response){
        if(response.data.success == 1){
            $location.path('/');
        }
    });

    AuthService.auth_check('caterer').then(function(response){
        if(response.data.success == 1){
            $location.path('/');
        }
    });

    
    //get some data for registration page
    if($location.path() == '/register') {
        CatererAccountModel.getRegister().then(function (response) {
            $scope.zip_codes = response.data.zip_codes;
            $scope.categories = response.data.categories;
            $scope.countries = response.data.countries;
            console.log( $scope.countries );
        });
    }

    $scope.selectCountry = function($select, $model)
    {
        $scope.selectedCountry = $model.id;
    }

    // submit registration form
    $scope.reg_submit = function(){

        event.preventDefault();

        var role = $scope.data.role;
        if($scope.data.zip) {
            $scope.data.zip = $scope.data.zip.id;
        }
        else{
            $scope.data.zip = ''
        }

        if($scope.selectedCountry) {
            $scope.data.country = $scope.selectedCountry;
        }
        else{
            $scope.data.country = ''
        }
        
        $http({
            data: $scope.data,
            method : "POST",
            url : "auth/register"
        }
        ).success(function (response) {
            if(response.success == 1){
                $location.path(role+'/orders');
            }
        }).error( function (error) {
            if(role == 'user'){
                $scope.user_error = error;
            }
                else{
                if(role == 'caterer'){
                    $scope.caterer_error = error;
                }
            }

        });
    };

    // submit login form
    $scope.login_submit = function(){
        event.preventDefault();
        var role = $scope.data.role;
        $http({
                data: $scope.data,
                method : "POST",
                url : "auth/login"
            }
        ).success(function (response) {
            if(response.success == 1){
                $location.path(role+'/orders');
            }
            else{
                if(response.success == 0){
                    if(role == 'user') {
                        $scope.user_error = '';
                        $scope.user_error_msg = 1;
                        $scope.user_error_msg_text = 'Incorrect Username/Password';
                    }
                    else{
                        if(role == 'caterer'){
                            $scope.caterer_error = '';
                            $scope.caterer_error_msg = 1;
                            $scope.caterer_error_msg_text = 'Incorrect Username/Password';
                        }
                    }
                }
            }
        }).error( function (error) {
            if(role == 'user') {
                $scope.user_error_msg = 0;
                $scope.user_error = error;
            }
            else{
                if(role == 'caterer'){
                    $scope.caterer_error_msg = 0;
                    $scope.caterer_error = error;
                }
            }
        });
    }



    $scope.animationsEnabled = true;
    $scope.open = function (size,role) {
        console.log(123);
        var modalInstance = $uibModal.open({
            animation: $scope.animationsEnabled,
            templateUrl: 'myModalContent.html',
            controller: 'ResetPasswordModalInstanceCtrl',
            size: size,
        });

        modalInstance.result.then(function (email) {
            console.log(email);
            data ={
                role:role,
                email:email,
            }

            $http({
                    data: data,
                    method : "POST",
                    url : "auth/passwordReset/checkEmailExists"
                }
            ).then(
                function(response){
                if (response.data.success) {
                    console.log(response.data);
                    toastr.success(response.data.message);
                }
                else {
                    console.log(response.data)
                    toastr.error(response.data.error, 'Error');
                }
            },
            function (error) {
                $scope.errorMessages(error.data);
            });
            console.log('sax lava');

        }, function () {
            console.log('Modal dismissed at: ' + new Date());
        });
    };

      $scope.initFunction= function() {

          if ($location.search().role) {
              console.log('reset');

              $scope.role = $location.search().role;
              $scope.email = $location.search().email;
              console.log($scope.role);
          }
      }

      $scope.changePassword = function(){
          data={
              password:$scope.password,
              password_confirmation:$scope.password_confirmation,
              email:$scope.email,
              role:$scope.role ,
          };

          console.log(data);

          $http({
                  data: data,
                  method : "POST",
                  url : "auth/passwordReset/reset",
              }
          ).then(
              function(response){
                  if(response.data.success)
                      $location.path($scope.role+'/orders')
              }
          );
          
          
      }

      $scope.errorMessages = function (errors) {
          var data = "";
          angular.forEach(errors, function (value, key) {
              data += value + "<br/>";
          }, data);
          toastr.error(data, 'Error');
      };
}]);
