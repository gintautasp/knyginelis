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
			
			if ( $this -> id == 0 ) {
			
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
			} else {
		
				$mysqli -> query ( 
						"
					UPDATE 
						`knygos` 
					SET 
						 `autoriai`='" . $this -> autoriai. "'
						, `pav`='" . $this -> pav . "'
						, `skaicius_psl`=" . intval ( $this -> skaicius_psl ) . "
						, `zanras`='" . $this -> zanras . "'
						, `siuzetas`='" . $this -> siuzetas . "'
						, `veikejai`='" . $this -> veikejai . "'
						, `ispudziai`='" . $this -> ispudziai . "'
					WHERE
						`id`=" . $this -> id . "
						" 
				);
			}
		}
		
		public function salinti() {
		
			global $mysqli;		
		
			$qw_salinti = 
					"
				DELETE 
				FROM 
					`knygos` 
				WHERE
					`id`=" . $this -> id . "
					";
			// echo ( $qw_salinti ); exit;
		
			$mysqli -> query ( $qw_salinti );		
		}
	}
?>