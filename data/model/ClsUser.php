<?php
	include 'kode.php';
	class ClsUser extends ClsConnection {
		# CONSTRUCT
		public function __construct($cnx  = null)
		{
			$this->conn = $cnx;
		}
		
		public function login_by_user_password($user)
		{
			$username = $user->getUsername();
			$password   = $user->getPassword();

			$this->query = "SELECT * FROM user WHERE user.username='$username' AND user.password='$password'";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}

		public function daftar($user){
			$username= $user->getUsername();
			$password = $user->getPassword();
			$email = $user->getemail();
			$tipe = $user->gettipe();


			if($tipe == 'Personal'){
				$this->query = "INSERT INTO user (username, password, tipe, email) VALUES ('$username', '$password', '$tipe', '$email')";
				$this->execute_query();
				$data = $this->rows;
				return $data;

			}else if($tipe == 'Company'){
				$this->query = "INSERT INTO user (username, password, tipe, email) VALUES ('$username', '$password', '$tipe', '$email')";
				$this->execute_query();
				$data = $this->rows;
				return $data;
			}else if($tipe == 'School'){
				$this->query = "INSERT INTO user (username, password, tipe, email) VALUES ('$username', '$password', '$tipe', '$email')";
				$this->execute_query();
				$data = $this->rows;
				return $data;
			}
		}

		public function daftarp($user){
			$username= $user->getUsername();
			$this->query = "INSERT INTO cv (username) VALUES ('$username')";
			$this->execute_query();
			$data = $this->rows;
			return $data;
		}

		public function daftarc($user){
			$username= $user->getUsername();
			$nama = $user->getnama_perusahaan();
			$industri = $user->getIndustri();
			$telepon = $user->getNomor_Telepon();
			$surat = $user->getno_ijin_surat();
			$alamat = $user->getAlamat();
			$email = $user->getemail();
			//$foto = $user->getFoto();

				$this->query = "INSERT INTO company (username, nama, alamat, no_tlp, industry,no_ijin_surat,email) 
				VALUES ('$username','$nama','$alamat','$telepon','$industri','$surat','$email')";
				$this->execute_query();
				$data = $this->rows;
				return $data;
		}

		public function klikEdit($user){
			$username= $user->getUsername();
			$nama = $user->getnama_perusahaan();
			$industri = $user->getIndustri();
			$telepon = $user->getNomor_Telepon();
			$surat = $user->getno_ijin_surat();
			$alamat = $user->getAlamat();
			$website = $user->getwebsite();
			$email = $user->getemail();
			$overview = $user->getOverview();

				$this->query = "UPDATE company SET nama='$nama', industry='$industri', no_tlp='$telepon', 
				no_ijin_surat='$surat', alamat='$alamat', website='$website', email='$email', overview='$overview' WHERE username='$username'";
				$this->execute_query();
				$data = array('test' => 'test' );
				//$data = $this->rows;
				return $data;
		}

		public function editCV($user){
			$username= $user->getUsername();
			$nama = $user->getNama_lengkap();
			$ttl = $user->getTempat_Tanggal_Lahir();
			$telepon = $user->getNomor_Telepon();
			$agama = $user->getAgama();
			$alamat = $user->getAlamat();
			$asal_sekolah = $user->getAsal_Sekolah();
			$jurusan = $user->getJurusan();
			$angkatan = $user->getAngkatan();
			$jenis_kelamin = $user->getjenis_kelamin();
			$email = $user->getemail();

				$this->query = "UPDATE cv SET nama_lengkap = '$nama', ttl = '$ttl', angkatan = '$angkatan', asal_sekolah='$asal_sekolah', 
				jurusan='$jurusan', jenis_kelamin='$jenis_kelamin', no_tlp='$telepon', agama='$agama', email='$email', alamat='$alamat' WHERE username='$username'";
				$this->execute_query();
				$data = array('test' => 'test' );
				//$data = $this->rows;
				return $data;
		}

		public function cariLoker($user){
			$cari= $user->getUsername();

			$this->query = "SELECT * FROM loker JOIN company ON loker.username=company.username 
			WHERE loker.id LIKE '%$cari%' OR company.username LIKE '%$cari%' OR loker.posisi LIKE 
			'%$cari%' OR loker.kuota LIKE '%$cari%' OR loker.usia LIKE '%$cari%' OR 
			loker.jenis_kelamin LIKE '%$cari%' OR loker.keterangan LIKE '%$cari%' OR 
			loker.persyaratan LIKE '%$cari%' OR company.nama LIKE '%$cari%' OR company.alamat 
			LIKE '%$cari%' OR company.no_tlp LIKE '%$cari%' OR company.industry LIKE '%$cari%' 
			OR company.overview LIKE '%$cari%' OR company.no_ijin_surat LIKE '%$cari%' OR 
			company.website LIKE '%$cari%' OR company.email LIKE '%$cari%'";
			$this->execute_query();
			$data = $this->rows ;

			return $data;
		}


		public function addLoker($user){
			$username= $user->getUsername();

				$this->query = "INSERT INTO loker (username) 
				VALUES ('$username')";
				$this->execute_query();
				$data = $this->rows;
				return $data;
		}

		public function daftars($user){
			$username= $user->getUsername();
			$nama = $user->getnama_perusahaan();
			$telepon = $user->getNomor_Telepon();
			$surat = $user->getno_ijin_surat();
			$alamat = $user->getAlamat();
			//$foto = $user->getFoto();

				$this->query = "INSERT INTO sekolah (username, nama_sekolah, alamat, no_telepon, no_ijin_surat) 
				VALUES ('$username','$nama','$alamat','$telepon','$surat')";
				$this->execute_query();
				$data = $this->rows;
				return $data;
		}

		public function simpan($user){
			//$id = $user->getId();
			$nama= $user->getNama_lengkap();
			$ttl= $user->getTempat_Tanggal_Lahir();
			$no_tlp= $user->getNomor_Telepon();
			$agama= $user->getAgama();
			$alamat= $user->getAlamat();
			$email= $user->getemail();
			$jurusan=$user->getJurusan();
			$angkatan=$user->getAngkatan();
			$asal_sekolah=$user->getAsal_Sekolah();
			$jenis_kelamin=$user->getjenis_kelamin();
			//$foto = $user->getFoto();

				$this->query = "INSERT INTO cv (id, nama_lengkap, ttl, no_tlp, agama, email, jurusan, angkatan, asal_sekolah, jenis_kelamin) 
				VALUES ('','$nama','$ttl','$no_tlp','$agama','$email','$jurusan','$angkatan','$asal_sekolah','$jenis_kelamin')";
				$this->execute_query();
				$data = $this->rows;
				return $data;
		}

		public function get_by_code($user)
		{
			$id = $user->getId();

			//$this->query = "SELECT * FROM user, company, loker, sekolah, cv WHERE user.id = cv.id OR user.username = company.username OR user.username = sekolah.username AND user.id='$id'";
			$this->query = "SELECT * FROM user WHERE user.id='$id'";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}

		public function lihatLoker($user)
		{
			$id = $user->getId();

			$this->query = "SELECT * FROM loker JOIN company ON (loker.username = company.username) WHERE loker.id='$id'";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}

		public function infoComp($user)
		{
			$username = $user->getUsername();

			$this->query = "SELECT * FROM company WHERE username='$username'";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}

		public function lihatCV($user)
		{
			$username = $user->getUsername();

			$this->query = "SELECT * FROM cv WHERE username='$username'";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}
        
        public function jumlah_loker()
		{
			$this->query = "SELECT COUNT(*) AS jumlah FROM loker";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}

		public function get_loker()
		{
			//$this->query = "SELECT * FROM user, company, loker, sekolah, cv WHERE user.id = cv.id OR user.username = company.username OR user.username = sekolah.username AND user.id='$id'";
			$this->query = "SELECT * FROM loker,company WHERE company.username = loker.username ORDER BY loker.id DESC";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}

		public function get_cv($user)
		{
			$id = $user->getId();

			//$this->query = "SELECT * FROM user, company, loker, sekolah, cv WHERE user.id = cv.id OR user.username = company.username OR user.username = sekolah.username AND user.id='$id'";
			$this->query = "SELECT * FROM cv";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}

		public function get_profilc($user)
		{
			$username = $user->getUsername();

			//$this->query = "SELECT * FROM user, company, loker, sekolah, cv WHERE user.id = cv.id OR user.username = company.username OR user.username = sekolah.username AND user.id='$id'";
			$this->query = "SELECT * FROM company WHERE username='$username'";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}

		public function myLoker($user)
		{
			$username = $user->getUsername();

			$this->query = "SELECT * FROM loker WHERE username='$username'";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}

		public function get_profilp($user)
		{
			$username = $user->getUsername();

			$this->query = "SELECT * FROM cv WHERE username='$username'";

			$this->execute_query();

			$data = $this->rows ;

			return $data;
		}
	}