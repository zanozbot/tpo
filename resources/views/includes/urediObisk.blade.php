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
		@if ($vceraj == 1)
			<form role="form" method="POST" action="{{ route('seznamObiskovVcerajVnesiPodatke', ['sifraObisk' => $obisk->sifra_obisk, 'sifraPlan' => $sifraPlan]) }}">
		@else
			<form role="form" method="POST" action="{{ route('vnesiPodatke', ['sifraObisk' => $obisk->sifra_obisk, 'sifraPlan' => $sifraPlan]) }}">
		@endif

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
					
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Udarci na minuto\" >";
				}
				else if (in_array($aktivnost->aid, $terapijaArray)){
					echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid terapija\" value=\"da\" >Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid terapija\" value=\"delno\" >Delno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid terapija\" value=\"ne\" >Ne</label>";
					echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
				}
				else if (in_array($aktivnost->aid, $oksigenacijaArray)){
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"%\" >";
				}
				else if (in_array($aktivnost->aid, $sladkorArray)){
						echo "<input type=\"number\" name=\"$aktivnost->aid num\" class=\"form-control input-sm\" placeholder=\"mmol/L\" >";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
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
						echo "<script>$('.datepicker').datepicker({format: 'dd.mm.yyyy', clearBtn: true, autoclose: true});</script>";
						echo "</div>";
						echo "<input type=\"number\" name=\"$aktivnost->aid teza\" class=\"form-control input-sm\" placeholder=\"Porodna teza otroka [g]\" >";
						echo "<input type=\"number\" name=\"$aktivnost->aid visina\" class=\"form-control input-sm\" placeholder=\"Porodna visina otroka [cm]\" >";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
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
							echo "<input type=\"text\" name=\"$aktivnost->aid vid\" class=\"form-control input-sm\" value=\"$dec_vid \" >";
							echo "<input type=\"text\" name=\"$aktivnost->aid vonj\" class=\"form-control input-sm\" value=\"$dec_vonj\" >";
							echo "<input type=\"text\" name=\"$aktivnost->aid sluh\" class=\"form-control input-sm\" value=\"$dec_sluh\" >";
							echo "<input type=\"text\" name=\"$aktivnost->aid okus\" class=\"form-control input-sm\" value=\"$dec_okus\" >";
							echo "<input type=\"text\" name=\"$aktivnost->aid otip\" class=\"form-control input-sm\" value=\"$dec_otip\" >";
						} else {
							echo "<input type=\"text\" name=\"$aktivnost->aid vid\" class=\"form-control input-sm\" placeholder=\"Opis vida\" >";
							echo "<input type=\"text\" name=\"$aktivnost->aid vonj\" class=\"form-control input-sm\" placeholder=\"Opis vonja\" >";
							echo "<input type=\"text\" name=\"$aktivnost->aid sluh\" class=\"form-control input-sm\" placeholder=\"Opis sluha\" >";
							echo "<input type=\"text\" name=\"$aktivnost->aid okus\" class=\"form-control input-sm\" placeholder=\"Opis okusa\" >";
							echo "<input type=\"text\" name=\"$aktivnost->aid otip\" class=\"form-control input-sm\" placeholder=\"Opis otipa\" >";
						}
				}
				else if (in_array($aktivnost->aid, $izlocanjeArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_urin = $decoded->urin;
							$dec_blato = $decoded->blato;
							echo "<input type=\"text\" name=\"$aktivnost->aid urin\" class=\"form-control input-sm\" value=\"$dec_urin\" >";
							echo "<input type=\"text\" name=\"$aktivnost->aid blato\" class=\"form-control input-sm\" value=\"$dec_blato\" >";
						} else {
							echo "<input type=\"text\" name=\"$aktivnost->aid urin\" class=\"form-control input-sm\" placeholder=\"Opis urina\" >";
							echo "<input type=\"text\" name=\"$aktivnost->aid blato\" class=\"form-control input-sm\" placeholder=\"Opis blata\" >";
						}
						
				}
				else if (in_array($aktivnost->aid, $kgArray)){
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"kg\" >";
				}
				else if (in_array($aktivnost->aid, $kriArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_rdeca = $decoded->rdeca;
							$dec_modra = $decoded->modra;
							$dec_rumena = $decoded->rumena;
							$dec_zelena = $decoded->zelena;
							echo "<input type=\"number\" name=\"$aktivnost->aid rdeca\" class=\"form-control input-sm\" value=\"$dec_rdeca\" >";
							echo "<input type=\"number\" name=\"$aktivnost->aid modra\" class=\"form-control input-sm\" value=\"$dec_modra\" >";
							echo "<input type=\"number\" name=\"$aktivnost->aid rumena\" class=\"form-control input-sm\" value=\"$dec_rumena\" >";
							echo "<input type=\"number\" name=\"$aktivnost->aid zelena\" class=\"form-control input-sm\" value=\"$dec_zelena\" >";
						} else {
							echo "<input type=\"number\" name=\"$aktivnost->aid rdeca\" class=\"form-control input-sm\" placeholder=\"Rdeca\" >";
							echo "<input type=\"number\" name=\"$aktivnost->aid modra\" class=\"form-control input-sm\" placeholder=\"Modra\" >";
							echo "<input type=\"number\" name=\"$aktivnost->aid rumena\" class=\"form-control input-sm\" placeholder=\"Rumena\" >";
							echo "<input type=\"number\" name=\"$aktivnost->aid zelena\" class=\"form-control input-sm\" placeholder=\"Zelena\" >";
						}
				}
				else if (in_array($aktivnost->aid, $temperaturaArray)){
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"°C\" >";
				}
				else if (in_array($aktivnost->aid, $dihalniArray)){
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Vdihi na minuto\" >";
				}
				else if (in_array($aktivnost->aid, $tlakArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_sis = $decoded->sis;
							$dec_dia = $decoded->dia;
							echo "<input type=\"number\" name=\"$aktivnost->aid sis\" class=\"form-control input-sm\" value=\"$dec_sis\" placeholder=\"Sistolični (mm Hg)\" >";
							echo "<input type=\"number\" name=\"$aktivnost->aid dia\" class=\"form-control input-sm\" value=\"$dec_dia\" placeholder=\"Diastolični (mm Hg)\" >";
						} else {
							echo "<input type=\"number\" name=\"$aktivnost->aid sis\" class=\"form-control input-sm\" placeholder=\"Sistolični (mm Hg)\" >";
							echo "<input type=\"number\" name=\"$aktivnost->aid dia\" class=\"form-control input-sm\" placeholder=\"Diastolični (mm Hg)\" >";
						}
				}
				else if (in_array($aktivnost->aid, $neodvisenArray)){
					if(isset($opis)){
						$decoded = json_decode($opis);
						$dec_odvisnost = $decoded->odvisnost;
						$dec_opis = $decoded->opis;
						if($dec_odvisnost == "samostojen"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" checked >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" >Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" >Pomoč drugih</label>";
						} else if($dec_odvisnost == "delnoOdvisen"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" checked >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" >Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" >Pomoč drugih</label>";
						} else if($dec_odvisnost == "povsemOdvisen"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" checked >Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" >Pomoč drugih</label>";
						} else if($dec_odvisnost == "pomocSvojcev"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" >Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" checked >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" >Pomoč drugih</label>";
						} else if($dec_odvisnost == "pomocDrugih"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" >Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" checked >Pomoč drugih</label>";

						} 
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" value=\"$dec_opis\" >";
					} else {
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" >Povsem odvisen</label>";
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" >Pomoč drugih</label>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
					}
					
				}
				else if (in_array($aktivnost->aid, $motenoArray)){
					if(isset($opis)){
						$decoded = json_decode($opis);
						$dec_opis = $decoded->opis;
						$dec_mot = $decoded->mot;
						if ($dec_mot == "moteno"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"moteno\" checked >Moteno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"niMoteno\" >Ni moteno</label>";
						} else if ($dec_mot == "niMoteno"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"moteno\" >Moteno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"niMoteno\" checked >Ni moteno</label>";
						} 				
						
					}else {
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"moteno\" >Moteno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"niMoteno\" >Ni moteno</label>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
					}	
				}
				else if (in_array($aktivnost->aid, $nizSreVisArray)){
					$dec_fizicna = "";
					if(isset($opis)){
						$decoded = json_decode($opis);
						$dec_opis = $decoded->opis;
						$dec_fizicna = $decoded->fizicna;
						if($dec_fizicna == "nizka"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" checked >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" >Visoka</label>";
						} else if ($dec_fizicna == "srednja"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" checked >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" >Visoka</label>";
						} else if ($dec_fizicna == "visoka"){
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" checked >Visoka</label>";
						}
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" value=\"$dec_opis\"placeholder=\"Opis\" >";
					} else {
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" >Visoka</label>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
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
					echo "<input type=\"text\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" placeholder=\"Opis\" value=\"$opis\" >";
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
								echo "<input type=\"number\" name=\"$aktivnostNovorojencek->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Trenutna teza [g]\" >";
						}
						else if (in_array($aktivnostNovorojencek->aid, $cmArray)){
								echo "<input type=\"number\" name=\"$aktivnostNovorojencek->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Trenutna visina [cm]\" >";
						} 
						else if (in_array($aktivnostNovorojencek->aid, $DaNeArray)){
							if(isset($opis)){
								$decoded = json_decode($opis);
								$dec_da = $decoded->dane;
								$dec_opis = $decoded->opis;
								if($dec_da == "ne"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ne\" name=\"$aktivnostNovorojencek->aid dane\" >Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"da\" name=\"$aktivnostNovorojencek->aid dane\" checked >Ne</label>";
								} else {
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ne\" name=\"$aktivnostNovorojencek->aid dane\" checked >Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"da\" name=\"$aktivnostNovorojencek->aid dane\" >Ne</label>";
								}
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis\" class=\"form-control input-sm opis\" value=\"$dec_opis\" placeholder=\"Opis\" >";

							} else {
								echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ne\" name=\"$aktivnostNovorojencek->aid dane\" >Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"da\" name=\"$aktivnostNovorojencek->aid dane\" >Ne</label>";
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis\" class=\"form-control input-sm opis\" placeholder=\"Opis\" >";
							} 
						}
						else if (in_array($aktivnostNovorojencek->aid, $izlocanjeArray)){
							if(isset($opis)){
								$decoded = json_decode($opis);
								$dec_def = $decoded->defekacija;
								$dec_opis = $decoded->opis;
								if($dec_def == "ni"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" checked >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Bruhanje</label>";
								} else if($dec_def == "mikcija"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" checked >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Bruhanje</label>";
								} else if($dec_def == "defekacija"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" checked >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Bruhanje</label>";
								} else if($dec_def == "kolike"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" checked >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Bruhanje</label>";
								} else if($dec_def == "polivanje"){
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" checked >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Bruhanje</label>";
								} else {
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" checked >Bruhanje</label>";
								}
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis\" class=\"form-control input-sm\" value=\"$dec_opis\" >";
							} else {
								echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Bruhanje</label>";
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
							} 
						}
						else {

							echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Opis\" >";
						}
						
					}
				}
		@endphp
		
		</div>
		@endisset
		@php
			if($vceraj == 1){
				echo "<div class=\"checkbox\">";
				  echo "<label><input type=\"checkbox\" value=\"razlikaVDnevihPotrditev\" required> Obisk je bil opravljen včeraj. Ali ste prepričani, da želite nadaljevati?</label>";
				echo "</div>";
			}
		@endphp
		<input type="submit" value="Vnesi podatke" class="btn btn-info btn-block" >	
		<input type="hidden" name="_token" value="{{ Session::token() }}"/>
		</form>
	  </div>
	</div>
</div>