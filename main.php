<?php
/*
	Knygynėli patikrink užklausos duomenis
	
	Jei Knygynėli pagal užklausą gauta nauja knyga
	
		Tai Knyginėli išsaugok gautą knygą
		
	Jei Knygynėli pagal užklausą gauta pakoreguota knyga
	
		Tai Knyginėli išsaugok pakoreguotą knygą		

	Jei Knygynėli pagal užklausą gauta knyga, kuria reikia pašalinti
	
		Tai Knyginėli pašalink nurodytą knygą

	Knygynėli paimk knygų sąrašą
*/
	include 'config.php';

	include 'Knyga.class.php';
	include 'Knygos.class.php';	
	include 'Knygynelis.class.php';

	$knygynelis = new Knygynelis();
	
	$knygynelis -> patikrinkUzklausosDuomenis();
	
	if ( $knygynelis -> arGautaNaujaKnyga() ) {
	
		$knygynelis -> issaugokGautaKnyga();
	}
	if ( $knygynelis -> arGautaPakoreguotaKnyga() ) {
	
		$knygynelis -> issaugokPakoreguotaKnyga();
	}
	if ( $knygynelis -> arNurodytaSalinamaKnyga() ) {
	
		$knygynelis -> pasalinkNurodytaKnyga();
	}
	$knygynelis -> paimkKnyguSarasa();

	include 'main.html.php';
