'use strict';

app.controller('LoginController', ['$window', '$scope','loginService','userService','$location', function ($window, $scope, loginService, userService,$location) {
	$scope.user = {'user':'','password':''}
    $scope.msgtxt = '';
    
    $scope.jumlahLoker = '';
    loginService.jumlah_loker().then(
        function(response){
            if(response.data.error == true) {
                $scope.msgtxt = response.data.msg;
            }else{
                $scope.jumlahLoker = response.data.data;
                console.log($scope.jumlahLoker);
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
    
    $scope.options = [" -- Tipe User -- ","Personal","Company"];
    console.log($scope.options[0]);
    
    console.log('helo');
    $scope.login = function(data){
        loginService.login(data).then(
            function(response){
                console.log(response.data.data);

              
                if ( response.data.error ) {
                	$scope.msgtxt = response.data.msg ;
                    $window.alert('Maaf Username atau Password yang Anda masukkan salah!');
                }
                else if(response.data.data[0].tipe == 'Personal'){
                	$location.path('/homePersonal') ;
                }else if(response.data.data[0].tipe == 'Company'){
                    $location.path('/homeCompany') ;
                }else if(response.data.data[0].tipe == 'admin'){
                    $location.path('/homeAdmin') ;
                }else{
                    $window.alert('Maaf Username atau Password yang Anda masukkan salah!');
                }
            }
        );
    };

    $scope.daftar = function(data){
        console.log(data.tipe);
        if(data.tipe == 'Company'){
            $scope.validcompany = true;
            $scope.klik = false;
            $scope.klikc = true;
            $scope.kliks = false;
        }else if(data.tipe == 'School'){
            $scope.validschool = true;
            $scope.klik = false;
            $scope.kliks = true;
            $scope.klikc = false;
        }else if(data.tipe == 'Personal'){
        loginService.daftar(data).then(
            function(response){
                if(response[0].data.error){
                    $scope.msgtxt = response.data.msg;
                }else{
                    $window.alert('Selamat, Anda berhasil mendaftar!');
                    $scope.login(data);
                }
            });
        }
    }

    $scope.daftarc = function(data){
        console.log(data.username);
        loginService.daftarc(data).then(
            function(response){
                if(response[0].data.error){
                    $scope.msgtxt = response.data.msg;
                }else{
                    console.log(data);
                    $window.alert('Selamat, Anda berhasil mendaftar!');
                    $scope.login(data);
                }
            }
        );
    }

    $scope.loginDulu = function(){
        $window.alert('Silakan login terlebih dahulu untuk melihat info lebih lengkap.');
    }

}]);