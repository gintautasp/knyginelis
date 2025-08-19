<?php

	class Knygynelis {
	
		public 
		
				$ar_gauta_nauja_knyga = false
				, $ar_gauta_pakoreguota_knyga = false
				
				, $knyga
				, $knygos
			;
			
		public function __construct() {
		
			$this -> knygos = new Knygos();
		}
	
		public function patikrinkUzklausosDuomenis() {
		
			if ( isset ( $_POST [ 'id_knygos' ] ) && ( $_POST [ 'id_knygos' ] == '0' ) && isset ( $_POST [ 'saugoti' ] ) &&  ( $_POST [ 'saugoti' ] == 'Saugoti' ) ) {
		
				$this -> ar_gauta_nauja_knyga = true;
			}
			if ( isset ( $_POST [ 'id_knygos' ] ) && ( $_POST [ 'id_knygos' ] != '0' ) && isset ( $_POST [ 'saugoti' ] ) &&  ( $_POST [ 'saugoti' ] == 'Saugoti' ) ) {
		
				$this -> ar_gauta_pakoreguota_knyga = true;
			}			
			// print_r ( $_POST );
		}
		
		public function arGautaNaujaKnyga() {
				
			return $this -> ar_gauta_nauja_knyga;
		}
		
		public function issaugokGautaKnyga() {
		
			$this -> knyga =  new Knyga ( $_POST [ 'autoriai' ], $_POST [ 'pav' ], $_POST [ 'skaicius_psl' ], $_POST [ 'zanras' ], $_POST [ 'siuzetas' ], $_POST [ 'veikejai' ], $_POST [ 'ispudziai' ] );
			$this -> knyga -> issaugotiDuomenuBazeje();
		}
		
		public function arGautaPakoreguotaKnyga() {
		
			return $this -> ar_gauta_pakoreguota_knyga;
		}
		
		public function issaugokPakoreguotaKnyga() {
		
		}
		
		public function arNurodytaSalinamaKnyga() {
		
		}
		
		public function pasalinkNurodytaKnyga() {
		
		}
		
		public function paimkKnyguSarasa() {	
		
			$this -> knygos -> gautiSarasaIsDuomenuBazes();
		
		}
	}