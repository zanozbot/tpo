@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-2">			
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Orodja</h3>
				  </div>
				  <div class="panel-body">
					<div class="list-group">
						<button type="button" class="list-group-item list-group-item-action active">Ustvari račun</button>
						<button type="button" class="list-group-item list-group-item-action">TBD</button>
						<button type="button" class="list-group-item list-group-item-action">TBD</button>
						<button type="button" class="list-group-item list-group-item-action">TBD</button>
						<button type="button" class="list-group-item list-group-item-action" >TBD</button>
					</div>
				  </div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-10 ">
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Ustvari račun zdravstvenega osebja</h3>
				  </div>
				  	@if (session('status'))
				  	<div class="alert alert-success">
				  		<strong>Uspeh!</strong> Uporabniški račun je bil uspešno ustvarjen!
					</div>
				  	@endif
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
				  <div class="panel-body">
						<form role="form" method="POST" action="{{ route('admin_create_user') }}">
											  <!--  šifro zdravnika/vodje PS/medicinske sestre/uslužbenca, 
						  priimek in ime, šifro izvajalca zdravstvene dejavnosti (npr. zdravstvenega doma), 
						  e-mail in telefonsko številko. E-mail naslov služi kot uporabniško ime, s katerim se
						  zdravstveno osebje potem prijavlja v sistem. Posebna aktivacija računa ni potrebna. -->

						  <div class="form-group">
							  <label class="label label-primary" for="sel1">Vrsta uporabnika:</label>
							  <select class="form-control input-sm" name="vrstauporabnika" required>
							  		<option disabled selected value>Izberi vrsto uporabnika</option>
							    @foreach ($vloge as $vloga)
									<option value="{{ $vloga->sifra_vloga }}">{{ $vloga->ime }}</option>
								@endforeach
							  </select>
							</div>
						<div class="form-group">
							<label class="label label-primary">Ime</label>
							<input type="text" name="ime" class="form-control input-sm" placeholder="Ime" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Priimek</label>
							<input type="text" name="priimek" class="form-control input-sm" placeholder="Priimek" required>
						  </div>	
						  <div class="form-group">
							<label class="label label-primary">Šifra uslužbenca</label>
							<input type="number" name="sifrausluzbenca" class="form-control input-sm" min="1" placeholder="12345" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Šifra izvajalca zdravstvene dejavnosti</label>
							<input type="number" name="sifraizvajalca" class="form-control input-sm" min="1" placeholder="12345" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Email</label>
							<input type="email" name="email" class="form-control input-sm" placeholder="email@email.si" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Telefonska številka</label>
							<input type="text" pattern="[0-9]{9}" name="tel_stevilka" class="form-control input-sm" maxlength="9" placeholder="031234567" required>
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
						  <input type="submit" value="Ustvari račun" class="btn btn-info btn-block">
						  <input type="hidden" name="_token" value="{{ Session::token() }}"/>
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
