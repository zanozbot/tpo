@extends('layouts.default')
@section('content')
<div class="container">

{{ HTML::style('css/dataTables.bootstrap.min.css') }}

{{ HTML::script('js/jquery.dataTables.min.js') }}
{{ HTML::script('js/dataTables.bootstrap.min.js') }}

	@if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Seznam pošt</h3>
	  </div>

	  <div class="panel-body">
	  	<div class="row">
	  	<div class="col-lg-10 col-lg-offset-1">
	  		<label class="label label-primary">Dodaj pošto</label>
	  		<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#dodajPosto"><span class="glyphicon glyphicon-plus"></span></button>
							<div class="modal fade" id="dodajPosto" role="dialog">
								<div class="modal-dialog modal-lg">
								  <div class="modal-content">
									<div class="modal-header">
									  <button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
									<div class="container-fluid">

									  @include('includes.vrsta_razmerja')

									</div>
									</div>
								  </div>
								</div>
							</div>
			</div>
	  	</div>
	  </div>

	  <div class="panel-body">
		  <table class="table" id="example">
				<thead>
				  <tr>
				  	<th></th>
					<th><label class="label label-primary">Poštna številka</label></th>
					<th><label class="label label-primary">Kraj</label></th>
					<th></th>
					<th></th>
				  </tr>
				</thead>

				<tbody>
				@foreach($poste as $posta)
					<tr>
						<td></td>
						<td><label>{{ $posta->postna_stevilka }}</label></td>
						<td><label>{{ $posta->kraj }}</label></td>
						<td>
							<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti{{ $posta->sifra_posta }}"><span class="glyphicon glyphicon-pencil"></span></button>
							<div class="modal fade" id="podrobnosti{{ $posta->sifra_posta }}" role="dialog">
								<div class="modal-dialog modal-lg">
								  <div class="modal-content">
									<div class="modal-header">
									  <button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
									<div class="container-fluid">

									  @include('includes.posta')

									</div>
									</div>
								  </div>
								</div>
							</div>
						</td>
						<td>
							<form action="" method="post">
							    <input class="btn {{ $posta->izbrisan ? 'btn-primary' : 'btn-warning' }}  btn-block" type="submit" value="{{ $posta->izbrisan ? 'Aktiviraj' : 'Deaktiviraj' }}">
							    <input type="text" name="sifra" value="{{ $posta->postna_stevilka }}" hidden="true">
							    <input type="hidden" name="method" value="izbrisi"/>
							    <input type="hidden" name="_token" value="{{ Session::token() }}"/>
							</form>
						</td>
					</tr>
				@endforeach
				</tbody>
		  </table>

		  <script type="text/javascript">
		  	$(document).ready(function() {
				var table = $('#example').DataTable({
				"oLanguage": {
				"oPaginate": {
					"sNext": "Naslednja stran",
					"sPrevious": "Prejšnja stran"
				},
				"sSearch": "Filtriraj rezultate:",
				"sLengthMenu": "Prikaži _MENU_ rezultatov",
				"sInfoFiltered": " - filtrarano izmed _MAX_ rezultatov",
				"sInfo": "Prikazujem _START_ do _END_ od _TOTAL_ rezultatov",
				'columnDefs': [ {
				    'sortable': false,
				    "class": "index",
				    'targets': 0
				} ],
				}
				});
				table.on( 'order.dt search.dt', function () {
					table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
					cell.innerHTML = i+1;
					});
				}).draw();
			});
		  </script>

	  </div>
	</div>
</div>
@stop