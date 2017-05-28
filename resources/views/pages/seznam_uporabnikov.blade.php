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
		<h3 class="panel-title">Seznam zdravstvenega osebja</h3>
	  </div>

	  <div class="panel-body">
		  <table class="table" id="example">
				<thead>
				  <tr>
				  	<th></th>
					<th><label class="label label-primary">Šifra</label></th>
					<th><label class="label label-primary">Email</label></th>
					<th><label class="label label-primary">Ime</label></th>
					<th><label class="label label-primary">Priimek</label></th>
					<th><label class="label label-primary">Telefonska številka</label></th>
					<th><label class="label label-primary">Vloga</label></th>
					<th></th>
				  </tr>
				</thead>

				<tbody>
				@foreach($uporabniki as $uporabnik)
					<tr>
						<td></td>
						@if ($uporabnik->vloga->sifra_vloga == 2 || $uporabnik->vloga->sifra_vloga == 3)
						<td><label>{{ $uporabnik->delavec->sifra_delavec }}</label></td>
						@elseif ($uporabnik->vloga->sifra_vloga == 4)
						<td><label>{{ $uporabnik->patronazna_sestra->sifra_ps }}</label></td>
						@else
						<td></td>
						@endif
						<td><label>{{ $uporabnik->email }}</label></td>
						<td><label>{{ $uporabnik->ime }}</label></td>
						<td><label>{{ $uporabnik->priimek }}</label></td>
						<td><label>{{ $uporabnik->tel_stevilka }}</label></td>
						<td><label>{{ $uporabnik->vloga->ime }}</label></td>
						<td>
							<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti{{ $uporabnik->id_uporabnik }}"><span class="glyphicon glyphicon-pencil"></span></button>
							<div class="modal fade" id="podrobnosti{{ $uporabnik->id_uporabnik }}" role="dialog">
								<div class="modal-dialog modal-lg">
								  <div class="modal-content">
									<div class="modal-header">
									  <button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
									<div class="container-fluid">

									  @include('includes.uporabnik')

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