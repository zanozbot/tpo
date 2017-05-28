@extends('layouts.default')
@section('content')
<div class="container">
	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Seznam lastnih obiskov</h3>
	  </div>
	  <div class="panel-body">			  
		  <table class="table ">
			<thead>
			  <tr>
				<th></th>
				<th><label>Datum obiska</label></th>
				<th><label>Naslov</label></th>
				<th><label>Patronažna sestra</label></th>
				<th><label>Nadomeščanje</label></th>
				<th><label>Bolezen</label></th>
				<th><label>Vrsta obiska</label></th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
				<script>
				  	var st = 1;
				</script>
			 	@foreach ($obiskiPacienta as $obisk)
					<tr>
						<td><label id="stevilcenje_{{$obisk->sifra_obisk}}"></label></td>
						<script>
						  	$("#stevilcenje_{{$obisk->sifra_obisk}}").html(st);
						  	st++;
						</script>
						<td><label id="pr_dat_ne_{{$obisk->sifra_obisk}}"></label></td>
						<script>
						  	var prvotniDatumPl = "{{$obisk->predvideni_datum_obiska}}";
						  	var arrStringovPl = prvotniDatumPl.split("-");
						  	var preurejeniDatumPl = arrStringovPl[2].concat(".".concat(arrStringovPl[1].concat(".".concat(arrStringovPl[0]))));
						  	$("#pr_dat_ne_{{$obisk->sifra_obisk}}").html(preurejeniDatumPl);
						</script>
						<td><label>{{$obisk->naslov_pacienta.', '.$obisk->kraj_pacienta}}</label></td>
						<td><label>{{$obisk->sestra[0]->ime.' '.$obisk->sestra[0]->priimek}}</label></td>
						@if ($obisk->nadomescanje == 1)
							<td><span class="glyphicon glyphicon-ok"></span></td>
						@else
							<td><span class="glyphicon glyphicon-remove"></span></td>
						@endif
						<td><label>{{$obisk->ime_bolezni}}</label></td>
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
										@include('includes.obisk')
									</div>
									</div>
								  </div>
								</div>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		  </table>
		</div>
	</div>

	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Seznam obiskov poduporabnikov</h3>
	  </div>
	  <div class="panel-body">			  
		  <table class="table ">
			<thead>
			  <tr>
				<th><label>Datum obiska</label></th>
				<th><label>Pacient</label></th>
				<th><label>Naslov</label></th>
				<th><label>Patronažna sestra</label></th>
				<th><label>Nadomeščanje</label></th>
				<th><label>Bolezen</label></th>
				<th><label>Vrsta obiska</label></th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
				<script>
				  	var st2 = 1;
				</script>
			 	@foreach ($obiskiPoduporabnikov as $obisk)
					<tr>
						<td><label id="stevilcenje2_{{$obisk->sifra_obisk}}"></label></td>
						<script>
						  	$("#stevilcenje2_{{$obisk->sifra_obisk}}").html(st2);
						  	st2++;
						</script>
						<td><label id="pr_dat_pod_{{$obisk->sifra_obisk}}"></label></td>
						<script>
						  	var prvotniDatumPl = "{{$obisk->datum_obiska}}";
						  	var arrStringovPl = prvotniDatumPl.split("-");
						  	var preurejeniDatumPl = arrStringovPl[2].concat(".".concat(arrStringovPl[1].concat(".".concat(arrStringovPl[0]))));
						  	$("#pr_dat_pod_{{$obisk->sifra_obisk}}").html(preurejeniDatumPl);
						</script>
						<td><label>{{$obisk->ime_pacienta.' '.$obisk->priimek_pacienta}}</label></td>
						<td><label>{{$obisk->naslov_pacienta.', '.$obisk->kraj_pacienta}}</label></td>
						<td><label>{{$obisk->sestra[0]->ime.' '.$obisk->sestra[0]->priimek}}</label></td>
						@if ($obisk->nadomescanje == 1)
							<td><span class="glyphicon glyphicon-ok"></span></td>
						@else
							<td><span class="glyphicon glyphicon-remove"></span></td>
						@endif
						<td><label>{{$obisk->ime_bolezni}}</label></td>
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
										@include('includes.obisk')
									</div>
									</div>
								  </div>
								</div>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		  </table>
		</div>
	</div>
</div>
@stop
