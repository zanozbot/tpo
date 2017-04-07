@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 ">
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Kontaktna oseba novega uporabnika</h3>
				  </div>
				  <div class="panel-body">
						<form role="form" >
						  <!--podatke o kontaktni osebi (priimek in ime, naslov, telefon, sorodstveno razmerje) -->
						  <div class="form-group">
							<label class="label label-primary">Ime</label>
							<input type="text" name="imeKontakta" class="form-control input-sm" placeholder="Janez" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Priimek</label>
							<input type="text" name="priimekKontakta" class="form-control input-sm" placeholder="Novak" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Ulica</label>
							<input type="text" name="ulicaKontakta" class="form-control input-sm" placeholder="Kongresni trg 12" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Mesto</label>
							<input type="text" name="mestoKontakta" class="form-control input-sm" placeholder="1000 Ljubljana" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Telefonska številka</label>
							<input type="text" pattern="[0-9]{9}" name="telefonskaStevilkaKontakta" class="form-control input-sm" maxlength="9" placeholder="031234567" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Sorodstveno razmerje</label>
							<input type="text" name="sorodstvenoRazmerjeKontakta" class="form-control input-sm" placeholder="Mati" required>
						  </div>
						  <input type="submit" value="Dodaj podatke kontaktne osebe" class="btn btn-info btn-block">
						  <a href="{{ route('home') }}"> Preskoči korak </a>
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
