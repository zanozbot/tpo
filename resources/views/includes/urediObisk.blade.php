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
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">1 - Izvajalec</h3>
				  </div>
				  <div class="panel-body">
					  <div class="row">
						<div class="col-lg-6">
						  <div class="form-group">
							<label class="label label-primary">Številka izvajalca</label>
							<div class="form-control nalog" name="stIzvajalca"><label>{{$obisk->sifra_zd}}</label></div>
						  </div>
						</div>
					  </div>
					  <div class="form-group">
						<label class="label label-primary">Naziv izvajalca</label>
						<div class="form-control nalog" name="nazivIzvajalca"><label>{{$obisk->naziv_izvajalca}}</label></div>
					  </div>
				  </div>
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">2 - Zavarovana oseba</h3>
				  </div>
				  <div class="panel-body">
					  <div class="form-group">
						<label class="label label-primary">Številka zavarovane osebe</label>
						<div class="form-control nalog" name="stZavOsebe"><label>{{$obisk->stevilka_KZZ}}</label></div>
					  </div>
					  <div class="form-group">
						<label class="label label-primary">Datum rojstva</label>
						<div class="form-control nalog" name="rojstvoZavOsebe"><label id="dat_roj_{{$obisk->sifra_obisk}}"></label></div>
					  </div>
					  <script>
					  	var prvotniDatum = "{{$obisk->datum_rojstva}}";
					  	var arrStringov = prvotniDatum.split("-");
					  	var preurejeniDatum = arrStringov[2].concat(".".concat(arrStringov[1].concat(".".concat(arrStringov[0]))));
					  	$("#dat_roj_{{$obisk->sifra_obisk}}").html(preurejeniDatum);
					  </script>
					  <div class="form-group">
						<label class="label label-primary">Priimek</label>
						<div class="form-control nalog" name="priimekZavOsebe"><label>{{$obisk->priimek_pacienta}}</label></div>
					  </div>
					  <div class="form-group">
						<label class="label label-primary">Ime</label>
						<div class="form-control nalog" name="imeZavOsebe"><label>{{$obisk->ime_pacienta}}</label></div>
					  </div>
					  <div class="form-group">
						<label class="label label-primary">Ulica in hišna številka</label>
						<div class="form-control nalog" name="ulicaZavOsebe"><label>{{$obisk->naslov_pacienta}}</label></div>
					  </div>
					  <div class="row">
						<div class="col-lg-6">
						  <div class="form-group">
							<label class="label label-primary">Poštna številka</label>
							<div class="form-control nalog" name="postaZavOsebe"><label>{{$obisk->posta_pacient}}</label></div>
						  </div>
						</div>
						<div class="col-lg-6">
						  <div class="form-group">
							<label class="label label-primary">Kraj</label>
							<div class="form-control nalog" name="krajZavOsebe"><label>{{$obisk->kraj_poste}}</label></div>
						  </div>
						</div>
					  </div>
					  <div class="form-group">
						<label class="label label-primary">Email</label>
						<div class="form-control nalog" name="emailZavOsebe"><label>{{$obisk->email}}</label></div>
					  </div>
					  <div class="form-group">
						<label class="label label-primary">Telefonska številka</label>
						<div class="form-control nalog" name="telZavOsebe"><label>{{$obisk->tel_stevilka}}</label></div>
					  </div>			  
				  </div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-6">
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">3 - Zdravnik</h3>
				  </div>
				  <div class="panel-body">
					  <div class="form-group">
						<label class="label label-primary">Številka zdravnika</label>
						<div class="form-control nalog" name="stZdravnika"><label>{{$obisk->sifra_delavca}}</label></div>
					  </div>
				  </div>
				</div>
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">4 - Storitev</h3>
				  </div>
				  <div class="panel-body">
				  	<div class="panel-body">
					  	<div class="form-group">
						    <label class="label label-primary">Šifra delovnega naloga</label>
							<div class="form-control nalog" name="vrstaStoritve"><label>{{$obisk->sifra_dn}}</label></div>
						</div>				  
						<div class="form-group">
				    		<label class="label label-primary">Šifra obiska</label>
							<div class="form-control nalog" name="vrstaStoritve"><label>{{$obisk->sifra_obisk}}</label></div>
						</div>
						<div class="form-group">
						    <label class="label label-primary">Ime obiska</label>
							<div class="form-control nalog" name="vrstaStoritve"><label>{{$obisk->ime_vrsta_obiska}}</label></div>
						</div>
						<div class="form-group">
						    <label class="label label-primary">Datum obiska</label>
							<div class="form-control nalog" name="datumStoritve"><label id="dat_ob_{{$obisk->sifra_obisk}}"></label></div>
							@if ($obisk->opravljen == 1)
								<script>
								  	var prvotniDatum = "{{$obisk->dejanski_datum_obiska}}";
								  	var arrStringov = prvotniDatum.split("-");
								  	var preurejeniDatum = arrStringov[2].concat(".".concat(arrStringov[1].concat(".".concat(arrStringov[0]))));
								  	$("#dat_ob_{{$obisk->sifra_obisk}}").html(preurejeniDatum);
								</script>
							@else
								<script>
								  	var prvotniDatum = "{{$obisk->predvideni_datum_obiska}}";
								  	var arrStringov = prvotniDatum.split("-");
								  	var preurejeniDatum = arrStringov[2].concat(".".concat(arrStringov[1].concat(".".concat(arrStringov[0]))));
								  	$("#dat_ob_{{$obisk->sifra_obisk}}").html(preurejeniDatum);
								</script>
							@endif
						</div>
						<div class="form-group" >
							<label class="label label-primary">Vrsta obiska</label>
							@if ($obisk->preventivni == 1)
								<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" readonly checked>Preventivni</label>
								<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" readonly>Kurativni</label>
							@else
								<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" readonly>Preventivni</label>
								<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" readonly checked>Kurativni</label>
							@endif
						</div>
					  </div>
					</div>
				</div>
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">5 - Bolezen</h3>
				  </div>
				  <div class="panel-body">
				  	  <div class="form-group">
					    <label class="label label-primary">Šifra bolezni</label>
						<div class="form-control nalog" name="vrstaStoritve"><label>{{$obisk->sifra_bolezni}}</label></div>
					  </div>				  
					  <div class="form-group">
					    <label class="label label-primary">Ime bolezni</label>
						<div class="form-control nalog" name="vrstaStoritve"><label>{{$obisk->ime_bolezni}}</label></div>
					  </div>
					</div>
				</div>
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">6 - Zadolžena patronažna sestra</h3>
				  </div>
				  <div class="panel-body">
				  	  <div class="form-group">
					    <label class="label label-primary">Šifra sestre</label>
						<div class="form-control nalog" name="vrstaStoritve"><label>{{$obisk->sifra_ps}}</label></div>
					  </div>
					  <div class="form-group" >
						<label class="label label-primary">Nadomeščanje</label>
						@if ($obisk->nadomescanje == 1)
							<label class="checkbox-inline"><input type="checkbox" name="nadomescanje" readonly checked>Da</label>
							<label class="checkbox-inline"><input type="checkbox" name="nadomescanje" readonly>Ne</label>
						@else
							<label class="checkbox-inline"><input type="checkbox" name="nadomescanje" readonly>Da</label>
							<label class="checkbox-inline"><input type="checkbox" name="nadomescanje" readonly checked>Ne</label>
						@endif
					  </div>
					</div>
				</div>
				@if ($obisk->ime_vrsta_obiska == 'Odvzem krvi')
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">7 - Odvzem krvi</h3>
				  </div>
				  <div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						  <div class="panel-heading">
							<h3 class="panel-title">Epruvete</h3>
						  </div>
						  <div class="panel-body">
							  <table class="table table-bordered">
								<thead>
								  <tr>
									<th>Barva</th>
									<th>Število</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td><label>Rdeča</label></td>
									<td><label id="rdeca_{{$obisk->sifra_obisk}}"></label></td>
								  </tr>
								  <tr>
									<td><label>Modra</label></td>
									<td><label id="modra_{{$obisk->sifra_obisk}}"></label></td>
								  </tr>
								  <tr>
									<td><label>Rumena</label></td>
									<td><label id="rumena_{{$obisk->sifra_obisk}}"></label></td>
								  </tr>
								  <tr>
									<td><label>Zelena</label></td>
									<td><label id="zelena_{{$obisk->sifra_obisk}}"></label></td>
								  </tr>
								</tbody>
							  </table>
							  <script>
								var stEp = "{{$obisk->stevilo_epruvet_RdMoRuZe}}";
				  				var arrStringovEp = stEp.split(" ");
				  				$("#rdeca_{{$obisk->sifra_obisk}}").html(arrStringovEp[0]);
				  				$("#modra_{{$obisk->sifra_obisk}}").html(arrStringovEp[1]);
				  				$("#rumena_{{$obisk->sifra_obisk}}").html(arrStringovEp[2]);
				  				$("#zelena_{{$obisk->sifra_obisk}}").html(arrStringovEp[3]);
							  </script>
						  </div>
					  </div>
				  </div>
				</div>
				@elseif ($obisk->ime_vrsta_obiska == 'Aplikacija injekcij')
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">7 - Aplikacija injekcij</h3>
				  </div>
				  <div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						

						  <div class="panel-heading">
							<h3 class="panel-title">Zdravila</h3>
						  </div>
						  <div class="panel-body">
							  <table class="table table-bordered">
								<thead>
								  <tr>
									<th>Šifra zdravila</th>
									<th>Ime zdravila</th>
									<th>Opis zdravila</th>
								  </tr>
								</thead>
								<tbody>
								@foreach ($obisk->zdravila as $zdravilo)
								  <tr>
									<td><label>{{$zdravilo->sifra_zdravila}}</label></td>
									<td><label>{{$zdravilo->ime_zdravila}}</label></td>
									<td><label>{{$zdravilo->opis_zdravila}}</label></td>
								  </tr>
								@endforeach
								</tbody>
							  </table>
						  </div>
					  </div>
				  </div>
				</div>
				@elseif ($obisk->ime_vrsta_obiska == 'Obisk otročnice')
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">7 - Obisk otročnice</h3>
				  </div>
				  <div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						

						  <div class="panel-heading">
							<h3 class="panel-title">Otroci</h3>
						  </div>
						  <div class="panel-body">
							  <table class="table table-bordered">
								<thead>
								  <tr>
									<th>Številka KZZ</th>
									<th>Ime</th>
									<th>Datum rojstva</th>
								  </tr>
								</thead>
								<tbody>
								  @foreach ($obisk->otroci as $otrok)
								  <tr>
									<td><label>{{$otrok->stevilka_KZZ}}</label></td>
									<td><label>{{$otrok->ime}} {{$otrok->priimek}}</label></td>
									<td><label id="dat_roj_ot_{{$obisk->sifra_obisk}}_{{$otrok->stevilka_KZZ}}"></label></td>
									<script>
									  	var prvotniDatumOt = "{{$otrok->datum_rojstva}}";
									  	var arrStringovOt = prvotniDatumOt.split("-");
									  	var preurejeniDatumOt = arrStringovOt[2].concat(".".concat(arrStringovOt[1].concat(".".concat(arrStringovOt[0]))));
									  	$("#dat_roj_ot_{{$obisk->sifra_obisk}}_{{$otrok->stevilka_KZZ}}").html(preurejeniDatumOt);
									</script>
								  </tr>
								  @endforeach
								</tbody>
							  </table>
						  </div>
					  </div>
				  </div>
				</div>
				@endif
			</div>
		</div>
	  </div>
	</div>
	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Izvajanje aktivnosti</h3>
		@if ($vceraj == 1)
			<form role="form" method="POST" action="{{ route('seznamObiskovVcerajVnesiPodatke', ['sifraObisk' => $obisk->sifra_obisk]) }}">
		@else
			<form role="form" method="POST" action="{{ route('vnesiPodatke', ['sifraObisk' => $obisk->sifra_obisk, 'sifraPlan' => $sifraPlan, 'izbraniDatum' => $izbraniDatum]) }}">
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
			foreach($obisk->aktivnosti as $aktivnost){
				if(!in_array($aktivnost->aid, $knjizicaArray)){
				echo "<div class=\"form-group\">";
				echo "<label class=\"label label-primary\">$aktivnost->ime_aktivnosti</label>";
				}
				$porocila = $obisk->porocilo;
				$opis = null;


				foreach($porocila as $porocilo){
					if ($porocilo['aid'] == $aktivnost->aid){
						$opis = $porocilo->opis;
					}
				}
				if (in_array($aktivnost->aid, $srcniArray)){
					echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">Udarci/minuto</span>";
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Udarci na minuto\" min=\"1\" max=\"200\">";
					echo "</div>";

				}
				else if (in_array($aktivnost->aid, $terapijaArray)){
					echo "<div class=\"input-group\">";
					echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid terapija\" value=\"da\" >Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid terapija\" value=\"delno\" >Delno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid terapija\" value=\"ne\" >Ne</label>";
					echo "</div>";
					echo "<div class=\"input-group\">";
					echo "<span class=\"input-group-addon\">Opis</span>";
					echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
					echo "</div>";
				}
				else if (in_array($aktivnost->aid, $oksigenacijaArray)){
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">%</span>";
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"\" min=\"0\" max=\"100\">";
						echo "</div>";
				}
				else if (in_array($aktivnost->aid, $sladkorArray)){
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">mmol/L</span>";
						echo "<input type=\"number\" name=\"$aktivnost->aid num\" class=\"form-control input-sm\" placeholder=\"\" min=\"0\" max=\"20\">";
						echo "</div>";
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">Opis</span>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
						echo "</div>";
				}
				else if (in_array($aktivnost->aid, $knjizicaArray)){
					









				}
				else if (in_array($aktivnost->aid, $cutilaArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_vid = $decoded->vid;
							$dec_vonj = $decoded->vonj;
							$dec_sluh = $decoded->sluh;
							$dec_okus = $decoded->okus;
							$dec_otip = $decoded->otip;
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Vid</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid vid\" class=\"form-control input-sm\" value=\"$dec_vid \" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Vonj</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid vonj\" class=\"form-control input-sm\" value=\"$dec_vonj\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Sluh</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid sluh\" class=\"form-control input-sm\" value=\"$dec_sluh\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Okus</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid okus\" class=\"form-control input-sm\" value=\"$dec_okus\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Otip</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid otip\" class=\"form-control input-sm\" value=\"$dec_otip\" >";
							echo "</div>";
						} else {
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Vid</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid vid\" class=\"form-control input-sm\" placeholder=\"Opis vida\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Vonj</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid vonj\" class=\"form-control input-sm\" placeholder=\"Opis vonja\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Sluh</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid sluh\" class=\"form-control input-sm\" placeholder=\"Opis sluha\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Okus</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid okus\" class=\"form-control input-sm\" placeholder=\"Opis okusa\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Otip</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid otip\" class=\"form-control input-sm\" placeholder=\"Opis otipa\" >";
							echo "</div>";
						}
				}
				else if (in_array($aktivnost->aid, $izlocanjeArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_urin = $decoded->urin;
							$dec_blato = $decoded->blato;
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Urin</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid urin\" class=\"form-control input-sm\" value=\"$dec_urin\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Blato</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid blato\" class=\"form-control input-sm\" value=\"$dec_blato\" >";
							echo "</div>";
						} else {
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Urin</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid urin\" class=\"form-control input-sm\" placeholder=\"Opis urina\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Blato</span>";
							echo "<input type=\"text\" name=\"$aktivnost->aid blato\" class=\"form-control input-sm\" placeholder=\"Opis blata\" >";
							echo "</div>";
						}
						
				}
				else if (in_array($aktivnost->aid, $kgArray)){
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">kg</span>";
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"\" min=\"0\" max=\"999\">";
						echo "</div>";
				}
				else if (in_array($aktivnost->aid, $kriArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_rdeca = $decoded->rdeca;
							$dec_modra = $decoded->modra;
							$dec_rumena = $decoded->rumena;
							$dec_zelena = $decoded->zelena;
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Rdeca</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid rdeca\" class=\"form-control input-sm\" value=\"$dec_rdeca\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Modra</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid modra\" class=\"form-control input-sm\" value=\"$dec_modra\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Rumena</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid rumena\" class=\"form-control input-sm\" value=\"$dec_rumena\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Zelena</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid zelena\" class=\"form-control input-sm\" value=\"$dec_zelena\" >";
							echo "</div>";
						} else {
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Rdeca</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid rdeca\" class=\"form-control input-sm\" placeholder=\"Rdeca\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Modra</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid modra\" class=\"form-control input-sm\" placeholder=\"Modra\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Rumena</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid rumena\" class=\"form-control input-sm\" placeholder=\"Rumena\" >";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Zelena</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid zelena\" class=\"form-control input-sm\" placeholder=\"Zelena\" >";
							echo "</div>";
						}
				}
				else if (in_array($aktivnost->aid, $temperaturaArray)){
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">°C</span>";
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"\" min=\"10\" max=\"49\">";
						echo "</div>";
				}
				else if (in_array($aktivnost->aid, $dihalniArray)){
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">Vdihi/minuto</span>";
						echo "<input type=\"number\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Vdihi na minuto\" min=\"1\" max=\"99\">";
						echo "</div>";
				}
				else if (in_array($aktivnost->aid, $tlakArray)){
						if(isset($opis)){
							$decoded = json_decode($opis);
							$dec_sis = $decoded->sis;
							$dec_dia = $decoded->dia;
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">mm Hg Sistolični</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid sis\" class=\"form-control input-sm\" value=\"$dec_sis\" placeholder=\"Sistolični (mm Hg)\" min=\"20\" max=\"200\">";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">mm Hg Diastolični</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid dia\" class=\"form-control input-sm\" value=\"$dec_dia\" placeholder=\"Diastolični (mm Hg)\" min=\"10\" max=\"100\">";
							echo "</div>";
						} else {
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">mm Hg Sistolični</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid sis\" class=\"form-control input-sm\" placeholder=\"Sistolični (mm Hg)\" min=\"20\" max=\"200\">";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">mm Hg Diastolični</span>";
							echo "<input type=\"number\" name=\"$aktivnost->aid dia\" class=\"form-control input-sm\" placeholder=\"Diastolični (mm Hg)\" min=\"10\" max=\"100\">";
							echo "</div>";
						}
				}
				else if (in_array($aktivnost->aid, $neodvisenArray)){
					if(isset($opis)){
						$decoded = json_decode($opis);
						$dec_odvisnost = $decoded->odvisnost;
						$dec_opis = $decoded->opis;
						if($dec_odvisnost == "samostojen"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" checked >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" >Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" >Pomoč drugih</label>";
						} else if($dec_odvisnost == "delnoOdvisen"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" checked >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" >Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" >Pomoč drugih</label>";
						} else if($dec_odvisnost == "povsemOdvisen"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" checked >Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" >Pomoč drugih</label>";
						} else if($dec_odvisnost == "pomocSvojcev"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" >Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" checked >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" >Pomoč drugih</label>";
						} else if($dec_odvisnost == "pomocDrugih"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" >Povsem odvisen</label>";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" checked >Pomoč drugih</label>";

						} 
						echo "</div>";
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">Opis</span>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" value=\"$dec_opis\" >";
						echo "</div>";
					} else {
						echo "<div class=\"input-group\">";
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value =\"samostojen\" >Samostojen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"delnoOdvisen\" >Delno odvisen</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"povsemOdvisen\" >Povsem odvisen</label>";
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocSvojcev\" >Pomoč svojcev</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid odvisnost\" value=\"pomocDrugih\" >Pomoč drugih</label>";
						
						echo "</div>";
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">Opis</span>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
						echo "</div>";
					}
					
				}
				else if (in_array($aktivnost->aid, $motenoArray)){
					if(isset($opis)){
						$decoded = json_decode($opis);
						$dec_opis = $decoded->opis;
						$dec_mot = $decoded->mot;
						if ($dec_mot == "moteno"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"moteno\" checked >Moteno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"niMoteno\" >Ni moteno</label><br/>";
							echo "</div>";
						} else if ($dec_mot == "niMoteno"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"moteno\" >Moteno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"niMoteno\" checked >Ni moteno</label>";
							echo "</div>";
						} 				
						
					}else {
						echo "<div class=\"input-group\">";
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"moteno\" >Moteno</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid mot\" value=\"niMoteno\" >Ni moteno</label>";
						echo "</div>";
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">Opis</span>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
						echo "</div>";
					}	
				}
				else if (in_array($aktivnost->aid, $nizSreVisArray)){
					$dec_fizicna = "";
					if(isset($opis)){
						$decoded = json_decode($opis);
						$dec_opis = $decoded->opis;
						$dec_fizicna = $decoded->fizicna;
						$decoded = json_decode($opis);
						$dec_opis = $decoded->opis;
						$dec_fizicna = $decoded->fizicna;
						if($dec_fizicna == "nizka"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" checked >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" >Visoka</label>";
						} else if ($dec_fizicna == "srednja"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" checked >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" >Visoka</label>";
						} else if ($dec_fizicna == "visoka"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" checked >Visoka</label>";
						}
						echo "</div>";
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">Opis</span>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" value=\"$dec_opis\"placeholder=\"Opis\" >";
						echo "</div>";
						if($dec_fizicna == "nizka"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" checked >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" >Visoka</label>";
						} else if ($dec_fizicna == "srednja"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" checked >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" >Visoka</label>";
						} else if ($dec_fizicna == "visoka"){
							echo "<div class=\"input-group\">";
							echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" checked >Visoka</label>";
						}
						echo "</div>";
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">Opis</span>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" value=\"$dec_opis\"placeholder=\"Opis\" >";
						echo "</div>";
					} else {
						echo "<div class=\"input-group\">";
						echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"nizka\" >Nizka</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"srednja\" >Srednja</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" name=\"$aktivnost->aid fizicna\" value=\"visoka\" >Visoka</label>";
						echo "</div>";
						echo "<div class=\"input-group\">";
						echo "<span class=\"input-group-addon\">Opis</span>";
						echo "<input type=\"text\" name=\"$aktivnost->aid opis\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
						echo "</div>";
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
					echo "<div class=\"input-group\">";
					echo "<span class=\"input-group-addon\">Opis</span>";
					echo "<input type=\"text\" name=\"$aktivnost->aid\" class=\"form-control input-sm\" placeholder=\"Opis\" value=\"$opis\" >";
					echo "</div>";
				}
				echo "</div>";
			}
			@endphp
			</div>
			@isset($aktivnostiNovorojencek)
			<div class="panel-heading">
			<h3 class="panel-title">Izvajanje aktivnosti novorojenčku</h3>
			@php
			$porocilaPrvegaObiska = $obisk->obiski[0]->porocilaPrvegaObiska;
			foreach($obisk->otroci as $otrok){
				echo "<div class=\"form-group\">";
				echo "<label class=\"label label-primary\">Ime in priimek novorojenčka</label>";
				echo "<input type =\"text\" class=\"form-control nalog\" name=\"imePriimekZavOsebe\" value=\"$otrok->ime $otrok->priimek\" readonly></input>";
				echo "</div>";
				echo "<div class=\"form-group\">";
				echo "<label class=\"label label-primary\">Pregled materinske knjižice in odpustnice iz porodnišnice. </label>";
				if(!$porocilaPrvegaObiska->isEmpty()){
					foreach($porocilaPrvegaObiska as $porociloPO){
						$decoded = json_decode($porociloPO->opis);
						if ($decoded->KZZ == $otrok->stevilka_KZZ){
							$dec_datum = $decoded->datum;
							$dec_teza = $decoded->teza;
							$dec_visina = $decoded->visina;
							$dec_opis = $decoded->opis;
							echo "<div class=\"input-group\">";
							echo "<div class=\"datepicker input-group date\" data-provide=\"datepicker\">";
							echo "<div class=\"input-group-addon\">";
							echo "<span class=\"glyphicon glyphicon-th\"></span>";
							echo "</div>";
							echo "<input type=\"text\" class=\"form-control\" 
							value=\"$dec_datum\" name=\"25 datum $otrok->stevilka_KZZ\" readonly>";
							echo "</div>";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">g</span>";
							echo "<input type=\"number\" name=\"25 teza $otrok->stevilka_KZZ\" class=\"form-control input-sm\" value=\"$dec_teza\" placeholder=\"Porodna teza otroka\" readonly>";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">cm</span>";
							echo "<input type=\"number\" name=\"25 visina $otrok->stevilka_KZZ\" class=\"form-control input-sm\" value=\"$dec_visina\" placeholder=\"Porodna visina otroka\" readonly>";
							echo "</div>";
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Opis</span>";
							echo "<input type=\"text\" name=\"25 opis $otrok->stevilka_KZZ\" class=\"form-control input-sm\" value=\"$dec_opis\" readonly>";
							echo "</div>";
						}
					}
				} else {
					echo "<div class=\"input-group\">";
					echo "<div class=\"datepicker input-group date\" data-provide=\"datepicker\">";
					echo "<div class=\"input-group-addon\">";
					echo "<span class=\"glyphicon glyphicon-th\"></span>";
					echo "</div>";
					echo "<input type=\"text\" class=\"form-control\" placeholder=\"Datum rojstva otroka dd.mm.llll\" name=\"25 datum $otrok->stevilka_KZZ\">";
					echo "</div>";
					echo "</div>";
					echo "<div class=\"input-group\">";
					echo "<span class=\"input-group-addon\">g</span>";
					echo "<input type=\"number\" name=\"25 teza $otrok->stevilka_KZZ\" class=\"form-control input-sm\" placeholder=\"Porodna teza otroka [g]\" min=\"100\" max=\"9999\">";
					echo "</div>";
					echo "<div class=\"input-group\">";
					echo "<span class=\"input-group-addon\">cm</span>";
					echo "<input type=\"number\" name=\"25 visina $otrok->stevilka_KZZ\" class=\"form-control input-sm\" placeholder=\"Porodna visina otroka [cm]\" min=\"10\" max=\"99\">";
					echo "</div>";
					echo "<div class=\"input-group\">";
					echo "<span class=\"input-group-addon\">Opis</span>";
					echo "<input type=\"text\" name=\"25 opis $otrok->stevilka_KZZ\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
					echo "</div>";
				}
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
								echo "<div class=\"input-group\">";
								echo "<span class=\"input-group-addon\">Trenutna teza [g]</span>";
								echo "<input type=\"number\" name=\"$aktivnostNovorojencek->aid $otrok->stevilka_KZZ\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Trenutna teza [g]\" min=\"100\" max=\"99999\">";
								echo "</div>";
						}
						else if (in_array($aktivnostNovorojencek->aid, $cmArray)){
								echo "<div class=\"input-group\">";
								echo "<span class=\"input-group-addon\">Trenutna visina [cm]</span>";
								echo "<input type=\"number\" name=\"$aktivnostNovorojencek->aid $otrok->stevilka_KZZ\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Trenutna visina [cm]\" min=\"10\" max=\"150\">";
								echo "</div>";
						} 
						else if (in_array($aktivnostNovorojencek->aid, $DaNeArray)){
							if(isset($opis)){
								$decoded = json_decode($opis);
								$dec_da = $decoded->dane;
								$dec_opis = $decoded->opis;
								if($dec_da == "ne"){
									echo "<div class=\"input-group\">";
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ne\" name=\"$aktivnostNovorojencek->aid dane $otrok->stevilka_KZZ\" >Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"da\" name=\"$aktivnostNovorojencek->aid dane\" checked >Ne</label>";
								} else {
									echo "<div class=\"input-group\">";
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ne\" name=\"$aktivnostNovorojencek->aid dane $otrok->stevilka_KZZ\" checked >Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"da\" name=\"$aktivnostNovorojencek->aid dane $otrok->stevilka_KZZ\" >Ne</label>";
								}
								echo "</div>";
								echo "<div class=\"input-group\">";
								echo "<span class=\"input-group-addon\">Opis</span>";
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis $otrok->stevilka_KZZ\" class=\"form-control input-sm opis\" value=\"$dec_opis\" placeholder=\"Opis\" >";
								echo "</div>";

							} else {
								echo "<div class=\"input-group\">";
								echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ne\" name=\"$aktivnostNovorojencek->aid dane $otrok->stevilka_KZZ\" >Da</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"da\" name=\"$aktivnostNovorojencek->aid dane $otrok->stevilka_KZZ\" >Ne</label>";
								echo "</div>";
								echo "<div class=\"input-group\">";
								echo "<span class=\"input-group-addon\">Opis</span>";
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis $otrok->stevilka_KZZ\" class=\"form-control input-sm opis\" placeholder=\"Opis\" >";
								echo "</div>";
							} 
						}
						else if (in_array($aktivnostNovorojencek->aid, $izlocanjeArray)){
							if(isset($opis)){
								$decoded = json_decode($opis);
								$dec_def = $decoded->defekacija;
								$dec_opis = $decoded->opis;
								if($dec_def == "ni"){
									echo "<div class=\"input-group\">";
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" checked >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Bruhanje</label>";
								} else if($dec_def == "mikcija"){
									echo "<div class=\"input-group\">";
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" checked >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Bruhanje</label>";
								} else if($dec_def == "defekacija"){
									echo "<div class=\"input-group\">";
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" checked >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija\" >Bruhanje</label>";
								} else if($dec_def == "kolike"){
									echo "<div class=\"input-group\">";
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" checked >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Bruhanje</label>";
								} else if($dec_def == "polivanje"){
									echo "<div class=\"input-group\">";
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" checked >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Bruhanje</label>";
								} else {
									echo "<div class=\"input-group\">";
									echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" checked >Bruhanje</label>";
								}
								echo "</div>";
								echo "<div class=\"input-group\">";
								echo "<span class=\"input-group-addon\">Opis</span>";
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis $otrok->stevilka_KZZ\" class=\"form-control input-sm\" value=\"$dec_opis\" >";
								echo "</div>";
							} else {
								echo "<div class=\"input-group\">";
								echo "<label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"ni\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Ni posebnosti</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"mikcija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Mikcija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"defekacija\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Defekacija</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"kolike\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Kolike</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"polivanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Polivanje</label><label class=\"radio-inline\"><input type=\"radio\" class=\"radio-inline\" value=\"bruhanje\" name=\"$aktivnostNovorojencek->aid defekacija $otrok->stevilka_KZZ\" >Bruhanje</label>";
								echo "</div>";
								echo "<div class=\"input-group\">";
								echo "<span class=\"input-group-addon\">Opis</span>";
								echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid opis $otrok->stevilka_KZZ\" class=\"form-control input-sm\" placeholder=\"Opis\" >";
								echo "</div>";
							} 
						}
						else {
							echo "<div class=\"input-group\">";
							echo "<span class=\"input-group-addon\">Opis</span>";
							echo "<input type=\"text\" name=\"$aktivnostNovorojencek->aid $otrok->stevilka_KZZ\" class=\"form-control input-sm\" value=\"$opis\" placeholder=\"Opis\" >";
							echo "</div>";
						}
						
					}
				}
			echo "<script>$('.datepicker').datepicker({format: 'dd.mm.yyyy', clearBtn: true, autoclose: true});</script>";
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