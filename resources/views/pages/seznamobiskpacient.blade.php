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
				<th><label>Šifra obiska</label></th>
				<th><label>Datum obiska</label></th>
				<th><label>Naslov</label></th>
				<th><label>Vrsta obiska</label></th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			 	@foreach ($obiskiPacienta as $mini)
					<tr>
						<td><label>{{$mini->sifra_obisk}}</label></td>
						<td><label id="pr_dat_ne_{{$mini->sifra_obisk}}"></label></td>
						<script>
						  	var prvotniDatumPl = "{{$mini->datum_obiska}}";
						  	var arrStringovPl = prvotniDatumPl.split("-");
						  	var preurejeniDatumPl = arrStringovPl[2].concat(".".concat(arrStringovPl[1].concat(".".concat(arrStringovPl[0]))));
						  	$("#pr_dat_ne_{{$mini->sifra_obisk}}").html(preurejeniDatumPl);
						</script>
						<td><label>{{$mini->naslov_pacienta.', '.$mini->kraj_pacienta}}</label></td>
						<td><label>{{$mini->ime_vrsta_obiska}}</label></td>
						<td >		
							<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti{{$mini->sifra_obisk}}"><span class="glyphicon glyphicon-plus"></span></button>
							<div class="modal fade" id="podrobnosti{{$mini->sifra_obisk}}" role="dialog">
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
				<th><label>Šifra obiska</label></th>
				<th><label>Pacient</label></th>
				<th><label>Naslov</label></th>
				<th><label>Vrsta obiska</label></th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			 	@foreach ($obiskiPoduporabnikov as $mini)
					<tr>
						<td><label>{{$mini->sifra_obisk}}</label></td>
						<td><label>{{$mini->ime_pacienta.' '.$mini->priimek_pacienta}}</label></td>
						<td><label>{{$mini->naslov_pacienta.', '.$mini->kraj_pacienta}}</label></td>
						<td><label>{{$mini->ime_vrsta_obiska}}</label></td>
						<td >		
							<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti{{$mini->sifra_obisk}}"><span class="glyphicon glyphicon-plus"></span></button>
							<div class="modal fade" id="podrobnosti{{$mini->sifra_obisk}}" role="dialog">
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
