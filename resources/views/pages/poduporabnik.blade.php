@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 ">
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Dodajanje poduporabnika</h3>
				  </div>
				  @if (session('status'))
				  	<div class="alert alert-success">
				  		<strong>Uspeh!</strong> Nov poduporabnik je bil uspešno ustvarjen!
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
						<form role="form" method="POST" action="{{ route('poduporabnik_create_user') }}">
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
							  <label class="label label-primary">Sorodstveno razmerje</label>
							  <select class="selectpicker form-control input-sm" name="razmerje">
							  @foreach ($razmerja as $razmerje)
								<option>{{ $razmerje->ime }}</option>
							  @endforeach
							  </select>
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
						  <input type="submit" value="Dodaj poduporabnika" class="btn btn-info btn-block">	
						  <input type="hidden" name="_token" value="{{ Session::token() }}"/>
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
