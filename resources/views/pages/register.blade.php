@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 ">
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Registracija novega računa</h3>
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
						<form role="form" method="POST" action="{{ route('register_create_user') }}">
						  <div class="form-group">
							<label class="label label-primary">E-mail</label>
							<input type="email" name="email" class="form-control input-sm" placeholder="example@email.com" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Številka kartice zdravstvenega zavarovanja</label>
							<input type="number" name="stevilkaKarticeZavarovanja" class="form-control input-sm" placeholder="123456789" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Ime</label>
							<input type="text" name="ime" class="form-control input-sm" placeholder="Janez" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Priimek</label>
							<input type="text" name="priimek" class="form-control input-sm" placeholder="Novak" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Ulica</label>
							<input type="text" name="ulica" class="form-control input-sm" placeholder="Kongresni trg 12" required>
						  </div>
						   <div class="row">
							<div class="col-lg-8">
							  <div class="form-group">
								<label class="label label-primary">Kraj</label>
								<input type="text" name="kraj" class="form-control input-sm" placeholder="Ljubljana" required>
							  </div>
							</div>
							<div class="col-lg-4">
							  <div class="form-group">
								<label class="label label-primary">Poštna številka</label>
								<input type="number" min="1000" max="9999" name="posta" class="form-control input-sm" placeholder="1000" required>
							  </div>
							</div>
						  </div>	
						  <div class="form-group">
							  <label class="label label-primary">Regija</label>
							  <select class="selectpicker form-control input-sm" name="okolis">
							  @foreach ($okolisi as $okolis)
								<option>{{ $okolis->ime }}</option>
							  @endforeach
							  </select>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Datum rojstva</label>
							 <div class="datepicker input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
							  <input type="text" class="form-control"  placeholder="dd/mm/yyyy" name="datumRojstva">
							     <div class="input-group-addon">
								 <span class="glyphicon glyphicon-th"></span>
								</div>
							 </div>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Telefonska številka</label>
							<input type="text" pattern="[0-9]{9}" class="form-control input-sm" maxlength="9" placeholder="031234567" name="tel_stevilka" required>
						  </div>
						  <div class="form-group">
						  	<label class="label label-primary">Spol</label><br/>
						  	<label class="radio-inline">
				                <input type="radio" name="spol" id="inlineCheckbox1" value="male" />
				                Moški
				            </label>
				            <label class="radio-inline">
				                <input type="radio" name="spol" id="inlineCheckbox2" value="female" />
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
						  <input type="submit" value="Ustvari račun" class="btn btn-info btn-block">
						  <input type="hidden" name="_token" value="{{ Session::token() }}"/>
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
