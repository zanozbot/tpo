<div class="container">
	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Delovni nalog</h3>
	  </div>
	  <div class="panel-body">
		<div class="row">
		<form role="form">  
		<div class="col-xs-12 col-sm-8 col-md-6">
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">Izvajalec</h3>
			  </div>
			  <div class="panel-body">	
				  <div class="row">
				    <div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Številka izvajalca</label>
						<input type="number" name="sifraIzvajalca" class="form-control input-sm" min="1" placeholder="12345" required>
					  </div>
					</div>
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Šifra zdravstvene dejavnosti</label>
						<input type="number" name="sifraDejavnosti" class="form-control input-sm" min="1" placeholder="12345" required>
					  </div>
					</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Naziv izvajalca</label>
					<input type="text" name="nazivIzvajalca" class="form-control input-sm" required>
				  </div>
			  </div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">Zavarovana oseba</h3>
			  </div>
			  <div class="panel-body">
				  <div class="form-group">
					<label class="label label-primary">Številka zavarovane osebe</label>
					<input type="text" name="stZavOsebe" class="form-control input-sm" required>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Datum rojstva</label>
					<div class="datepicker input-group date" data-provide="datepicker">
						<input type="text" class="form-control" placeholder="dd/mm/yyyy" name="datumRojstva">
						<div class="input-group-addon">
							<span class="glyphicon glyphicon-th"></span>
						</div>
					</div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Priimek</label>
					<input type="text" name="priimekZavOsebe" class="form-control input-sm" required>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Ime</label>
					<input type="text" name="imeZavOsebe" class="form-control input-sm" required>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Ulica, hišna številka</label>
					<input type="text" name="imeZavOsebe" class="form-control input-sm" required>
				  </div>
				  <div class="row">
				    <div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Poštna številka</label>
						<input type="text" name="imeZavOsebe" class="form-control input-sm" required>
					  </div>
					</div>
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Kraj</label>
						<input type="text" name="imeZavOsebe" class="form-control input-sm" required>
					  </div>
					</div>
				  </div>	 
				  <div class="form-group">
					<label class="label label-primary">Email</label>
					<input type="email" name="email" class="form-control input-sm" placeholder="email@email.si">
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Telefonska številka</label>
					<input type="text" pattern="[0-9]{9}" name="tel_stevilka" class="form-control input-sm" maxlength="9" placeholder="031234567">
				  </div>			  
			  </div>
			</div>				
		</div>
		<div class="col-xs-12 col-sm-8 col-md-6">
			<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Zdravnik</h3>
				  </div>
				  <div class="panel-body">
						  <div class="form-group">
							<label class="label label-primary">Vrsta zdravnika</label>
							<label class="radio-inline"><input type="radio" class="radio-inline" name="vrstaZdravnik">Osebni</label>
							<label class="radio-inline"><input type="radio" class="radio-inline" name="vrstaZdravnik">Napotni</label>
							<label class="radio-inline"><input type="radio" class="radio-inline" name="vrstaZdravnik">NMP</label>
							<label class="radio-inline"><input type="radio" class="radio-inline" name="vrstaZdravnik">Nadomestni</label>
						  </div>
				  </div>
			</div>
		</div>
		</form>
	  </div>
	</div>
	</div>
</div>

