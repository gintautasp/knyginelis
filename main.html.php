<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Knyginėlis</title>
	<style>
		body {
			background: url(dusts/fonas-vasara.png);
		}
		h1 {
			text-align: center;
		}
		menu {
			float: right;
			margin-right: 40px;
			margin-top: -10px;
			padding: 12px;
			padding-bottom: 200px;
		}
		menu button {
			margin-top: 12px;
			padding: 12px;
			width: 180px;
		}
		#knygos_forma, #paieskos_forma {
			margin: -60px auto 20px auto;
			width: 60%;
			padding: 25px;
		}
		label {
			display: block;
			font-weight: bold;
			color: Azure;
		}
		#cite {
			color: Azure;
			font-size: 180%;
			text-align: center;
		}
		input, textarea {
			width: 100%;
			padding: 7px 12px;
			margin-bottom: 17px;
			padding: 7px 12px;
			background-color: rgb(213,207,199);
			border-radius: 8px;
		}
		input[type=submit] {
			width: 30%;
			float: right;
			padding: 12px;			
			margin-right: 25px;
		}
		#logo {
			margin-left: 40px;
			width: 137px;
		}
		#knygos {
			margin: 25px auto 0 auto;
			border-collapse: collapse;
			width: 60%;
		}
		#knygos th, #knygos td {
		
			border: 1px solid grey;
			padding: 3px 4px;
		}
		#knygos tr.nelyginis td {
			background-color: rgb(250,176,153);
		}
		#knygos tr.lyginis td {
			background-color: rgb(255,255,255);
		}	
		#knygos th {
			background-color: rgb(198,134,67);
		}
		.knygos_tvarkymai {
			width: auto;
			padding: 1px 4px;
			margin-bottom: 0;
			margin-right: 7px;
		}
		.placiau {
			display: none;
		}
		.veiksmai {
			text-align: center;
		}
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		$(document).ready ( function() {
			
			$( '#knygos_forma' ).hide();
			$( '#paieskos_forma' ).hide();
			
			function ivedimo_rezimas() {

				$( '#cite' ).hide();
				$( '#paieskos_forma' ).hide();
				$( '#knygos_forma' ).show();
				$( '#knygu_sarasas' ).hide();
			}
			
			$( '#papildyti' ).click( function() {
			
				ivedimo_rezimas();
			});
			
			$( '#ieskoti' ).click( function() {
			
				$( '#cite' ).hide();
				$( '#knygos_forma' ).hide();
				$( '#paieskos_forma' ).show();
			});
			
			$( '.parodyti' ).each( function() {
			
				$( this ).click( function() {
				
					id_knygos = $( this ).data ( 'id' );
					$( '#antraste_apie_ka' + id_knygos ).show();
					$( '#apie_ka' + id_knygos ).show();
					$( '#antraste_kas_patiko' + id_knygos ).show();
					$( '#kas_patiko' + id_knygos ).show();					
				});
			});
			
			$( '.slepti' ).each( function() {
			
				$( this ).click( function() {
				
					id_knygos = $( this ).data ( 'id' );
					$( '#antraste_apie_ka' + id_knygos ).hide();
					$( '#apie_ka' + id_knygos ).hide();
					$( '#antraste_kas_patiko' + id_knygos ).hide();
					$( '#kas_patiko' + id_knygos ).hide();					
				});
			});

			$( '.redaguoti' ).each ( function() {

				$( this ).click( function() {
				
					id_knygos = $( this ).data ( 'id' );
					
					$.get( 'knyga.php?id_knygos=' + id_knygos, function( json_knyga ) {
					
						knyga = JSON.parse ( json_knyga );
						$( '#autoriai' ).val ( knyga.autoriai );
						$( '#pav' ).val ( knyga.pav );
						$( '#skaicius_psl' ).val ( knyga.skaicius_psl );
						$( '#zanras' ).val ( knyga.zanras );
						$( '#veikejai' ).val ( knyga.veikejai );
						$( '#siuzetas' ).val ( knyga.siuzetas );
						$( '#ispudziai' ).val ( knyga.ispudziai );
						$( '#id_knygos' ).val ( knyga.id );
						ivedimo_rezimas();
					});
				});
			});
			
			$( '.salinti' ).each( function() {
			
				$( this ).click( function() {
				
					id_knygos = $( this ).data ( 'id' );	
					
					$.get( 'knyga.php?id_knygos=' + id_knygos, function( json_knyga ) {
					
						knyga = JSON.parse ( json_knyga );
						klausimas = 'ar tikrai pašalinti šią knygą:\n\n' + knyga.autoriai + '\n' + knyga.pav +  '\n\n\t\t?';
						
						if ( confirm( klausimas ) == true ) {
						
							$(  '#id_salinamos_knygos' ).val ( knyga.id );
							$(  '#veiksmas' ).val ( 'Salinti' );
							
							$( '#knygos_salinimo_forma' ).submit();
						}
					});
				});
			});
		});
	</script>
