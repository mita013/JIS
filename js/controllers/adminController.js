'use strict';

app.controller('AdminController', function($scope, loginService, userService, $location, $window){
	$scope.msgtxt = '';
    function getUser(){
		loginService.getSession().then(
            function(response) {
				var id = response.data ;
				if (id === '') {
					$location.path('/login') ;
				}
				else{
					userService.get_by_id(id).then(
						function(response){
							if (response.data.error == true) {
								$scope.msgtxt = response.data.msg;
							}
							else{
								$scope.user = response.data.data;
								concole.log($scope.user);
							}
						}
					);
				}
            }
		);
    };

    getUser() ;

    $scope.logout = function(){
        loginService.logout();
    }

    $scope.simpan = function(data){
    		console.log('simpan');
            userService.simpan(data).then(
            function(response){
                if(response.data.error){
                    $scope.msgtxt = response.data.msg;
                }else{
                    $window.alert('Selamat, Anda berhasil mendaftar!');
                    $scope.cv = response.data.data;
                }
            }
        );
    }
});