@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 ">
					<div class="panel panel-default">
					<div class="panel-heading">
					<h3 class="panel-title">Glavni profil</h3>
					</div>
					<div class="panel-body">
						<form role="form" method="POST" action="{{ route('profil_update') }}">
							<div class="form-group">
							<label class="label label-primary">Številka kartice zdravstvenega zavarovanja</label>
							<input type="number" value="{{$glavni->stevilka_KZZ}}" name="stevilkaKarticeZavarovanja" class="form-control input-sm" placeholder="123456789"  readonly required>
							</div>
							<div class="form-group">
							<label class="label label-primary">Ime</label>
							<input type="text" name="ime" value="{{$glavni->ime}}" class="form-control input-sm" placeholder="Janez" required>
							</div>
							<div class="form-group">
							<label class="label label-primary">Priimek</label>
							<input type="text" name="priimek" value="{{$glavni->priimek}}" class="form-control input-sm" placeholder="Novak" required>
							</div>
							<div class="form-group">
							<label class="label label-primary">Ulica</label>
							<input type="text" name="ulica" value="{{$glavni->ulica}}" class="form-control input-sm" placeholder="Kongresni trg 12" required>
							</div>
							 <div class="row">
							<div class="col-lg-8">
								<div class="form-group">
								<label class="label label-primary">Kraj</label>
								<input type="text" name="kraj" value="{{$glavni->kraj}}" class="form-control input-sm" placeholder="Ljubljana" required>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
								<label class="label label-primary">Poštna številka</label>
								<select  class="selectpicker form-control input-sm" name="posta">
								  @foreach ($poste as $posta)
									<option value="{{ $posta->postna_stevilka }}" {{ ($glavni->postna_stevilka == $posta->postna_stevilka ? "selected":"") }}>{{ $posta->postna_stevilka . " " . $posta->kraj }}</option>
								  @endforeach
								  </select>
								</div>
							</div>
							</div>
							<div class="form-group">
								<label class="label label-primary">Regija</label>
								<select class="selectpicker form-control input-sm" name="okolis">
								@foreach ($okolisi as $okolis)
								<option {{ ($glavni->okolis == $okolis->ime ? "selected":"") }}>{{ $okolis->ime }}</option>
								@endforeach
								</select>
							</div>
							<div class="form-group">
							<label class="label label-primary">Datum rojstva</label>
							 <div class="datepicker input-group date" data-provide="datepicker" data-date-format="dd.mm.yyyy">
								<input type="text" class="form-control" value="{{$glavni->datum_rojstva}}"  placeholder="dd.mm.llll" name="datumRojstva">
									 <div class="input-group-addon">
								 <span class="glyphicon glyphicon-th"></span>
								</div>
							 </div>
							</div>
							<div class="form-group">
								<label class="label label-primary">Spol</label><br/>
								<label class="radio-inline">
												<input type="radio" {{ ($glavni->spol == 'm' ? "checked":"") }} name="spol" id="inlineCheckbox1" value="male" />
												Moški
										</label>
										<label class="radio-inline">
												<input type="radio" {{ ($glavni->spol == 'f' ? "checked":"") }} name="spol" id="inlineCheckbox2" value="female" />
												Ženski
										</label>
							</div>
							<input type="submit" value="Spremeni podatke" class="btn btn-info btn-block">
							<input type="hidden" name="_token" value="{{ Session::token() }}"/>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop
