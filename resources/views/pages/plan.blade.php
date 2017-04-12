@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4">			
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Neopravljeni obiski</h3>
				  </div>
				  <div class="panel-body">
					<form role="form" method="post">
						<!-- seznam neopravljenih obiskov določene MS, vključno z obiski, kjer MS nadomešča -->
						@foreach ($obiski as $obisk)
							@if ($obisk->datum_obvezen == 1)
								<div class="list-group-item checkbox">
									<button type="button" onclick="window.location='{{ url('plan/dodaj') }}/{{$sifraPlan}}/{{$sifra = $obisk->sifra_obisk}}'" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}" disabled>Dodaj</button>
									<label>{{$obisk->datum_obiska}}</label>
								</div>
							@else
								<div class="list-group-item checkbox">
									<button type="button" onclick="window.location='{{ url('plan/dodaj') }}/{{$sifraPlan}}/{{$sifra = $obisk->sifra_obisk}}'" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}">Dodaj</button>
									<label>{{$obisk->datum_obiska}}</label>
								</div>
							@endif
						@endforeach
					</form>
				  </div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-8 ">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Planirani obiski</h3>
				  </div>
				  <div class="panel-body">
				  	@foreach ($obiskiVPlanu as $obisk)
				  		@if ($obisk->datum_obvezen == 1)
						<div class="list-group-item checkbox">
							<button type="button" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}" disabled>Odstrani</button>
							<label>{{$obisk->datum_obiska}}</label>
						</div>
						@else
						<div class="list-group-item checkbox">
							<button type="button" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}">Odstrani</button>
							<label>{{$obisk->datum_obiska}}</label>
						</div>
						@endif
					@endforeach
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
