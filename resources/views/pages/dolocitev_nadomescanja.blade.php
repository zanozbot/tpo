@extends('layouts.default')
@section('content')
{{ HTML::script('js/nadomescanje.js') }}
	<div class="container">
		@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Določitev nadomeščanja</h3>
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
					<form role="form" method="post">
					{{ csrf_field() }}

						<div class="form-group">
								<label class="label label-primary">Patronažna sestra</label>
								<select id="ps" class="selectpicker form-control input-sm" name="sifra_ps">
								<option disabled="true" selected="true"> - </option>
								  @foreach ($sestre as $sestra)
									<option value="{{ $sestra->sifra_ps }}" >{{ $sestra->uporabnik->ime . " " . $sestra->uporabnik->priimek }}</option>
								  @endforeach
								  </select>
							  </div>
						<div class="form-group">
								<label class="label label-primary">Nadomestna patronažna sestra</label>
								<select id="nadomestna_ps" class="selectpicker form-control input-sm" name="nadomestna_sifra_ps">
								<option disabled="true" selected="true"> - </option>
								  @foreach ($sestre as $sestra)
									<option value="{{ $sestra->sifra_ps }}" >{{ $sestra->uporabnik->ime . " " . $sestra->uporabnik->priimek }}</option>
								  @endforeach
								  </select>
							  </div>
						<div class="form-group">
						<label class="label label-primary">Začetni datum nadomeščanja</label>
						  <div class="datepicker input-group date" data-provide="datepicker">
							<input type="text" class="form-control" placeholder="dd.mm.llll" name="zacetek">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
						<div class="form-group">
						<label class="label label-primary">Končni datum nadomeščanja</label>
						  <div class="datepicker input-group date" data-provide="datepicker">
							<input type="text" class="form-control" placeholder="dd.mm.llll" name="konec">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
						<script>
							$('.datepicker').datepicker({
								format: "dd.mm.yyyy",
								startDate: "today",
								todayBtn: "linked",
								clearBtn: true,
								autoclose: true,
								todayHighlight: true
							});
						</script>
						</div>
						<div class="form-group">
						 <input type="submit" value="Dodeli nadomeščanje" class="btn btn-info btn-block">
						</div>
						</form>

				  </div>
				</div>
			</div>
		</div>
	</div>
@stop