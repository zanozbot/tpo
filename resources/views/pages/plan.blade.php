@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">			
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
						<th><label>Šifra naloga</label></th>
						<th><label>Prvotni datum obiska</label></th>
						<th><label>Pacient</label></th>
						<th><label>Naslov</label></th>
						<th><label>Vrsta obiska</label></th>
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
								<td><label>{{$mini->sifra_dn}}</label></td>
									<td><label id="pr_dat_ne_{{$obisk->sifra_obisk}}"></label></td>
									<script>
									  	var prvotniDatumPl = "{{$obisk->datum_obiska}}";
									  	var arrStringovPl = prvotniDatumPl.split("-");
									  	var preurejeniDatumPl = arrStringovPl[2].concat(".".concat(arrStringovPl[1].concat(".".concat(arrStringovPl[0]))));
									  	$("#pr_dat_ne_{{$obisk->sifra_obisk}}").html(preurejeniDatumPl);
									</script>
									<td><label>{{$mini->ime_pacienta.' '.$mini->priimek_pacienta}}</label></td>
									<td><label>{{$mini->naslov_pacienta.', '.$mini->kraj_pacienta}}</label></td>
									<td><label>{{$mini->ime_vrsta_obiska}}</label></td>
								<td >
									<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti{{$obisk->sifra_obisk}}"><span class="glyphicon glyphicon-plus"></span></button>
									<div class="modal fade" id="podrobnosti{{$obisk->sifra_obisk}}" role="dialog">
										<div class="modal-dialog modal-lg">
										  <div class="modal-content">
											<div class="modal-header">
											  <button type="button" class="close" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body">
											<div class="container-fluid">
											  @include('includes.nalogPlan')
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
			<div class="col-xs-12 col-sm-12 col-md-12 ">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Planirani obiski za izbrani datum</h3>
				  </div>
				  <div class="panel-body">
				  <table class="table">
				    <thead>
					  <tr>
						<th></th>
						<th><label>Šifra naloga</label></th>
						<th><label>Prvotni datum obiska</label></th>
						<th><label>Pacient</label></th>
						<th><label>Naslov</label></th>
						<th><label>Vrsta obiska</label></th>
						<th></th>
					  </tr>
					</thead>
					<tbody>
					  	@foreach ($mix2 as $mini)
							@foreach ($mini->obiski as $obisk)
						  		<tr>
						  			@if ($mini->datum_obvezen == 1)
						  				<td><button type="button" onclick="window.location='{{ url('plan/odstrani') }}/{{$sifraPlan}}/{{$sifra = $obisk->sifra_obisk}}'" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}" disabled>Odstrani</button></td>
						  			@else
										<td><button type="button" onclick="window.location='{{ url('plan/odstrani') }}/{{$sifraPlan}}/{{$sifra = $obisk->sifra_obisk}}'" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}">Odstrani</button></td>
						  			@endif
						  			<td><label>{{$mini->sifra_dn}}</label></td>
									<td><label id="pr_dat_pl_{{$obisk->sifra_obisk}}"></label></td>
									<script>
									  	var prvotniDatumPl = "{{$obisk->datum_obiska}}";
									  	var arrStringovPl = prvotniDatumPl.split("-");
									  	var preurejeniDatumPl = arrStringovPl[2].concat(".".concat(arrStringovPl[1].concat(".".concat(arrStringovPl[0]))));
									  	$("#pr_dat_pl_{{$obisk->sifra_obisk}}").html(preurejeniDatumPl);
									</script>
									<td><label>{{$mini->ime_pacienta.' '.$mini->priimek_pacienta}}</label></td>
									<td><label>{{$mini->naslov_pacienta.', '.$mini->kraj_pacienta}}</label></td>
									<td><label>{{$mini->ime_vrsta_obiska}}</label></td>
									<td>		
										<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti{{$obisk->sifra_obisk}}"><span class="glyphicon glyphicon-plus"></span></button>
										<div class="modal fade" id="podrobnosti{{$obisk->sifra_obisk}}" role="dialog">
											<div class="modal-dialog modal-lg">
											  <div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
												<div class="container-fluid">
												  @include('includes.nalogPlan')
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
