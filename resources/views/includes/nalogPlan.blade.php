<div class="panel panel-default">			
  <div class="panel-heading">
	<h3 class="panel-title">Delovni nalog</h3>
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
			  	<div class="form-group">
				    <label class="label label-primary">Šifra obiska</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$obisk->sifra_obisk}}</label></div>
				  </div>				  
				  <div class="form-group">
				    <label class="label label-primary">Ime storitve</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$obisk->ime_vrsta_obiska}}</label></div>
				  </div>
				</div>
				<div class="form-group" >
					<label class="label label-primary">Vrsta storitve</label>
					@if ($obisk->preventivni == 1)
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled checked>Preventivni</label>
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>Kurativni</label>
					@else
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>Preventivni</label>
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled checked>Kurativni</label>
					@endif
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
				@if ($obisk->nadomescanje == 1)
					<div class="form-group">
					    <label class="label label-primary">Šifra sestre</label>
						<div class="form-control nalog" name="vrstaStoritve"><label>{{$obisk->sifra_nadomestne_ps}}</label></div>
					  </div>
					  <div class="form-group" >
						<label class="label label-primary">Nadomeščanje</label>
						<label class="checkbox-inline"><input type="checkbox" name="nadomescanje" disabled checked>Da</label>
						<label class="checkbox-inline"><input type="checkbox" name="nadomescanje" disabled>Ne</label>
					  </div>
				@else
					<div class="form-group">
					    <label class="label label-primary">Šifra sestre</label>
						<div class="form-control nalog" name="vrstaStoritve"><label>{{$obisk->sifra_ps}}</label></div>
					  </div>
					  <div class="form-group" >
						<label class="label label-primary">Nadomeščanje</label>
						<label class="checkbox-inline"><input type="checkbox" name="nadomescanje" disabled>Da</label>
						<label class="checkbox-inline"><input type="checkbox" name="nadomescanje" disabled checked>Ne</label>
					  </div>
				@endif
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
	<h3 class="panel-title">Seznam obiskov</h3>
  </div>
  <div class="panel-body">
	  <table class="table table-bordered">
		<thead>
		  <tr>
			<th>Šifra obiska</th>
			<th>Datum obiska</th>
			<th>Opravljen</th>
		  </tr>
		</thead>
		<tbody>
		@foreach ($obisk->obiski as $obiskIn)
		  <tr>
			<td><label>{{$obiskIn->sifra_obisk}}</label></td>
			<td><label id="dat_obiska_{{$obisk->sifra_obisk}}_{{$obiskIn->sifra_obisk}}"></label></td>
			<script>
			  	var prvotniDatumOb = "{{$obiskIn->datum_obiska}}";
			  	var arrStringovOb = prvotniDatumOb.split("-");
			  	var preurejeniDatumOb = arrStringovOb[2].concat(".".concat(arrStringovOb[1].concat(".".concat(arrStringovOb[0]))));
			  	$("#dat_obiska_{{$obisk->sifra_obisk}}_{{$obiskIn->sifra_obisk}}").html(preurejeniDatumOb);
			</script>
			@if ($obiskIn->opravljen == 1)
				<td><label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled checked>Opravljen</label></td>
			@else
				<td><label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>Opravljen</label></td>
			@endif
		  </tr>
		@endforeach
		</tbody>
	  </table>
  </div>
</div>


