<?php

	$input = json_decode(file_get_contents('php://input'));


	require_once '../../model/ClsConnection.php';
	require_once '../../model/ClsUser.php';
	require_once '../../user/User.php';

	try {

		$user  = new User() ;
		$oUser = new ClsUser() ;


		$user->setUsername($input->username);
		$user->setPassword($input->password);
		$data = $oUser->login_by_user_password($user) ;


		if ( count($data) > 0 ) {
			session_start() ;

			$_SESSION['id_user'] = $data[0]["id"] ;
			$_SESSION['username'] = $data[0]["username"];

	        $res = array('msg' => 'Selamat! Anda berhasil login.', 'error' => false, 'data' => $data);
	        $jsn = json_encode($res);
	        print_r($jsn);
		}
		else{
		    $res = array('msg' => 'Username atau Password yang Anda masukkan salah', 'error' => true, 'data' => array());
		    $jsn = json_encode($res);
		    print_r($jsn);
		}
	}
	catch (Exception $e) {
	    $res = array('msg' => $e->getMessage(), 'error' => true, 'data' => array());
	    $jsn = json_encode($res);
	    print_r($jsn);
	}

