<?php

	class Knyga {
		
		public 

			$id	
			, $autoriai	
			, $pav 
			, $skaicius_psl
			, $zanras
			, $siuzetas
			, $veikejai
			, $ispudziai
		;
	
		public function __construct ( $autoriai, $pav, $skaicius_psl, $zanras, $siuzetas, $veikejai, $ispudziai, $id = 0 ) {
		
			$this -> id = $id;	
			$this -> autoriai = $autoriai;	
			$this -> pav = $pav; 
			$this -> skaicius_psl = $skaicius_psl;
			$this -> zanras = $zanras;
			$this -> siuzetas = $siuzetas;
			$this -> veikejai = $veikejai;
			$this -> ispudziai = $ispudziai;			
		}	
		
		public function issaugotiDuomenuBazeje() {
		
			global $mysqli;
			
			$mysqli -> query ( 
					"
				INSERT INTO `knygos` ( `autoriai`, `pav`, `skaicius_psl`, `zanras`, `siuzetas`, `veikejai`, `ispudziai` )
				VALUES(
					'" . $this -> autoriai. "'
					, '" . $this -> pav . "'
					, " . intval ( $this -> skaicius_psl ) . "
					, '" . $this -> zanras . "'
					, '" . $this -> siuzetas . "'
					, '" . $this -> veikejai . "'
					, '" . $this -> ispudziai . "'
				)
					" 
			);
		}
	}
?>