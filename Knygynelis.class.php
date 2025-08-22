<?php

	class Knygynelis {
	
		public 
		
				$ar_gauta_nauja_knyga = false
				, $ar_gauta_pakoreguota_knyga = false
				, $ar_nurodyta_salinama_knyga = false
				
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
			if ( isset ( $_POST [ 'veiksmas' ] ) && ( $_POST [ 'veiksmas' ] == 'Salinti' ) && isset ( $_POST [ 'id_salinamos_knygos' ] ) && ( intval (  $_POST [ 'id_salinamos_knygos' ]  ) > 0 ) ) {
			
				$this -> ar_nurodyta_salinama_knyga = true;
			}
			if ( false ) {
				echo '_' . isset ( $_POST [ 'veiksmas' ] ) . '_<br>';
				echo '_' . ( $_POST [ 'veiksmas' ] == 'Salinti' ) . '_<br>';
				echo '_' . isset ( $_POST [ 'id_salinamos_knygos' ] ) . '_<br>';
				echo '_' . intval ( intval (  $_POST [ 'id_salinamos_knygos' ]  ) > 0 ) . '_<br>';				
				echo '_' . intval ( $this -> ar_nurodyta_salinama_knyga ) . '_'; 
				print_r ( $_POST );
				exit;
			}
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
	
			$this -> knyga =  new Knyga ( $_POST [ 'autoriai' ], $_POST [ 'pav' ], $_POST [ 'skaicius_psl' ], $_POST [ 'zanras' ], $_POST [ 'siuzetas' ], $_POST [ 'veikejai' ], $_POST [ 'ispudziai' ], intval ( $_POST [ 'id_knygos' ] ) );
			$this -> knyga -> issaugotiDuomenuBazeje();
		}
		
		public function arNurodytaSalinamaKnyga() {
		
			return $this -> ar_nurodyta_salinama_knyga;
		}
		
		public function pasalinkNurodytaKnyga() {
		
			$this -> knyga =  new Knyga ( '', '', '', '', '', '', '', intval ( $_POST [ 'id_salinamos_knygos' ] ) );
			$this -> knyga -> salinti();
		}
		
		public function paimkKnyguSarasa() {	
		
			$this -> knygos -> gautiSarasaIsDuomenuBazes();
		
		}
	}