@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-5">			
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Neopravljeni obiski</h3>
				  </div>
				  <div class="panel-body">
					<form role="form" method="post">
						<!-- seznam neopravljenih obiskov določene MS, vključno z obiski, kjer MS nadomešča -->
						<table class="table">
						<thead>
						  <tr>
							<th></th>
							<th>Šifra obiska</th>
							<th>Šifra bolezni</th>
							<th></th>
						  </tr>
						</thead>
						<tbody>
						@foreach ($mix1 as $mini)
							@foreach ($mini->obiski as $obisk)
								<tr>
								@if ($mini->datum_obvezen == 1)
									<td><button type="button" onclick="window.location='{{ url('plan/dodaj') }}/{{$sifraPlan}}/{{$sifra = $obisk->sifra_obisk}}'" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}" disabled>Dodaj</button></td>
								@else
									<td><button type="button" onclick="window.location='{{ url('plan/dodaj') }}/{{$sifraPlan}}/{{$sifra = $obisk->sifra_obisk}}'" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}">Dodaj</button></td>
								@endif
									<td>{{$obisk->sifra_obisk}}</td>
									<td>{{$mini->ime_bolezni}}</td>
									<td >
										<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti"><span class="glyphicon glyphicon-plus"></span></button>
										<div class="modal fade" id="podrobnosti" role="dialog">
											<div class="modal-dialog modal-lg">
											  <div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
												<div class="container-fluid">
												  @include('includes.nalog')
												</div>
												</div>
											  </div>
											</div>
										</div>
									</td>
								</tr>
							@endforeach
						  @endforeach
						  </tbody>
						</table>
					</form>
				  </div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-7 ">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Planirani obiski</h3>
				  </div>
				  <div class="panel-body">
				  <table class="table">
				    <thead>
					  <tr>
						<th></th>
						<th>Šifra obiska</th>
						<th>Šifra bolezni</th>
						<th></th>
					  </tr>
					</thead>
					<tbody>
					  	@foreach ($mix2 as $mini)
							@foreach ($mini->obiski as $obisk)
							<tr>
								<td></td>
								<td>{{$obisk->sifra_obisk}}</td>
								<td>{{$mini->ime_bolezni}}</td>
								<td >
									<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti"><span class="glyphicon glyphicon-plus"></span></button>
									<div class="modal fade" id="podrobnosti" role="dialog">
										<div class="modal-dialog modal-lg">
										  <div class="modal-content">
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
											<div class="container-fluid">
											  @include('includes.nalog')
											</div>
											</div>
										  </div>
										</div>
									</div>
								</td>
							</tr>
							@endforeach
						@endforeach
					  </tbody>
					</table>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
