<?php
	$input = json_decode(file_get_contents('php://input'));
	require_once '../../model/ClsConnection.php';
	require_once '../../model/ClsUser.php';
	require_once '../../user/User.php';

	try {

		$user  = new User() ;
		$oUser = new ClsUser() ;

			//$user->setId($input->id) ;
			//$user->setId($_GET['id']);
			$user->setNama_lengkap($input->nama_lengkap);
			$user->setTempat_Tanggal_Lahir($input->ttl);
			$user->setNomor_Telepon($input->no_tlp);
			$user->setAgama($input->agama);
			$user->setAlamat($input->alamat);
			$user->setemail($input->email);
			$user->setJurusan($input->jurusan);
			$user->setAngkatan($input->angkatan);
			$user->setAsal_Sekolah($input->asal_sekolah);
			$user->setJenis_kelamin($input->jenis_kelamin);
			$data = $oUser->simpan($user) ;

			/*$user->setNama_Lengkap('vira');
			$user->setTempat_Tanggal_Lahir('17 juli 1997');
			$user->setNomor_Telepon('0898');
			$user->setAgama('islam');
			$user->setAlamat('blora');
			$user->setemail('vira@gmail.com');
			$user->setJurusan('tkj');
			$user->setAngkatan('2014');
			$user->setAsal_Sekolah('smk 1 blora');
			$user->setJenis_kelamin('perempuan');
			$data = $oUser->simpan($user) ;*/


		if ( $data=true ) {

	        $res = array('msg' => '', 'error' => false, 'data' => $data);
	        $jsn = json_encode($res);
	        print_r($jsn);
		}
		else{
		    $res = array('msg' => '', 'error' => true, 'data' => array());
		    $jsn = json_encode($res);
		    print_r($jsn);
		}
	}
	catch (Exception $e) {
	    $res = array('msg' => $e->getMessage(), 'error' => true, 'data' => array());
	    $jsn = json_encode($res);
	    print_r($jsn);
	}

