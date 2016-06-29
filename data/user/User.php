<?php
	class User{
		//Constructor
		public function __construct(){}
		//Atribut
		private $id;
		private $username;
		private $password;
		private $email;
        private $angkatan;
        private $tipe;
        private $nama_lengkap;
		private $ttl;
        private $asal_sekolah;
		private $jurusan;
		private $jenis_kelamin;
		private $nama_perusahaan;
		private $overview;
		private $industry;
		private $no_tlp;
		private $alamat;
		private $foto;
		private $posisi;
		private $kuota;
		private $usia;
		private $gender;
		private $keterangan;
		private $no_ijin_surat;
		private $agama;
		private $website;

        
		//properties
		public function setId($id){
			$this->id=$id;
		}
		public function getId(){
			return $this->id;
		}

		public function setUsername($username){
			$this->username = $username;
		}
		public function getUsername(){
			return $this->username;
		}

		public function setPassword($password){
			$this->password = $password;
		}
		public function getPassword(){
			return $this->password;
		}
		
		public function setAngkatan($angkatan){
			$this->angkatan = $angkatan;
		}
		public function getAngkatan(){
			return $this->angkatan;
		}
        
        public function setemail($email){
			$this->email = $email;
		}
		public function getemail(){
			return $this->email;
		}
        
        public function settipe($tipe){
			$this->tipe = $tipe;
		}
		public function gettipe(){
			return $this->tipe;
		}
        
        public function setNama_Lengkap($nama_lengkap){
			$this->nama_lengkap = $nama_lengkap;
		}
		public function getNama_lengkap(){
			return $this->nama_lengkap;
		}
        
        public function setTempat_Tanggal_Lahir($ttl){
			$this->ttl = $ttl;
		}
		public function getTempat_Tanggal_Lahir(){
			return $this->ttl;
		}
		public function setAsal_Sekolah($asal_sekolah){
			$this->asal_sekolah = $asal_sekolah;
		}
		public function getAsal_Sekolah(){
			return $this->asal_sekolah;
		}
		public function setJurusan($jurusan){
			$this->jurusan = $jurusan;
		}
		public function getjurusan(){
			return $this->jurusan;
		}
		public function setJenis_Kelamin($jenis_kelamin){
			$this->jenis_kelamin = $jenis_kelamin;
		}
		public function getjenis_kelamin(){
			return $this->jenis_kelamin;
		}
		public function setnama_perusahaan($nama_perusahaan){
			$this->nama_perusahaan = $nama_perusahaan;
		}
		public function getnama_perusahaan(){
			return $this->nama_perusahaan;
		}
		public function setOverview($overview){
			$this->overview = $overview;
		}
		public function getOverview(){
			return $this->overview;
		}
		public function setIndustri($industry){
			$this->industry = $industry;
		}
		public function getIndustri(){
			return $this->industry;
		}
		public function setNomor_Telepon($no_tlp){
			$this->no_tlp = $no_tlp;
		}
		public function getNomor_Telepon(){
			return $this->no_tlp;
		}
		public function setAlamat($alamat){
			$this->alamat = $alamat;
		}
		public function getAlamat(){
			return $this->alamat;
		}
		public function setFoto($foto){
			$this->foto = $foto;
		}
		public function getFoto(){
			return $this->foto;
		}
		public function setPosisi($posisi){
			$this->posisi = $posisi;
		}
		public function getPosisi(){
			return $this->posisi;
		}
		public function setKuota($kouta){
			$this->kuota = $kuota;
		}
		public function getKuota(){
			return $this->kuota;
		}
		public function setUsia($usia){
			$this->usia = $usia;
		}
		public function getUsia(){
			return $this->usia;
		}
		public function setKeterangan($keterangan){
			$this->keterangan = $keterangan;
		}
		public function getKeterangan(){
			return $this->keterangan;
		}
		public function setno_ijin_surat($no_ijin_surat){
			 $this ->no_ijin_surat = $no_ijin_surat ;
		}
		public function getno_ijin_surat(){
			return $this->no_ijin_surat;
		}
		public function setagama($agama){
			 $this->agama = $agama ;
		}
		public function getagama(){
			return $this->agama;
		}
		public function setwebsite($website){
			 $this->website = $website ;
		}
		public function getwebsite(){
			return $this->website;
		}
		public function toString(){
			$str = "" ;

			$str.= isset($this->id) 		? $this->id . "/" : "" ;
			$str.= isset($this->username) 		? $this->username . "/" : "" ;
			$str.= isset($this->password) 		? $this->password . "/" : "" ;
			$str.= isset($this->email) 	? $this->email . "/" : "" ;
            $str.= isset($this->angkatan) 	? $this->angkatan . "/" : "" ;
            $str.= isset($this->email) 	? $this->email . "/" : "" ;
            $str.= isset($this->tipe) 	? $this->tipe . "/" : "" ;
            $str.= isset($this->nama_lengkap) 	? $this->nama_lengkap . "/" : "" ;
            $str.= isset($this->angkatan) 	? $this->angkatan . "/" : "" ;
			$str.= isset($this->ttl) 	? $this->ttl . "/" : "" ;
			$str.= isset($this->asal_sekolah) 	? $this->asal_sekolah . "/" : "" ;
			$str.= isset($this->jurusan) 	? $this->jurusan . "/" : "" ;
			$str.= isset($this->jenis_kelamin) 	? $this->jenis_kelamin . "/" : "" ;
			$str.= isset($this->nama_perusahaan) 	? $this->nama_perusahaan . "/" : "" ;
			$str.= isset($this->overview) 	? $this->overview . "/" : "" ;
			$str.= isset($this->industry) 	? $this->industry . "/" : "" ;
			$str.= isset($this->no_tlp) 	? $this->no_tlp . "/" : "" ;
			$str.= isset($this->foto) 	? $this->foto . "/" : "" ;
			$str.= isset($this->alamat) 	? $this->alamat . "/" : "" ;
			$str.= isset($this->posisi) 	? $this->posisi . "/" : "" ;
			$str.= isset($this->kuota) 	? $this->kuota . "/" : "" ;
			$str.= isset($this->usia) 	? $this->usia . "/" : "" ;
			$str.= isset($this->jenis_kelamin) 	? $this->jenis_kelamin . "/" : "" ;
			$str.= isset($this->keterangan) 	? $this->keterangan . "/" : "" ;
			$str.= isset($this->no_ijin_surat) 	? $this->no_ijin_surat . "/" : "" ;
			$str.= isset($this->agama) 	? $this->agama . "/" : "" ;
			$str.= isset($this->website) 	? $this->website . "/" : "" ;
			$str = trim($str, "/") ;

			return $str ;
		}

		public function toJson(){
			$json = "" ;

			$json.= isset($this->id) 		? "{id:".$this->id."}," : "" ;
			$json.= isset($this->username) 	? "{username:".$this->username."}," : "" ;
			$json.= isset($this->password) 	? "{password:".$this->password."}," : "" ;
			$json.= isset($this->nama_lengkap) 	? "{nama_lengkap:".$this->nama_lengkap."}," : "" ;
            $json.= isset($this->angkatan) 	? "{angkatan:".$this->angkatan."}," : "" ;
            $json.= isset($this->email) 	? "{email:".$this->email."}," : "" ;
			$json.= isset($this->tipe) 	? "{tipe:".$this->tipe."}," : "" ;
			$json.= isset($this->industri) 	? "{industri:".$this->industri."}," : "" ;
			$json.= isset($this->no_tlp) 	? "{no_tlp:".$this->no_tlp."}," : "" ;
			$json.= isset($this->foto) 	? "{foto:".$this->foto."}," : "" ;
			$json.= isset($this->alamat) 	? "{alamat:".$this->alamat."}," : "" ;
			$json.= isset($this->posisi) 	? "{posisi:".$this->posisi."}," : "" ;
			$json.= isset($this->kuota) 	? "{kuota:".$this->kuota."}," : "" ;
            $json.= isset($this->usia) 	? "{usia:".$this->usia."}," : "" ;
			$json.= isset($this->jenis_kelamin) 	? "{jenis_kelamin:".$this->jenis_kelamin."}," : "" ;
			$json.= isset($this->keterangan) 	? "{keterangan:".$this->keterangan."}," : "" ;
			$json.= isset($this->no_ijin_surat) 	? "{no_ijin_surat:".$this->no_ijin_surat."}," : "" ;
			$json.= isset($this->agama) 	? "{agama:".$this->agama."}," : "" ;
			$json.= isset($this->website) 	? "{website:".$this->website."}," : "" ;
			$json = trim($json, ",") ;

			if ($json != "") {
				$json = "[".$json."]" ;
			}

			return $json ;
		}
	}
