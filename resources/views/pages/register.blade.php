@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 ">
				<div class="panel panel-default">			
				  <div class="panel-heading">
				  	@if(Auth::check())
				  		<h3 class="panel-title">Registracija poduporabnika</h3>
				  	@else
						<h3 class="panel-title">Registracija novega uporabnika</h3>
					@endif
				  </div>
				  <div class="panel-body">
						<form role="form" >
						  <!--  uporabniški profil in določiti geslo. Uporabniški profil obsega številko kartice zdravstvenega zavarovanja, priimek in ime, naslov, šifro okoliša, telefon, e-mail, datum rojstva in spol ter (neobvezno) podatke o kontaktni osebi (priimek in ime, naslov, telefon, sorodstveno razmerje) -->
						  
						  <div class="form-group">
							<label class="label label-primary">E-mail</label>
							<input type="email" name="emailUporabnika" class="form-control input-sm" placeholder="example@email.com" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Številka kartice zdravstvenega zavarovanja</label>
							<input type="number" name="stevilkaKarticeZavarovanja" class="form-control input-sm" placeholder="123456789" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Ime</label>
							<input type="text" name="imeUporabnika" class="form-control input-sm" placeholder="Janez" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Priimek</label>
							<input type="text" name="priimekUporabnika" class="form-control input-sm" placeholder="Novak" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Ulica</label>
							<input type="text" name="naslovUporabnika" class="form-control input-sm" placeholder="Kongresni trg 12" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Mesto</label>
							<input type="text" name="naslovUporabnika" class="form-control input-sm" placeholder="1000 Ljubljana" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Datum rojstva</label>
							<input type="date" class="form-control input-sm" maxlength="9" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Telefonska številka</label>
							<input type="text" pattern="[0-9]{9}" class="form-control input-sm" maxlength="9" placeholder="031234567" required>
						  </div>
						  <div class="form-group">
						  	<label class="label label-primary">Spol</label><br/>
						  	<label class="radio-inline">
				                <input type="radio" name="sex" id="inlineCheckbox1" value="male" />
				                Moški
				            </label>
				            <label class="radio-inline">
				                <input type="radio" name="sex" id="inlineCheckbox2" value="female" />
				                Ženski
				            </label>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Geslo</label>
							<input type="password" pattern="(?=.*\d).{8,}" name="geslo" class="form-control input-sm" placeholder="Geslo" 
							title="najmanj 8 znakov, vsaj en numeričen" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Potrdi geslo</label>
							<input type="password" pattern="(?=.*\d).{8,}" name="potrdigeslo" class="form-control input-sm" placeholder="Geslo" 
							title="najmanj 8 znakov, vsaj en numeričen" required>
						  </div>
						  <input type="submit" value="Dodaj poduporabnika" class="btn btn-info btn-block">
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
