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
						<div class="form-control nalog" name="stIzvajalca"><label>{{$mini->sifra_zd}}</label></div>
					  </div>
					</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Naziv izvajalca</label>
					<div class="form-control nalog" name="nazivIzvajalca"><label>{{$mini->naziv_izvajalca}}</label></div>
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
				<h3 class="panel-title">3 - Zdravnik</h3>
			  </div>
			  <div class="panel-body">
				  <div class="form-group">
					<label class="label label-primary">Številka zdravnika</label>
					<div class="form-control nalog" name="stZdravnika"><label>{{$mini->sifra_delavca}}</label></div>
				  </div>
			  </div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">4 - Storitev</h3>
			  </div>
			  <div class="panel-body">					  
				  <div class="form-group">
				    <label class="label label-primary">Ime storitve</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->ime_vrsta_obiska}}</label></div>
				  </div>
				</div>
				<div class="form-group" >
					<label class="label label-primary">Vrsta storitve</label>
					@if ($mini->preventivni == 1)
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
				<h3 class="panel-title">6 - Zadolžena patronažna sestra</h3>
			  </div>
			  <div class="panel-body">
			  	  <div class="form-group">
				    <label class="label label-primary">Šifra sestre</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->pacienti[0]->sifra_ps}}</label></div>
				  </div>
				</div>
			</div>
			@if ($mini->ime_vrsta_obiska == 'Odvzem krvi')
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
								<td><label id="rdeca_{{$mini->sifra_dn}}"></label></td>
							  </tr>
							  <tr>
								<td><label>Modra</label></td>
								<td><label id="modra_{{$mini->sifra_dn}}"></label></td>
							  </tr>
							  <tr>
								<td><label>Rumena</label></td>
								<td><label id="rumena_{{$mini->sifra_dn}}"></label></td>
							  </tr>
							  <tr>
								<td><label>Zelena</label></td>
								<td><label id="zelena_{{$mini->sifra_dn}}"></label></td>
							  </tr>
							</tbody>
						  </table>
						  <script>
							var stEp = "{{$mini->stevilo_epruvet_RdMoRuZe}}";
			  				var arrStringovEp = stEp.split(" ");
			  				$("#rdeca_{{$mini->sifra_dn}}").html(arrStringovEp[0]);
			  				$("#modra_{{$mini->sifra_dn}}").html(arrStringovEp[1]);
			  				$("#rumena_{{$mini->sifra_dn}}").html(arrStringovEp[2]);
			  				$("#zelena_{{$mini->sifra_dn}}").html(arrStringovEp[3]);
						  </script>
					  </div>
				  </div>
			  </div>
			</div>
			@elseif ($mini->ime_vrsta_obiska == 'Aplikacija injekcij')
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
							  <tr>
								<td><label>{{$mini->pacienti[0]->stevilka_KZZ}}</label></td>
								<td><label>{{$mini->pacienti[0]->ime}}</label></td>
								<td><label>{{$mini->pacienti[0]->datum_rojstva}}</label></td>
							  </tr>
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
		@foreach ($mini->obiski as $obisk)
		  <tr>
			<td><label>{{$obisk->sifra_obisk}}</label></td>
			<td><label id="dat_obiska_{{$obisk->sifra_obisk}}"></label></td>
			<script>
			  	var prvotniDatumOb = "{{$obisk->datum_obiska}}";
			  	var arrStringovOb = prvotniDatumOb.split("-");
			  	var preurejeniDatumOb = arrStringovOb[2].concat(".".concat(arrStringovOb[1].concat(".".concat(arrStringovOb[0]))));
			  	$("#dat_obiska_{{$obisk->sifra_obisk}}").html(preurejeniDatumOb);
			</script>
			@if ($obisk->opravljen == 1)
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


