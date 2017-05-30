@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Grafični prikaz meritev krvnega tlaka</h3>
				  </div>
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
					<form role="form" method="post" action="">
						{{ csrf_field() }}
						<div class="form-group">
							<label class="label label-primary">Izberi delovni nalog</label>
							<select  class="selectpicker form-control input-sm" name="delovniNalog">
							  @foreach ($delovniNalogi as $delovniNalog)
							  	{{ $pacient = $delovniNalog->pacient->first() }}
							  	{{ $datum = Carbon\Carbon::parse($delovniNalog->datum_prvega_obiska)->format('d.m.Y') }}
								<option value="{{ $delovniNalog->sifra_dn }}">{{ $datum . " - " .  $delovniNalog->vrsta_obiska->ime . " | " . $pacient->ime. " " . $pacient->priimek}}</option>
							  @endforeach
							  </select>
						  </div>

						<div class="form-group">
						<label class="label label-primary">Datum začetka meritev</label>
						  <div class="datepicker input-group date" data-provide="datepicker">
							<input type="text" class="form-control" placeholder="dd.mm.llll" name="datumZacetek" required="true">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>

						<div class="form-group">
						<label class="label label-primary">Datum konca meritev</label>
						  <div class="datepicker input-group date" data-provide="datepicker">
							<input type="text" class="form-control" placeholder="dd.mm.llll" name="datumKonec" required="true">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
						<script>
							$('.datepicker').datepicker({
								format: "dd.mm.yyyy",
								todayBtn: "linked",
								clearBtn: true,
								autoclose: true,
								todayHighlight: true
							});
						</script>
						</div>
						<div class="form-group">
						 <input type="submit" value="Preglej meritve" class="btn btn-info btn-block">
						</div>
						</form>

				  </div>
				</div>
			</div>
		</div>
	</div>
@stop