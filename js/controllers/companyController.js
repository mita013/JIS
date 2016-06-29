'use strict';

app.controller('CompanyController', function($scope, loginService, userService, $location, $window){
	$scope.msgtxt = '';
    function getUser(){
		loginService.getSession().then(
            function(response) {
				var id = response.data ;
                var username = response.data;
                console.log(username);
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
								console.log($scope.user);
                                $scope.quantity = 1;
							}
						}
					);
                    userService.get_cv(id).then(
                        function(response){
                            if (response.data.error == true) {
                                $scope.msgtxt = response.data.msg;
                            }
                            else{
                                $scope.cv = response.data.data;
                                console.log($scope.cv);
                                $scope.quantity = 1;
                            }
                        }
                    );
                    userService.profilc(username).then(
                        function(response){
                            if (response.data.error == true) {
                                $scope.msgtxt = response.data.msg;
                            }
                            else{
                                $scope.company = response.data.data;
                                console.log($scope.company);
                                $scope.quantity = 1;
                            }
                        }
                    );
                    userService.myLoker(username).then(
                        function(response){
                            if (response.data.error == true) {
                                $scope.msgtxt = response.data.msg;
                            }
                            else{
                                $scope.lowongan = response.data.data;
                                console.log($scope.lowongan);
                                $scope.quantity = 1;
                            }
                        }
                    );
                    $scope.refresh = function(){
                        userService.myLoker(username)
                        .then(function(response){
                            if (response.data.error == true) {
                                $scope.msgtxt = response.data.msg;
                            }
                            else{
                                $scope.lowongan = response.data.data;
                                console.log($scope.lowongan);
                                $scope.quantity = 1;
                            }
                        })
                    };
				}
            }
		);
    };

    getUser() ;

    $scope.logout = function(){
        loginService.logout();
    }

    $scope.tambah = function(data){
        console.log(data);
        loginService.tambah(data).then(
            function(response){
                if ( response.data.error ) {
                    $scope.pesan = response.data.msg;
                    console.log('gagal');
                    $window.alert($scope.pesan);
                }
                else{
                    console.log('berhasil');
                    $scope.pesan = response.data.data.test;
                    console.log(response.data.data.test);
                    $window.alert('Lowongan Pekerjaan berhasil ditambahkan');
                    $scope.beranda = true;
                    $scope.tambahl = false;
                    $scope.refresh();
                }
            }
        );
    };

    $scope.klikEdit = function(data){
        console.log(data.username);
        userService.klikEdit(data).then(
            function(response){
                if ( response.data.error ) {
                    $scope.pesan = response.data.msg;
                    console.log('gagal');
                    $window.alert($scope.pesan);
                }
                else{
                    console.log('berhasil');
                    /*$scope.pesan = response.data.data.test;
                    console.log(response.data.data.test);*/
                    $window.alert('berhasil');
                    $scope.thisedit = false;
                }
            })
    }

    $scope.lihatCV = function(data){
        userService.lihatCV(data).then(
                function(response){
                    if(response.data.error){
                        $scope.pesan = response.data.msg;
                        console.log('gagal');
                        $window.alert($scope.pesan);
                    }else{
                        $scope.hasilCV = response.data.data;
                        console.log($scope.hasilCV);
                        $scope.formCV = true;
                    }
                }
            )
    }

});