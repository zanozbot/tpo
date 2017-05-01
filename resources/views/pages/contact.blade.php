@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 ">
				@foreach ($kontakti as $kontakt)
					<div class="panel panel-default">
					  <div class="panel-heading">
						<h3 class="panel-title">Kontaktna oseba</h3>
					  </div>
					  <div class="panel-body">
							<form role="form" method="POST" action="{{ route('contact_create_user') }}" >
							  <!--podatke o kontaktni osebi (priimek in ime, naslov, telefon, sorodstveno razmerje) -->
							  <div class="form-group">
								<label class="label label-primary">Ime</label>
								<input type="text" name="ime" class="form-control input-sm" value="{{$kontakt->ime}}" placeholder="Janez" required>
							  </div>
							  <div class="form-group">
								<label class="label label-primary">Priimek</label>
								<input type="text" name="priimek" class="form-control input-sm" value="{{$kontakt->priimek}}" placeholder="Novak" required>
							  </div>
							  <div class="form-group">
								<label class="label label-primary">Ulica</label>
								<input type="text" name="ulica" class="form-control input-sm" value="{{$kontakt->ulica}}" placeholder="Kongresni trg 12" required>
							  </div>
							   <div class="row">
								<div class="col-lg-8">
								  <div class="form-group">
									<label class="label label-primary">Kraj</label>
									<input type="text" name="kraj" class="form-control input-sm" value="{{$kontakt->kraj}}" placeholder="Ljubljana" required>
								  </div>
								</div>
								<div class="col-lg-4">
								  <div class="form-group">
									<label class="label label-primary">Poštna številka</label>
									<input type="number" min="1000" max="9999" name="posta" class="form-control input-sm" value="{{$kontakt->postna_stevilka}}" placeholder="1000" required>
								  </div>
								</div>
							  </div>
							  <div class="form-group">
								<label class="label label-primary">Telefonska številka</label>
								<input type="text" pattern="[0-9]{9}" name="tel_stevilka" class="form-control input-sm" maxlength="9" value="{{$kontakt->tel_stevilka}}"placeholder="031234567" required>
							  </div>
							  <div class="form-group">
								  <label class="label label-primary">Sorodstveno razmerje</label>
								  <select class="selectpicker form-control input-sm" name="razmerje">
								  @foreach ($razmerja as $razmerje)
									<option {{ ($kontakt->razmerje == $razmerje->ime ? "selected":"") }}>{{ $razmerje->ime }}</option>
								  @endforeach
								  </select>
							  </div>
							  <input type="submit" value="Spremeni podatke" class="btn btn-info btn-block">
							  <input type="hidden" name="_token" value="{{ Session::token() }}"/>
							</form>
					  </div>
					</div>
				@endforeach
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Dodaj novo kontaktno osebo</h3>
				  </div>
				  @if (session('status'))
				  	<div class="alert alert-success">
				  		<strong>Uspeh!</strong> Kontaktna oseba je bila dodana!
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
						<form role="form" method="POST" action="{{ route('contact_create_user') }}" >
						  <!--podatke o kontaktni osebi (priimek in ime, naslov, telefon, sorodstveno razmerje) -->
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
							<label class="label label-primary">Telefonska številka</label>
							<input type="text" pattern="[0-9]{9}" name="tel_stevilka" class="form-control input-sm" maxlength="9" placeholder="031234567" required>
						  </div>
						  <div class="form-group">
							  <label class="label label-primary">Sorodstveno razmerje</label>
							  <select class="selectpicker form-control input-sm" name="razmerje">
							  @foreach ($razmerja as $razmerje)
								<option>{{ $razmerje->ime }}</option>
							  @endforeach
							  </select>
						  </div>
						  <input type="submit" value="Dodaj podatke kontaktne osebe" class="btn btn-info btn-block">
						  <input type="hidden" name="_token" value="{{ Session::token() }}"/>
						</form>
				  </div>
				</div>

			</div>
		</div>
	</div>
@stop
