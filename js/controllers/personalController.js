'use strict';

app.controller('PersonalController', function($scope, $http, loginService, userService, $location, $window){
	$scope.msgtxt = '';
    function getUser(){
		loginService.getSession().then(
            function(response) {
				var id = response.data ;
                var username = response.data;
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

                    userService.get_loker().then(
                        function(response){
                            if (response.data.error == true) {
                                $scope.msgtxt = response.data.msg;
                            }
                            else{
                                $scope.loker = response.data.data;
                                console.log($scope.loker);
                                $scope.quantity = 5;
                            }
                        }
                    );
                    
                    userService.profilp(username).then(
                        function(response){
                            if (response.data.error == true) {
                                $scope.msgtxt = response.data.msg;
                            }
                            else{
                                $scope.personal = response.data.data;
                                console.log($scope.personal);
                                $scope.quantity = 1;
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
    		console.log(data);
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

    $scope.editCV = function(data){
        console.log(data.username);
        userService.editCV(data).then(
            function(response){
                if ( response.data.error ) {
                    $scope.pesan = response.data.msg;
                    console.log('gagal');
                    $window.alert($scope.pesan);
                }
                else{
                    console.log('berhasil');
                    $window.alert('berhasil');
                    $scope.formedit = false;
                }
            })
    }

    $scope.cariLoker = function(data){
        userService.cariLoker(data).then(
            function(response){
                if ( response.data.error ) {
                    $scope.pesan = response.data.msg;
                    console.log('gagal');
                    $window.alert('Maaf kata kunci yang Anda masukkan tidak sesuai dengan data  lowongan pekerjaan kami.');
                }
                else{
                    console.log('berhasil');
                    $scope.hasilCari = response.data.data;
                    console.log($scope.hasilCari);
                    $scope.formcari = true;
                }
            });
    }

    $scope.infoComp = function(data){
        userService.infoComp(data).then(
            function(response){
                if ( response.data.error ) {
                    $scope.pesan = response.data.msg;
                    console.log('gagal');
                    $window.alert('Maaf data tidak ada');
                }
                else{
                    console.log('berhasil');
                    $scope.hasilInfo = response.data.data;
                    console.log($scope.hasilInfo);
                    $scope.forminfo = true;
                }
            });
    }

    $scope.infoCompcari = function(data){
        userService.infoComp(data).then(
            function(response){
                if ( response.data.error ) {
                    $scope.pesan = response.data.msg;
                    console.log('gagal');
                    $window.alert('Maaf data tidak ada');
                }
                else{
                    console.log('berhasil');
                    $scope.hasilInfocari = response.data.data;
                    console.log($scope.hasilInfocari);
                    $scope.forminfocari = true;
                }
            });
    }

    $scope.lihatLoker = function(data){
        userService.lihatLoker(data).then(
                function(response){
                    if(response.data.error){
                        $scope.pesan = response.data.msg;
                        console.log('gagal');
                        $window.alert($scope.pesan);
                    }else{
                        $scope.hasilLoker = response.data.data;
                        console.log($scope.hasilLoker[0].keterangan);
                        $scope.keterangan = $scope.hasilLoker[0].keterangan;
                        $scope.persyaratan = $scope.hasilLoker[0].persyaratan;
                        $scope.formhasil = true;
                        $scope.forminfo = false;
                    }
                }
            )
    }

    $scope.lihatCari = function(data){
        userService.lihatLoker(data).then(
                function(response){
                    if(response.data.error){
                        $scope.pesan = response.data.msg;
                        console.log('gagal');
                        $window.alert($scope.pesan);
                    }else{
                        $scope.siLoker = response.data.data;
                        console.log($scope.siLoker);
                        $scope.terang = $scope.siLoker[0].keterangan;
                        $scope.syarat = $scope.siLoker[0].persyaratan;
                        $scope.formlihat = true;
                        $scope.forminfocari = false;
                    }
                }
            )
    }

    $scope.perbarui = function(){
        $scope.cv = true;
        $scope.formedit = true;
        $scope.beranda = false;
    }
});

app.
  filter('split', function() {
    return function(input, delimiter) {
      var delimiter = delimiter || ',';

      return input.split(delimiter);
    } 
  });