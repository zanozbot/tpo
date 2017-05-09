<div class="panel panel-default">			
  <div class="panel-heading">
	<h3 class="panel-title">Obisk</h3>
  </div>
  <div class="panel-body">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6">
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">1 - Zavarovana oseba</h3>
			  </div>
			  <div class="panel-body">
				  <div class="form-group">
					<label class="label label-primary">Številka zavarovane osebe</label>
					<div class="form-control nalog" name="stZavOsebe"><label>{{$mini->stevilka_KZZ}}</label></div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Datum rojstva</label>
					<div class="form-control nalog" name="rojstvoZavOsebe"><label id="dat_roj_{{$mini->sifra_dn}}"></label></div>
				  </div>
				  <script>
				  	var prvotniDatum = "{{$mini->datum_rojstva}}";
				  	var arrStringov = prvotniDatum.split("-");
				  	var preurejeniDatum = arrStringov[2].concat(".".concat(arrStringov[1].concat(".".concat(arrStringov[0]))));
				  	$("#dat_roj_{{$mini->sifra_dn}}").html(preurejeniDatum);
				  </script>
				  <div class="form-group">
					<label class="label label-primary">Priimek</label>
					<div class="form-control nalog" name="priimekZavOsebe"><label>{{$mini->priimek_pacienta}}</label></div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Ime</label>
					<div class="form-control nalog" name="imeZavOsebe"><label>{{$mini->ime_pacienta}}</label></div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Ulica in hišna številka</label>
					<div class="form-control nalog" name="ulicaZavOsebe"><label>{{$mini->naslov_pacienta}}</label></div>
				  </div>
				  <div class="row">
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Poštna številka</label>
						<div class="form-control nalog" name="postaZavOsebe"><label>{{$mini->posta_pacient}}</label></div>
					  </div>
					</div>
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Kraj</label>
						<div class="form-control nalog" name="krajZavOsebe"><label>{{$mini->kraj_poste}}</label></div>
					  </div>
					</div>
				  </div>	 
				  <div class="form-group">
					<label class="label label-primary">Email</label>
					<div class="form-control nalog" name="emailZavOsebe"><label>{{$mini->email}}</label></div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Telefonska številka</label>
					<div class="form-control nalog" name="telZavOsebe"><label>{{$mini->tel_stevilka}}</label></div>
				  </div>			  
			  </div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-6">
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">2 - Storitev</h3>
			  </div>
			  <div class="panel-body">					  
				<div class="form-group">
				    <label class="label label-primary">Ime obiska</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->ime_vrsta_obiska}}</label></div>
				</div>
				<div class="form-group">
				    <label class="label label-primary">Datum obiska</label>
					<div class="form-control nalog" name="datumStoritve"><label id="dat_ob_{{$mini->sifra_obisk}}"></label></div>
					<script>
					  	var prvotniDatum = "{{$mini->predvideni_datum_obiska}}";
					  	var arrStringov = prvotniDatum.split("-");
					  	var preurejeniDatum = arrStringov[2].concat(".".concat(arrStringov[1].concat(".".concat(arrStringov[0]))));
					  	$("#dat_ob_{{$mini->sifra_obisk}}").html(preurejeniDatum);
					</script>
				</div>
				<div class="form-group" >
					<label class="label label-primary">Vrsta obiska</label>
					@if ($mini->preventivni == 1)
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled checked>Preventivni</label>
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>Kurativni</label>
					@else
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>Preventivni</label>
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled checked>Kurativni</label>
					@endif
				</div>
			  </div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">3 - Bolezen</h3>
			  </div>
			  <div class="panel-body">
			  	  <div class="form-group">
				    <label class="label label-primary">Šifra bolezni</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->sifra_bolezni}}</label></div>
				  </div>				  
				  <div class="form-group">
				    <label class="label label-primary">Ime bolezni</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->ime_bolezni}}</label></div>
				  </div>
				</div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">4 - Zadolžena patronažna sestra</h3>
			  </div>
			  <div class="panel-body">
			  	  <div class="form-group">
				    <label class="label label-primary">Šifra sestre</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->sestra[0]->sifra_ps}}</label></div>
				  </div>
				  <div class="form-group">
				    <label class="label label-primary">Ime sestre</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->sestra[0]->ime}} {{$mini->sestra[0]->priimek}}</label></div>
				  </div>
				</div>
			</div>
			@if ($mini->ime_vrsta_obiska == 'Odvzem krvi')
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">5 - Odvzem krvi</h3>
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
								<td><label id="rdeca_{{$mini->sifra_obisk}}"></label></td>
							  </tr>
							  <tr>
								<td><label>Modra</label></td>
								<td><label id="modra_{{$mini->sifra_obisk}}"></label></td>
							  </tr>
							  <tr>
								<td><label>Rumena</label></td>
								<td><label id="rumena_{{$mini->sifra_obisk}}"></label></td>
							  </tr>
							  <tr>
								<td><label>Zelena</label></td>
								<td><label id="zelena_{{$mini->sifra_obisk}}"></label></td>
							  </tr>
							</tbody>
						  </table>
						  <script>
							var stEp = "{{$mini->stevilo_epruvet_RdMoRuZe}}";
			  				var arrStringovEp = stEp.split(" ");
			  				$("#rdeca_{{$mini->sifra_obisk}}").html(arrStringovEp[0]);
			  				$("#modra_{{$mini->sifra_obisk}}").html(arrStringovEp[1]);
			  				$("#rumena_{{$mini->sifra_obisk}}").html(arrStringovEp[2]);
			  				$("#zelena_{{$mini->sifra_obisk}}").html(arrStringovEp[3]);
						  </script>
					  </div>
				  </div>
			  </div>
			</div>
			@elseif ($mini->ime_vrsta_obiska == 'Aplikacija injekcij')
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">5 - Aplikacija injekcij</h3>
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
							@foreach ($mini->zdravila as $zdravilo)
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
			@elseif ($mini->ime_vrsta_obiska == 'Obisk otročnice')
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">5 - Obisk otročnice</h3>
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
							  @foreach ($mini->otroci as $otrok)
							  <tr>
								<td><label>{{$otrok->stevilka_KZZ}}</label></td>
								<td><label>{{$otrok->ime}} {{$otrok->priimek}}</label></td>
								<td><label id="dat_roj_ot_{{$mini->sifra_dn}}_{{$otrok->stevilka_KZZ}}"></label></td>
								<script>
								  	var prvotniDatumOt = "{{$otrok->datum_rojstva}}";
								  	var arrStringovOt = prvotniDatumOt.split("-");
								  	var preurejeniDatumOt = arrStringovOt[2].concat(".".concat(arrStringovOt[1].concat(".".concat(arrStringovOt[0]))));
								  	$("#dat_roj_ot_{{$mini->sifra_dn}}_{{$otrok->stevilka_KZZ}}").html(preurejeniDatumOt);
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


