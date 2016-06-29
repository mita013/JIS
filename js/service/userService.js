'use strict';

app.service('userService', ['$http', '$location', function($http,$location){

    this.get_by_id = function(id){
        var url_    = 'data/ajax/user/getUserById.php' ;
        var params_ = {'id': id} ;

        return $http.get(url_, {'params': params_}) ;
    };
    

    this.get_cv = function(id){
        var url_    = 'data/ajax/user/getCV.php' ;
        var params_ = {'id': id} ;

        return $http.get(url_, {'params': params_}) ;
    };

    this.get_loker = function(){
        return $http.get('data/ajax/user/getLoker.php') ;
    };

    //menambahkan data cv ke database
    this.simpan = function(data){
        return $http.post('data/ajax/user/simpan.php', data);
    };

    this.infoComp = function(data){
        return $http.post('data/ajax/user/infoComp.php', data);
    };

    //menambahkan data loker ke database
    this.user_tambah = function(data){
    	return $http.post('data/ajax/user/tambah.php', data);
    }

    this.lihatLoker = function(data){
        return $http.post('data/ajax/user/lihatLoker.php', data);
    }

    this.lihatCV = function(data){
        return $http.post('data/ajax/user/lihatCV.php', data);
    }

    //menampilkan data perusahaan
    this.profilc = function(username){
        var url_    = 'data/ajax/user/profilc.php' ;
        var params_ = {'username': username} ;

        return $http.get(url_, {'params': params_}) ;
    };

    //menampilkan cv personal
    this.profilp = function(username){
        var url_    = 'data/ajax/user/profilp.php' ;
        var params_ = {'username': username} ;

        return $http.get(url_, {'params': params_}) ;
    };
    this.myLoker = function(username){
        var url_    = 'data/ajax/user/myLoker.php' ;
        var params_ = {'username': username} ;

        return $http.get(url_, {'params': params_}) ;
    };

    //mengupdate data perusahaan
    this.klikEdit = function(data){
        return $http.post('data/ajax/user/klikEdit.php', data);
    }

    //mengupdate cv personal
    this.editCV = function(data){
        return $http.post('data/ajax/user/editCV.php', data);
    }

    //mencari loker berdasarkan input oleh user
    this.cariLoker = function(data){
        return $http.post('data/ajax/user/cariLoker.php', data);
    }

}]);