<?php
	include 'kode.php';
	class ClsLoker extends ClsConnection {
		# CONSTRUCT
		public function __construct($cnx  = null)
		{
			$this->conn = $cnx;
		}
		public function tambah($user){
			$username = $user->getusername();
			$posisi = $user->getposisi();
			$kuota = $user->getkuota();
			$usia = $user->getusia();
			$jeniskelamin = $user->getjenis_kelamin();
			$keterangan = $user->getketerangan();
			$persyaratan = $user->getpersyaratan();

				$this->query = "INSERT INTO loker (username, posisi, kuota, usia, jenis_kelamin, keterangan,persyaratan) 
				VALUES ('$username','$posisi','$kuota','$usia','$jeniskelamin','$keterangan','$persyaratan')";
				$this->execute_query();
				$data = array('test' => 'test' );
				//$data = $this->rows;
				return $data;
		}
	}