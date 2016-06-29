<?php
	require_once '../../user/User.php';

	session_start();
	
	if( isset($_SESSION['id_user']) ) {
		//print $_SESSION['id_user'] ;
		print $_SESSION['username'];
	}