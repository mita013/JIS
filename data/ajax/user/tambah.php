<?php
	$input = json_decode(file_get_contents('php://input'));
	require_once '../../model/ClsConnection.php';
	require_once '../../model/ClsLoker.php';
	require_once '../../user/Loker.php';

	try {
		$user  = new Loker() ;
		$oUser = new ClsLoker() ;

		$user->setusername($input->username);
		$user->setposisi($input->posisi);
		$user->setkuota($input->kuota);
		$user->setusia($input->usia);
		$user->setjenis_kelamin($input->jeniskelamin);
		$user->setketerangan($input->keterangan);
		$user->setpersyaratan($input->persyaratan);

		/*$user->setusername('lenovo');
		$user->setposisi('HRD');
		$user->setkuota('2');
		$user->setusia('30-40');
		$user->setjenis_kelamin('Laki-laki');
		$user->setketerangan('test');
		$user->setpersyaratan('Pend minimal S1 semua jurusan');*/

		$data = $oUser->tambah($user);

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

