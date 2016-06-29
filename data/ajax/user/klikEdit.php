<?php
	$input = json_decode(file_get_contents('php://input'));
	require_once '../../model/ClsConnection.php';
	require_once '../../model/ClsUser.php';
	require_once '../../user/User.php';

	try {
		$user  = new User() ;
		$oUser = new ClsUser() ;

		$user->setusername($input->username);
		$user->setnama_perusahaan($input->nama);
		$user->setIndustri($input->industry);
		$user->setNomor_Telepon($input->no_tlp);
		$user->setno_ijin_surat($input->no_ijin_surat);
		$user->setAlamat($input->alamat);
		$user->setwebsite($input->website);
		$user->setemail($input->email);
		$user->setOverview($input->overview);
		$data = $oUser->klikEdit($user);

		/*$user->setusername('club');
		$user->setnama_perusahaan('Club Mineral Water');
		$user->setIndustri('minuman');
		$user->setNomor_Telepon('93030');
		$user->setno_ijin_surat('894849849');
		$user->setAlamat('Jakarta');
		$user->setwebsite('club.com');
		$user->setemail('club@gmail.com');
		$data = $oUser->klikEdit($user);*/

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

