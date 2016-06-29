<?php
	class Loker{
		//Constructor
		public function __construct(){}
		//Atribut
		private $username;
		private $posisi;
		private $kuota;
		private $usia;
		private $jenis_kelamin;
		private $keterangan;
		private $persyaratan;
		
		
        
		//properties
		public function setusername($username){
			$this->username=$username;
		}
		public function getusername(){
			return $this->username;
		}

		public function setposisi($posisi){
			$this->posisi = $posisi;
		}
		public function getposisi(){
			return $this->posisi;
		}

		public function setkuota($kuota){
			$this->kuota = $kuota;
		}
		public function getkuota(){
			return $this->kuota;
		}
		
		public function setusia($usia){
			$this->usia = $usia;
		}
		public function getusia(){
			return $this->usia;
		}
        
        public function setjenis_kelamin($jenis_kelamin){
			$this->jenis_kelamin = $jenis_kelamin;
		}
		public function getjenis_kelamin(){
			return $this->jenis_kelamin;
		}
        
        public function setketerangan($keterangan){
			$this->keterangan = $keterangan;
		}
		public function getketerangan(){
			return $this->keterangan;
		}
		public function setpersyaratan($persyaratan){
			$this->persyaratan = $persyaratan;
		}
		public function getpersyaratan(){
			return $this->persyaratan;
		}
        
        public function toString(){
			$str = "" ;

			$str.= isset($this->username) 		? $this->username . "/" : "" ;
			$str.= isset($this->posisi) 		? $this->posisi . "/" : "" ;
			$str.= isset($this->kuota) 		? $this->kuota . "/" : "" ;
			$str.= isset($this->usia) 	? $this->usia . "/" : "" ;
            $str.= isset($this->jenis_kelamin) 	? $this->jenis_kelamin . "/" : "" ;
            $str.= isset($this->keterangan) 	? $this->keterangan . "/" : "" ;
            $str.= isset($this->persyaratan) 	? $this->persyaratan . "/" : "" ;
            $str = trim($str, "/") ;

			return $str ;
		}

		public function toJson(){
			$json = "" ;

			$json.= isset($this->username) 		? "{username:".$this->username."}," : "" ;
			$json.= isset($this->posisi) 	? "{posisi:".$this->posisi."}," : "" ;
			$json.= isset($this->kuota) 	? "{kuota:".$this->kuota."}," : "" ;
			$json.= isset($this->usia) 	? "{usia:".$this->usia."}," : "" ;
            $json.= isset($this->jenis_kelamin) 	? "{jenis_kelamin:".$this->jenis_kelamin."}," : "" ;
            $json.= isset($this->keterangan) 	? "{keterangan:".$this->keterangan."}," : "" ;
            $json.= isset($this->persyaratan) 	? "{persyaratan:".$this->persyaratan."}," : "" ;
			$json = trim($json, ",") ;

			if ($json != "") {
				$json = "[".$json."]" ;
			}

			return $json ;
		}
	}
