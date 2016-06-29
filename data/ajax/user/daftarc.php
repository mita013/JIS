<?php
	$input = json_decode(file_get_contents('php://input'));
	require_once '../../model/ClsConnection.php';
	require_once '../../model/ClsUser.php';
	require_once '../../user/User.php';

	try {

		$user  = new User() ;
		$oUser = new ClsUser() ;

		$user->setUsername($input->username);
		$user->setnama_perusahaan($input->nama);
		$user->setIndustri($input->industri);
		$user->setNomor_Telepon($input->telepon);
		$user->setno_ijin_surat($input->surat);
		$user->setAlamat($input->alamat);
		$user->setemail($input->email);
		$data = $oUser->daftarc($user) ;

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

