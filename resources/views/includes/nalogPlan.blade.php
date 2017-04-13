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
						<div class="form-control nalog" name="stIzvajalca">{{$mini->sifra_zd}}</div>
					  </div>
					</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Naziv izvajalca</label>
					<div class="form-control nalog" name="nazivIzvajalca">{{$mini->naziv_izvajalca}}</div>
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
					<div class="form-control nalog" name="stZavOsebe">{{$mini->stevilka_KZZ}}</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Datum rojstva</label>
					<div class="form-control nalog" name="rojstvoZavOsebe">{{$mini->datum_rojstva}}</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Priimek</label>
					<div class="form-control nalog" name="priimekZavOsebe">{{$mini->priimek_pacienta}}</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Ime</label>
					<div class="form-control nalog" name="imeZavOsebe">{{$mini->ime_pacienta}}</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Ulica in hišna številka</label>
					<div class="form-control nalog" name="ulicaZavOsebe">{{$mini->naslov_pacienta}}</div>
				  </div>
				  <div class="row">
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Poštna številka</label>
						<div class="form-control nalog" name="postaZavOsebe">{{$mini->posta_pacient}}</div>
					  </div>
					</div>
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Kraj</label>
						<div class="form-control nalog" name="krajZavOsebe">{{$mini->kraj_poste}}</div>
					  </div>
					</div>
				  </div>	 
				  <div class="form-group">
					<label class="label label-primary">Email</label>
					<div class="form-control nalog" name="emailZavOsebe">{{$mini->email}}</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Telefonska številka</label>
					<div class="form-control nalog" name="telZavOsebe">{{$mini->tel_stevilka}}</div>
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
					<div class="form-control nalog" name="stZdravnika">{{$mini->sifra_delavca}}</div>
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
					<div class="form-control nalog" name="vrstaStoritve">{{$mini->ime_vrsta_obiska}}</div>
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
					<div class="form-control nalog" name="vrstaStoritve">{{$mini->sifra_bolezni}}</div>
				  </div>				  
				  <div class="form-group">
				    <label class="label label-primary">Ime bolezni</label>
					<div class="form-control nalog" name="vrstaStoritve">{{$mini->ime_bolezni}}</div>
				  </div>
				</div>
			</div>
			@if ($mini->ime_vrsta_obiska == 'Odvzem krvi')
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">6 - Odvzem krvi</h3>
			  </div>
			  <div class="panel-body">					  
				  <div class="form-group">
				    <label class="label label-primary">Barva epruvet</label>
					<div class="form-control nalog" name="vrstaStoritve">{{$mini->barva_epruvete}}</div>
				  </div>
				  <div class="form-group">
				    <label class="label label-primary">Število epruvet</label>
					<div class="form-control nalog" name="vrstaStoritve">{{$mini->stevilo_epruvet}}</div>
				  </div>
			  </div>
			</div>
			@elseif ($mini->ime_vrsta_obiska == 'Aplikacija injekcij')
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">6 - Aplikacija injekcij</h3>
			  </div>
			  <div class="panel-body">					  
				  <div class="form-group">
				    <label class="label label-primary">Zdravila</label>
					<div class="form-control nalog" name="vrstaStoritve">
					

					  <div class="panel-heading">
						<h3 class="panel-title">Naročene storitve</h3>
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
								<td>{{$zdravilo->sifra_zdravila}}</td>
								<td>{{$zdravilo->ime_zdravila}}</td>
								<td>{{$zdravilo->opis_zdravila}}</td>
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
		@foreach ($mini->obiski as $obisk)
		  <tr>
			<td>{{$obisk->sifra_obisk}}</td>
			<td>{{$obisk->datum_obiska}}</td>
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


