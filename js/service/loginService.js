'use strict';

app.service('loginService', ['$http', '$location', '$q', function($http, $location, $q){

	this.login = function(data){

        //alert('test');
        return $http.post('data/ajax/user/login.php', data);
	};

    
    this.jumlah_loker = function(){
        return $http.get('data/ajax/user/jumlah_loker.php') ;
    };
    
    this.daftar = function(data){
        return $q.all([
            $http.post('data/ajax/user/daftar.php', data),
            $http.post('data/ajax/user/daftarp.php', data)
        ]);
    };

    this.daftarc = function(data){
        return $q.all([
            $http.post('data/ajax/user/daftar.php', data),
            $http.post('data/ajax/user/daftarc.php', data)
        ]);
    };

    //menambahkan data loker ke database
    this.tambah = function(data){
        return $http.post('data/ajax/user/tambah.php', data);
    }

	this.isLogin = function(){
        $http.get('data/ajax/user/isLogin.php').then(
            function(response){
                if (response.data === '') {
                    $location.path('/login') ;
                }
            }
        );
	};

    this.getSession = function(){
        return $http.get('data/ajax/user/isLogin.php');
    };

	this.logout = function(){
        $http.get('data/ajax/user/logout.php').then(
            function(response){
                $location.path('/login');
            }
        );
	};

}]);