</head>
<body>
	<img src="dusts/logotipas.webp" alt="Knygynėlis" id="logo">
	<menu>
		<button id="papildyti">Papildyti</button><br>
		<button id="ieskoti">Ieškoti</button>
	</menu>
	<section id="cite">
		Skaitymas: maistas mintims desertas vaizduotei
	</section>
	<section id="knygos_forma">
		<form method="POST">
			<label>Autorius(-iai)</label>
			<input type="text" name="autoriai" id="autoriai">
			<label>Pavadinimas</label>			
			<input type="text" name="pav" id="pav">	
			<label>Puslapių skaičius</label>
			<input type="number" name="skaicius_psl" id="skaicius_psl">				
			<label>Žanras</label>
			<input type="text" name="zanras" id="zanras">
			<label>Veikėjai</label>
			<input type="text" name="veikejai" id="veikejai">
			<label>Apie ką</label>
			<textarea name="siuzetas" id="siuzetas"></textarea>
			<label>Kas patiko</label>
			<textarea name="ispudziai" id="ispudziai"></textarea>
			<input type="hidden" name="id_knygos" id="id_knygos" value="0">			
			<input type="submit" name="saugoti" value="Saugoti">
		</form>
	</section>
	<section id="paieskos_forma">
		<form method="POST" action="">
			<label>Ieškoma frazė</label>
			<input type="text" name="paieskos_fraze" id="paieskos_fraze">
			<input type="submit" name="ieskoti" value="Ieškoti">			
		</form>
	</section>
	<section id="knygu_sarasas">
		<table id="knygos">
			<tr>
				<th>Veiksmai</th><th>Autoriai</th><th>Pavadinimas</th><th>Psl. <br>skaič.</th><th>Žanras</th><th>Veikėjai</th>
			</tr>
<?php
			$irasas = 'nelyginis';

			foreach ( $knygynelis -> knygos -> sarasas as $knyga ) {
?>	
			<tr class="<?= $irasas ?>">
				<td class="veiksmai">
					<input type="button" value="&#9998;" class="knygos_tvarkymai redaguoti" data-id="<?= $knyga [ 'id' ] ?>">
					<input type="button" value="&#9747;" class="knygos_tvarkymai salinti" data-id="<?= $knyga [ 'id' ] ?>">
					<input type="button" value="&#9759;" class="knygos_tvarkymai parodyti" data-id="<?= $knyga [ 'id' ] ?>">
					<input type="button" value="&#9757;" class="knygos_tvarkymai slepti" data-id="<?= $knyga [ 'id' ] ?>">
				</td>
				<td><?= $knyga [ 'autoriai' ] ?></td>
				<td><?= $knyga [ 'pav' ] ?></td>
				<td><?= $knyga [ 'skaicius_psl' ] ?></td>
				<td><?= $knyga [ 'zanras' ] ?></td>
				<td><?= $knyga [ 'veikejai' ] ?></td>				
			</tr>
			<tr class="placiau <?= $irasas ?>" id="antraste_apie_ka<?= $knyga [ 'id' ] ?>">
				<th colspan="6">
					Apie ką
				</th>
			</tr>
			<tr class="placiau <?= $irasas ?>" id="apie_ka<?= $knyga [ 'id' ] ?>">
				<td colspan="6">
					<?= nl2br ( $knyga [ 'siuzetas' ] ) ?>
				</td>
			</tr>			
			<tr class="placiau <?= $irasas ?>" id="antraste_kas_patiko<?= $knyga [ 'id' ] ?>">
				<th colspan="6">
					Kas patiko
				</th>
			</tr>
			<tr class="placiau <?= $irasas ?>" id="kas_patiko<?= $knyga [ 'id' ] ?>">
				<td colspan="6">
					<?= $knyga [ 'ispudziai' ] ?>
				</td>
			</tr>			
<?php			
				if ( $irasas == 'nelyginis' ) {
				
					$irasas = 'lyginis';
					
				} else {
				
					$irasas = 'nelyginis';
				}
			}
?>
		</table>
	</section>
	<form id="knygos_salinimo_forma" method="POST" action="">
		<input type="hidden" id="id_salinamos_knygos" name="id_salinamos_knygos" value="0">
		<input type="hidden" id="veiksmas" name="veiksmas" value="nera">		
	</form>
</body>
</html>