@extends('layouts.default')
@section('content')
<div class="container">
	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Seznam včerajšnih obiskov</h3>
	  </div>
	  <div class="panel-body">
	  <table class="table ">
			<thead>
			  <tr>
				<th></th>
				<th><label>Vrsta obiska</label></th>
				<th><label>Pacient</label></th>
				<th><label>Naslov</label></th>
				<th><label>Patronažna sestra</label></th>
				<th><label>Nadomeščanje</label></th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
				<script>
				  	var st = 1;
				</script>
			 	@foreach ($mix as $obisk)
			  		@if ($obisk->ime_vrsta_obiska == 'Obisk otročnice' && $obisk->pac_stevilka_KZZ != -1)

	   				@else
				  		<tr>
							<td><label id="stevilcenje_{{$obisk->sifra_obisk}}"></label></td>
					  		<script>
							  	$("#stevilcenje_{{$obisk->sifra_obisk}}").html(st);
							  	st++;
							</script>
							<td><label>{{$obisk->ime_vrsta_obiska}}</label></td>
							<td><label>{{$obisk->ime_pacienta.' '.$obisk->priimek_pacienta}}</label></td>
							<td><label>{{$obisk->naslov_pacienta.', '.$obisk->kraj_pacienta}}</label></td>
							<td><label>{{$obisk->sestra[0]->ime.' '.$obisk->sestra[0]->priimek}}</label></td>
							@if ($obisk->nadomescanje == 1)
								<td><span class="glyphicon glyphicon-ok"></span></td>
							@else
								<td><span class="glyphicon glyphicon-remove"></span></td>
							@endif
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

										  @include('includes.urediObisk')

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
@stop
