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
							<th></th>
							<th><label>Prvotni datum obiska</label></th>
							<th><label>Pacient</label></th>
							<th><label>Naslov</label></th>
							<th><label>Vrsta obiska</label></th>
							<th></th>
						  </tr>
						</thead>
						<tbody>
						<script>
						  	var st = 1;
						</script>
						@foreach ($mix1 as $obisk)
		   					@if ($obisk->nepotreben != 1)
								<tr>
									<td><label id="stevilcenje_{{$obisk->sifra_obisk}}"></label></td>
									<script>
									  	$("#stevilcenje_{{$obisk->sifra_obisk}}").html(st);
									  	st++;
									</script>
									@if ($obisk->datum_obvezen == 1)
										<td><button type="button" onclick="window.location='{{ url('plan/dodaj') }}/{{$sifraPlan}}/{{$sifra = $obisk->sifra_obisk}}/{{$izbraniDatum}}'" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}" disabled>Dodaj</button></td>
									@else
										<td><button type="button" onclick="window.location='{{ url('plan/dodaj') }}/{{$sifraPlan}}/{{$sifra = $obisk->sifra_obisk}}/{{$izbraniDatum}}'" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}">Dodaj</button></td>
									@endif
									<td><label id="pr_dat_ne_{{$obisk->sifra_obisk}}"></label></td>
									<script>
									  	var prvotniDatumPl = "{{$obisk->datum_obiska}}";
									  	var arrStringovPl = prvotniDatumPl.split("-");
									  	var preurejeniDatumPl = arrStringovPl[2].concat(".".concat(arrStringovPl[1].concat(".".concat(arrStringovPl[0]))));
									  	$("#pr_dat_ne_{{$obisk->sifra_obisk}}").html(preurejeniDatumPl);
									</script>
									<td><label>{{$obisk->ime_pacienta.' '.$obisk->priimek_pacienta}}</label></td>
									<td><label>{{$obisk->naslov_pacienta.', '.$obisk->kraj_pacienta}}</label></td>
									<td><label>{{$obisk->ime_vrsta_obiska}}</label></td>
									<td >
										<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti{{$obisk->sifra_obisk}}"><span class="glyphicon glyphicon-search"></span></button>
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
							@endif
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
					<h3 class="panel-title">Planirani obiski za <label>{{$izbraniDatum}}</label></h3>
				  </div>
				  <div class="panel-body">
				  <table class="table">
				    <thead>
					  <tr>
						<th></th>
						<th></th>
						<th><label>Prvotni datum obiska</label></th>
						<th><label>Pacient</label></th>
						<th><label>Naslov</label></th>
						<th><label>Vrsta obiska</label></th>
						<th></th>
					  </tr>
					</thead>
					<tbody>
						<script>
						  	var st2 = 1;
						</script>
					  	@foreach ($mix2 as $obisk)
					  		@if ($obisk->ime_vrsta_obiska == 'Obisk otročnice' && $obisk->pac_stevilka_KZZ != -1)

			   				@else
						  		<tr>
						  			<td><label id="stevilcenje2_{{$obisk->sifra_obisk}}"></label></td>
									<script>
									  	$("#stevilcenje2_{{$obisk->sifra_obisk}}").html(st2);
									  	st2++;
									</script>
						  			@if ($obisk->datum_obvezen == 1)
						  				<td><button type="button" onclick="window.location='{{ url('plan/odstrani') }}/{{$sifraPlan}}/{{$sifra = $obisk->sifra_obisk}}/{{$izbraniDatum}}'" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}" disabled>Odstrani</button></td>
						  			@else
										<td><button type="button" onclick="window.location='{{ url('plan/odstrani') }}/{{$sifraPlan}}/{{$sifra = $obisk->sifra_obisk}}/{{$izbraniDatum}}'" class="btn btn-default" name="{{$sifra = $obisk->sifra_obisk}}">Odstrani</button></td>
						  			@endif
									<td><label id="pr_dat_pl_{{$obisk->sifra_obisk}}"></label></td>
									<script>
									  	var prvotniDatumPl = "{{$obisk->datum_obiska}}";
									  	var arrStringovPl = prvotniDatumPl.split("-");
									  	var preurejeniDatumPl = arrStringovPl[2].concat(".".concat(arrStringovPl[1].concat(".".concat(arrStringovPl[0]))));
									  	$("#pr_dat_pl_{{$obisk->sifra_obisk}}").html(preurejeniDatumPl);
									</script>
									<td><label>{{$obisk->ime_pacienta.' '.$obisk->priimek_pacienta}}</label></td>
									<td><label>{{$obisk->naslov_pacienta.', '.$obisk->kraj_pacienta}}</label></td>
									<td><label>{{$obisk->ime_vrsta_obiska}}</label></td>
									<td >
										<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti{{$obisk->sifra_obisk}}"><span class="glyphicon glyphicon-pencil"></span></button>
										<div class="modal fade" id="podrobnosti{{$obisk->sifra_obisk}}" role="dialog">
											<div class="modal-dialog modal-lg">
											  <div class="modal-content">
												<div class="modal-header">
												  <button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
												<div class="container-fluid">
													
												  @include('includes.urediObisk', array('aktivnosti'=>$obisk->aktivnosti, 'aktivnostiNovorojencek'=>$obisk->aktivnostiNovorojencek, 'obisk'=>$obisk, 'sifraPlan'=>$sifraPlan))

												</div>
												</div>
											  </div>
											</div>
										</div>
									</td>
								</tr>
							@endif
						@endforeach
					  </tbody>
					</table>

				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
