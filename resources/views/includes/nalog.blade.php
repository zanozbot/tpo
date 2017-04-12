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
						<div class="form-control nalog" name="stIzvajalca">Value</div>
					  </div>
					</div>
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Šifra zdravstvene dejavnosti</label>
						<div class="form-control nalog" name="sifraZdrDejavnosti">Value</div>
					  </div>
					</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Naziv izvajalca</label>
					<div class="form-control nalog" name="nazivIzvajalca">Value</div>
				  </div>
			  </div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">3 - Zavarovana oseba</h3>
			  </div>
			  <div class="panel-body">
				  <div class="form-group">
					<label class="label label-primary">Številka zavarovane osebe</label>
					<div class="form-control nalog" name="stZavOsebe">{{ $minimix->stevilka_KZZ }}</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Datum rojstva</label>
					<div class="form-control nalog" name="rojstvoZavOsebe">{{ $minimix->datum_rojstva }}</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Priimek</label>
					<div class="form-control nalog" name="priimekZavOsebe">{{ $minimix->priimek }}</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Ime</label>
					<div class="form-control nalog" name="imeZavOsebe">{{ $minimix->ime }}</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Ulica, hišna številka</label>
					<div class="form-control nalog" name="ulicaZavOsebe">Value</div>
				  </div>
				  <div class="row">
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Poštna številka</label>
						<div class="form-control nalog" name="postaZavOsebe">Value</div>
					  </div>
					</div>
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Kraj</label>
						<div class="form-control nalog" name="krajZavOsebe">Value</div>
					  </div>
					</div>
				  </div>	 
				  <div class="form-group">
					<label class="label label-primary">Email</label>
					<div class="form-control nalog" name="emailZavOsebe">Value</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Telefonska številka</label>
					<div class="form-control nalog" name="telZavOsebe">Value</div>
				  </div>			  
			  </div>
			</div>	
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">8 - Tuji zavarovanec</h3>
			  </div>
			  <div class="panel-body">					  
					  <div class="form-group">
						<label class="label label-primary">Šifra države</label>
						<div class="form-control nalog" name="sifraDrzave">Value</div>
					  </div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-6">
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">2 - Zdravnik</h3>
			  </div>
			  <div class="panel-body">
				  <div class="form-group">
					<label class="label label-primary">Številka zdravnika</label>
					<div class="form-control nalog" name="stZdravnika">Value</div>
				  </div>
				  <div class="form-group" >
					<label class="label label-primary">Vrsta zdravnika</label>
					<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>Osebni</label>
					<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>Napotni</label>
					<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>NMP</label>
					<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>Nadomestni</label>
				  </div>
				  
				  <div class="form-group">
					<label class="label label-primary">Imenski žig</label>
					<div class="form-control nalog" name="imenskiZig">Value</div>
				  </div>
			  </div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">4 - Napotnica</h3>
			  </div>
			  <div class="panel-body">					  
				  <div class="form-group">
					<label class="label label-primary">Številka napotnice</label>
					<div class="form-control nalog" name="stNapotnice">Value</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Številka zdravnika</label>
					<div class="form-control nalog" name="stZdravnikaNapotnice">Value</div>
				  </div>
				</div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">5 - Veljavnost naloga</h3>
			  </div>
			  <div class="panel-body">					  
				  <div class="form-group">
					<div class="form-control nalog" name="veljavnostNaloga">Value</div>
				  </div>
				</div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">6 - Vrsta storitve</h3>
			  </div>
			  <div class="panel-body">					  
				  <div class="form-group">
					<div class="form-control nalog" name="vrstaStoritve">Value</div>
				  </div>
				</div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">7 - Razlog obravnave</h3>
			  </div>
			  <div class="panel-body">					  
				  <div class="form-group">
					<div class="form-control nalog" name="razlogObravnave">Value</div>
				  </div>
			  </div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">Napoten k izvajalcu</h3>
			  </div>
			  <div class="panel-body">					  
				  <div class="form-group">
					<label class="label label-primary">Naziv in naslov</label>
					<div class="form-control nalog" name="izvajalec">Value</div>
				  </div>
			  </div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">Podatki o bolezni(vzrok za napotitev)</h3>
			  </div>
			  <div class="panel-body">					  
				<div class="form-control nalog" name="vzrok">Test kako zgleda če imamo  veliko texta za opis bolezni halalalalalalalalalalalalalalalalalalalalalalalalalalalala
				lalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalalala</div>
			  </div>
			</div>
		</div>
	</div>
  </div>
</div>
<div class="panel panel-default">			
  <div class="panel-heading">
	<h3 class="panel-title">Naročene storitve</h3>
  </div>
  <div class="panel-body">
	  <table class="table table-bordered">
		<thead>
		  <tr>
			<th>Zap. št.</th>
			<th>Opis</th>
			<th>Število</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td>Value</td>
			<td>Value</td>
			<td>Value</td>
		  </tr>
		  <tr>
			<td>Value</td>
			<td>Value</td>
			<td>Value</td>
		  </tr>
		  <tr>
			<td>Value</td>
			<td>Value</td>
			<td>Value</td>
		  </tr>
		</tbody>
	  </table>
  </div>
</div>


