<div class="panel panel-default">			
  <div class="panel-heading">
	<h3 class="panel-title">Dodajanje meritev</h3>
  </div>
  <div class="panel-body">
	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Osnovno o nalogu</h3>
	  </div>
	  <div class="panel-body">	
		  <div class="form-group">
			<label class="label label-primary">Naziv izvajalca</label>
			<div class="form-control nalog" name="nazivIzvajalca"><label>{{$mini->naziv_izvajalca}}</label></div>
		  </div>
		  <div class="form-group">
			<label class="label label-primary">Ime in priimek zavarovane osebe</label>
			<div class="form-control nalog" name="imePriimekZavOsebe"><label>{{$mini->ime_pacienta}} {{$mini->priimek_pacienta}}</label></div>
		  </div>
		  <div class="form-group">
		    <label class="label label-primary">Ime storitve</label>
			<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->ime_vrsta_obiska}}</label></div>
		  </div>
		  <div class="form-group">
		    <label class="label label-primary">Ime bolezni</label>
			<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->ime_bolezni}}</label></div>
		  </div>
	  </div>
	</div>
	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Izvajanje aktivnosti</h3>
				<form role="form" method="POST" action="{{ route('vnesiPodatke', ['sifraNaloga' => $obisk->sifra_obisk]) }}">
		@php
			$datumArray = [14];
			$motenoArray = [17, 47];
			$nizSreVisArray = [18, 48];
			$tlakArray = [19, 40, 65, 85];
			$srcniArray = [20, 41, 66, 86];
			$dihalniArray = [21, 42, 67, 87];
			$temperaturaArray = [22, 43, 68, 88];
			$kgArray = [23, 24, 44, 69];
			$knjizicaArray = [25];
			$izlocanjeArray = [72];
			$cutilaArray = [74];
			$neodvisenArray = [77];
			$sladkorArray = [89];
			$oksigenacijaArray = [90];
			$terapijaArray = [91];
			$kriArray = [82];
			foreach($aktivnosti as $aktivnost){
				echo "<div class=\"form-group\">";
				echo "<label class=\"label label-primary\">$aktivnost->ime_aktivnosti</label>";
				$porocila = $obisk->porocilo;
				$opis = null;

				foreach($porocila as $porocilo){
					if ($porocilo['aid'] == $aktivnost->aid){
						$opis = $porocilo->opis;
					}
				}
				if (in_array($aktivnost->aid, $srcniArray)){
					
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Udarci na minuto\" required>";
				}
				else if (in_array($aktivnost->aid, $terapijaArray)){
					echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid terapija\" value=\"da\" required>Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid terapija\" value=\"delno\" required>Delno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid terapija\" value=\"ne\" required>Ne</label>";
					echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" required>";
				}
				else if (in_array($aktivnost->aid, $oksigenacijaArray)){
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"%\" required>";
				}
				else if (in_array($aktivnost->aid, $sladkorArray)){
						echo "<input type=\"number\" name=\"$aktivnost->aid num\" class=\"form-control input-sm\" placeholder=\"mmol/L\" required>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" required>";
				}
				else if (in_array($aktivnost->aid, $knjizicaArray)){
					if(isset($opis)){
						$decoded = json_decode($opis);
						$dec_datum = $decoded->datum;
						$dec_teza = $decoded->teza;
						$dec_visina = $decoded->visina;
						$dec_opis = $decoded->opis;
						echo "<div class=\"datepicker input-group date\" data-provide=\"datepicker\">";
						echo "<input type=\"text\" class=\"form-control\" 
						value=\"$dec_datum\" name=\"$aktivnost->aid datum\" disabled>";
						echo "<div class=\"input-group-addon\">";
						echo "<span class=\"glyphicon glyphicon-th\"></span>";
						echo "</div>";
						echo "</div>";
						echo "<input type=\"number\" name=\"$aktivnost->aid teza\" class=\"form-control input-sm\" value=\"$dec_teza\"placeholder=\"Porodna teza otroka [g]\" disabled>";
						echo "<input type=\"number\" name=\"$aktivnost->aid visina\" class=\"form-control input-sm\" value=\"$dec_visina\"disabled>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" value=\"$dec_opis\" disabled>";
					} else {
						echo "<div class=\"datepicker input-group date\" data-provide=\"datepicker\">";
						echo "<input type=\"text\" class=\"form-control\" placeholder=\"Datum rojstva otroka dd.mm.llll\" name=\"$aktivnost->aid datum\">";
						echo "<div class=\"input-group-addon\">";
						echo "<span class=\"glyphicon glyphicon-th\"></span>";
						echo "</div>";
						echo "</div>";
						echo "<input type=\"number\" name=\"$aktivnost->aid teza\" class=\"form-control input-sm\" placeholder=\"Porodna teza otroka [g]\" required>";
						echo "<input type=\"number\" name=\"$aktivnost->aid visina\" class=\"form-control input-sm\" placeholder=\"Porodna visina otroka [cm]\" required>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" required>";
					}
				}
				else if (in_array($aktivnost->aid, $cutilaArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_vid = $decoded->vid;
							$dec_vonj = $decoded->vonj;
							$dec_sluh = $decoded->sluh;
							$dec_okus = $decoded->okus;
							$dec_otip = $decoded->otip;
							echo "<input type=\"text\" name=\"$aktivnost->aid vid\" class=\"form-control input-sm\" value=\"$dec_vid \" required>";
							echo "<input type=\"text\" name=\"$aktivnost->aid vonj\" class=\"form-control input-sm\" value=\"$dec_vonj\" required>";
							echo "<input type=\"text\" name=\"$aktivnost->aid sluh\" class=\"form-control input-sm\" value=\"$dec_sluh\" required>";
							echo "<input type=\"text\" name=\"$aktivnost->aid okus\" class=\"form-control input-sm\" value=\"$dec_okus\" required>";
							echo "<input type=\"text\" name=\"$aktivnost->aid otip\" class=\"form-control input-sm\" value=\"$dec_otip\" required>";
						} else {
							echo "<input type=\"text\" name=\"$aktivnost->aid vid\" class=\"form-control input-sm\" placeholder=\"Opis vida\" required>";
							echo "<input type=\"text\" name=\"$aktivnost->aid vonj\" class=\"form-control input-sm\" placeholder=\"Opis vonja\" required>";
							echo "<input type=\"text\" name=\"$aktivnost->aid sluh\" class=\"form-control input-sm\" placeholder=\"Opis sluha\" required>";
							echo "<input type=\"text\" name=\"$aktivnost->aid okus\" class=\"form-control input-sm\" placeholder=\"Opis okusa\" required>";
							echo "<input type=\"text\" name=\"$aktivnost->aid otip\" class=\"form-control input-sm\" placeholder=\"Opis otipa\" required>";
						}
				}
				else if (in_array($aktivnost->aid, $izlocanjeArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_urin = $decoded->urin;
							$dec_blato = $decoded->blato;
							echo "<input type=\"text\" name=\"$aktivnost->aid urin\" class=\"form-control input-sm\" value=\"$dec_urin\" required>";
							echo "<input type=\"text\" name=\"$aktivnost->aid blato\" class=\"form-control input-sm\" value=\"$dec_blato\" required>";
						} else {
							echo "<input type=\"text\" name=\"$aktivnost->aid urin\" class=\"form-control input-sm\" placeholder=\"Opis urina\" required>";
							echo "<input type=\"text\" name=\"$aktivnost->aid blato\" class=\"form-control input-sm\" placeholder=\"Opis blata\" required>";
						}
						
				}
				else if (in_array($aktivnost->aid, $kgArray)){
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"kg\" required>";
				}
				else if (in_array($aktivnost->aid, $kriArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_rdeca = $decoded->rdeca;
							$dec_modra = $decoded->modra;
							$dec_rumena = $decoded->rumena;
							$dec_zelena = $decoded->zelena;
							echo "<input type=\"number\" name=\"$aktivnost->aid rdeca\" class=\"form-control input-sm\" value=\"$dec_rdeca\" required>";
							echo "<input type=\"number\" name=\"$aktivnost->aid modra\" class=\"form-control input-sm\" value=\"$dec_modra\" required>";
							echo "<input type=\"number\" name=\"$aktivnost->aid rumena\" class=\"form-control input-sm\" value=\"$dec_rumena\" required>";
							echo "<input type=\"number\" name=\"$aktivnost->aid zelena\" class=\"form-control input-sm\" value=\"$dec_zelena\" required>";
						} else {
							echo "<input type=\"number\" name=\"$aktivnost->aid rdeca\" class=\"form-control input-sm\" placeholder=\"Rdeca\" required>";
							echo "<input type=\"number\" name=\"$aktivnost->aid modra\" class=\"form-control input-sm\" placeholder=\"Modra\" required>";
							echo "<input type=\"number\" name=\"$aktivnost->aid rumena\" class=\"form-control input-sm\" placeholder=\"Rumena\" required>";
							echo "<input type=\"number\" name=\"$aktivnost->aid zelena\" class=\"form-control input-sm\" placeholder=\"Zelena\" required>";
						}
				}
				else if (in_array($aktivnost->aid, $temperaturaArray)){
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"°C\" required>";
				}
				else if (in_array($aktivnost->aid, $dihalniArray)){
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Vdihi na minuto\" required>";
				}
				else if (in_array($aktivnost->aid, $tlakArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_sis = $decoded->sis;
							$dec_dia = $decoded->dia;
							echo "<input type=\"number\" name=\"$aktivnost->aid sis\" class=\"form-control input-sm\" value=\"$dec_sis\" placeholder=\"Sistolični (mm Hg)\" required>";
							echo "<input type=\"number\" name=\"$aktivnost->aid dia\" class=\"form-control input-sm\" value=\"$dec_dia\" placeholder=\"Diastolični (mm Hg)\" required>";
						} else {
							echo "<input type=\"number\" name=\"$aktivnost->aid sis\" class=\"form-control input-sm\" placeholder=\"Sistolični (mm Hg)\" required>";
							echo "<input type=\"number\" name=\"$aktivnost->aid dia\" class=\"form-control input-sm\" placeholder=\"Diastolični (mm Hg)\" required>";
						}
				}
				else if (in_array($aktivnost->aid, $neodvisenArray)){
					if(isset($opis)){
						$decoded = json_decode($opis);
						$dec_odvisnost = $decoded->odvisnost;
						$dec_opis = $decoded->opis;
						if($dec_odvisnost == "samostojen"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" checked required>Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" required>Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" required>Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" required>Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" required>Pomoč drugih</label>";
						} else if($dec_odvisnost == "delnoOdvisen"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" required>Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" checked required>Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" required>Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" required>Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" required>Pomoč drugih</label>";
						} else if($dec_odvisnost == "povsemOdvisen"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" required>Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" required>Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" checked required>Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" required>Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" required>Pomoč drugih</label>";
						} else if($dec_odvisnost == "pomocSvojcev"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" required>Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" required>Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" required>Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" checked required>Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" required>Pomoč drugih</label>";
						} else if($dec_odvisnost == "pomocDrugih"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" required>Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" required>Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" required>Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" required>Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" checked required>Pomoč drugih</label>";

						} 
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" value=\"$dec_opis\" required>";
					} else {
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" required>Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" required>Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" required>Povsem odvisen</label>";
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" required>Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" required>Pomoč drugih</label>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" required>";
					}
					
				}
				else if (in_array($aktivnost->aid, $motenoArray)){
					if(isset($opis)){
						$decoded = json_decode($opis);
						$dec_opis = $decoded->opis;
						$dec_mot = $decoded->mot;
						if ($dec_mot == "moteno"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"moteno\" checked required>Moteno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"niMoteno\" required>Ni moteno</label>";
						} else if ($dec_mot == "niMoteno"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"moteno\" required>Moteno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"niMoteno\" checked required>Ni moteno</label>";
						} 				
						
					}else {
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"moteno\" required>Moteno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"niMoteno\" required>Ni moteno</label>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" required>";
					}	
				}
				else if (in_array($aktivnost->aid, $nizSreVisArray)){
					$dec_fizicna = "";
					if(isset($opis)){
						$decoded = json_decode($opis);
						$dec_opis = $decoded->opis;
						$dec_fizicna = $decoded->fizicna;
						if($dec_fizicna == "nizka"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" checked required>Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" required>Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" required>Visoka</label>";
						} else if ($dec_fizicna == "srednja"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" required>Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" checked required>Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" required>Visoka</label>";
						} else if ($dec_fizicna == "visoka"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" required>Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" required>Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" checked required>Visoka</label>";
						}
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" value=\"$dec_opis\"placeholder=\"Opis\" required>";
					} else {
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" required>Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" required>Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" required>Visoka</label>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" required>";
					}
				}
				else if (in_array($aktivnost->aid, $datumArray)){
					echo "<div class=\"datepicker input-group date\" data-provide=\"datepicker\">";
					echo "<input type=\"text\" class=\"form-control\" placeholder=\"dd.mm.llll\" value=\"$opis\" name=\"$aktivnost->aid\">";
					echo "<div class=\"input-group-addon\">";
					echo "<span class=\"glyphicon glyphicon-th\"></span>";
					echo "</div>";
					echo "</div>";
				}
				else {
					echo "<input type=\"text\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" placeholder=\"Opis\" value=\"$opis\" required>";
				}
				echo "</div>";
			}
			@endphp
			</div>
			@isset($aktivnostiNovorojencek)
			<div class="panel-heading">
			<h3 class="panel-title">Izvajanje aktivnosti novorojenčku</h3>
			@php
			foreach($mini->otroci as $otrok){
				echo "<div class=\"form-group\">";
				echo "<label class=\"label label-primary\">Ime in priimek novorojenčka</label>";
				echo "<input type =\"text\" class=\"form-control nalog\" name=\"imePriimekZavOsebe\" value=\"$otrok->ime $otrok->priimek\" disabled></input>";
				echo "</div>";
				$gArray = [54];
				$cmArray = [55];
				$DaNeArray = [56,57];
				$izlocanjeArray = [58];
				$porocila = $obisk->porocilo;
					foreach ($aktivnostiNovorojencek as $aktivnostNovorojencek){
						$opis = null;
						foreach($porocila as $porocilo){
							if ($porocilo['aid'] == $aktivnostNovorojencek->aid){
								$opis = $porocilo->opis;
							}
						}
						echo "<div class=\"form-group\">";
						echo "<label class=\"label label-primary\">$aktivnostNovorojencek->ime_aktivnosti</label>";
						if (in_array($aktivnostNovorojencek->aid, $gArray)){
								echo "<input type=\"number\" name=\"$aktivnostNovorojencek->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Trenutna teza [g]\" required>";
						}
						else if (in_array($aktivnostNovorojencek->aid, $cmArray)){
								echo "<input type=\"number\" name=\"$aktivnostNovorojencek->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Trenutna visina [cm]\" required>";
						} 
						else if (in_array($aktivnostNovorojencek->aid, $DaNeArray)){
							if(isset($opis)){
								$decoded = json_decode($opis);
								$dec_da = $decoded->dane;
								$dec_opis = $decoded->opis;
								if($dec_da == "ne"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ne\" name=\"$aktivnostNovorojencek->aid dane\" required>Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"da\" name=\"$aktivnostNovorojencek->aid dane\" checked required>Ne</label>";
								} else {
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ne\" name=\"$aktivnostNovorojencek->aid dane\" checked required>Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"da\" name=\"$aktivnostNovorojencek->aid dane\" required>Ne</label>";
								}
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis\" class=\"form-control input-sm opis\" value=\"$dec_opis\" placeholder=\"Opis\" required>";

							} else {
								echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ne\" name=\"$aktivnostNovorojencek->aid dane\" required>Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"da\" name=\"$aktivnostNovorojencek->aid dane\" required>Ne</label>";
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis\" class=\"form-control input-sm opis\" placeholder=\"Opis\" required>";
							} 
						}
						else if (in_array($aktivnostNovorojencek->aid, $izlocanjeArray)){
							if(isset($opis)){
								$decoded = json_decode($opis);
								$dec_def = $decoded->defekacija;
								$dec_opis = $decoded->opis;
								if($dec_def == "ni"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" checked required>Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Bruhanje</label>";
								} else if($dec_def == "mikcija"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" checked required>Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Bruhanje</label>";
								} else if($dec_def == "defekacija"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" checked required>Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Bruhanje</label>";
								} else if($dec_def == "kolike"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" checked required>Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Bruhanje</label>";
								} else if($dec_def == "polivanje"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" checked required>Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Bruhanje</label>";
								} else {
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" checked required>Bruhanje</label>";
								}
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis\" class=\"form-control input-sm\" value=\"$dec_opis\" required>";
							} else {
								echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" required>Bruhanje</label>";
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" required>";
							} 
						}
						else {

							echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Opis\" required>";
						}
						
					}
				}
		@endphp
		
		</div>
		@endisset
		@php
			$time = Carbon\Carbon::now()->addHours(2);
			//TODO: Tu najdite datum plana in ga primerjajte z $time
			$datumPlan = Carbon\Carbon::now()->addHours(-22);
			$diffInDays = $time->diff($datumPlan)->days;
			if($diffInDays >= 1){
				echo "<div class=\"checkbox\">";
				  echo "<label><input type=\"checkbox\" value=\"razlikaVDnevihPotrditev\" required> Datuma sta različna. Ste prepričani, da želite nadaljevati? </label>";
				echo "</div>";
			}
		@endphp
		<input type="submit" value="Vnesi podatke" class="btn btn-info btn-block" >	
		<input type="hidden" name="_token" value="{{ Session::token() }}"/>
		</form>
	  </div>
	</div>
</div>