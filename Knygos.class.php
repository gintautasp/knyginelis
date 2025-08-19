<?php

	class Knygos {
	
		public 
		
			$sarasas = array()
		;
	
		public function __construct() {
		}
	
		public function gautiSarasaIsDuomenuBazes() {
		
			global $mysqli;
			
			$rezultatas = $mysqli -> query ( 
					"
				SELECT
					* 
				FROM `knygos`
					"
			);
			
			if ( $rezultatas ) {
			
				while ( $knyga = $rezultatas -> fetch_assoc () ) {
				
					$this -> sarasas[] = $knyga;
				}
			}
		}
	}