<?php

	// AJAX - Asinchronous Javascript and Xml
	
	include '../../projects/knygos/config.php';
	
	$knyga = [];
	
	if ( isset ( $_GET [ 'id_knygos' ] ) ) {
	
		$id_knygos = intval ( $_GET [ 'id_knygos' ] );
	
		$rezultatas = $mysqli -> query ( 
				"
			SELECT
				* 
			FROM 
				`knygos`
			WHERE
				`id`=" . $id_knygos . "
			
				"
		);
			
		if ( $rezultatas ) {
		
			$knyga = $rezultatas -> fetch_assoc();
		}
	}
	
	echo json_encode ( $knyga );