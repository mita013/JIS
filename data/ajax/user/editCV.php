<?php
	$input = json_decode(file_get_contents('php://input'));
	require_once '../../model/ClsConnection.php';
	require_once '../../model/ClsUser.php';
	require_once '../../user/User.php';

	try {
		$user  = new User() ;
		$oUser = new ClsUser() ;

		$user->setusername($input->username);
		$user->setNama_Lengkap($input->nama_lengkap);
		$user->setTempat_Tanggal_Lahir($input->ttl);
		$user->setNomor_Telepon($input->no_tlp);
		$user->setagama($input->agama);
		$user->setAlamat($input->alamat);
		$user->setAsal_Sekolah($input->asal_sekolah);
		$user->setemail($input->email);
		$user->setJurusan($input->jurusan);
		$user->setAngkatan($input->angkatan);
		$user->setJenis_Kelamin($input->jenis_kelamin);
		$data = $oUser->editCV($user);

		/*$user->setusername('tasya');
		$user->setNama_Lengkap('Tasya Nurani');
		$user->setTempat_Tanggal_Lahir('Jakarta, 19 Agustus 1999');
		$user->setNomor_Telepon('3983');
		$user->setagama('Islam');
		$user->setAlamat('Jakarta');
		$user->setAsal_Sekolah('SMK N 109 Jakarta');
		$user->setemail('tasyanurani@gmail.com');
		$user->setJurusan('Akuntansi');
		$user->setAngkatan('2013');
		$user->setJenis_Kelamin('perempuan');
		$data = $oUser->editCV($user);*/

		if ( $data==true ) {

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

