@extends('layouts.default')
@section('content')
<div class="container">
	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Seznam Nalogov</h3>
	  </div>
	  <div class="panel-body">
		  <div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">Filter</h3>
			  </div>
			  <div class="panel-body"> 
				<div class="row">
				<form role="form" action="{{ route('filterSeznamNalogov') }}" method="post">
            		{{ csrf_field() }}
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div class="form-group">
						  <label class="label label-primary">Izdajalec</label>
						  <input type="text" class="form-control input-sm" name="izdajalec" ></input>	
						</div>
						<div class="form-group">
						  <label class="label label-primary">Pacient</label>
						  <input type="text" class="form-control input-sm" name="pacient" ></input>
						</div>
						<div class="form-group">  
						  <label class="label label-primary">Zadolžena patronažna sestra</label>
						  <input type="text" class="form-control input-sm" name="zadolzenaSestra" ></input>
						</div>
						<div class="form-group">
						  <label class="label label-primary">Nadomestna patronažna sestra</label>
						  <input type="text" class="form-control input-sm" name="nadomestnaSestra" ></input>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<form>
							<div class="form-group">
							  <label class="label label-primary">Vrsta obiska</label>
							  <select class="form-control input-sm" name="obisk">
								<option>-</option>
								<option>Obisk nosečnice</option>
								<option>Obisk otročnice</option>
								<option>Preventiva starostnika</option>	
								<option>Aplikacija injekcij</option>
								<option>Odvzem krvi</option>
								<option>Kontrola zdravstvenega stanja</option>	
							  </select>
							</div>
						</form>
						<div class="form-group" name="odDatumDiv">
						  <label class="label label-primary">Od datuma</label>
						  <div class="datepicker input-group date" data-provide="datepicker">
							<input type="text" class="form-control" placeholder="dd/mm/yyyy" name="odDatum">
							<div class="input-group-addon">
							  <span class="glyphicon glyphicon-th"></span>
							</div>
						  </div>
						  <script>
							$('.datepicker').datepicker({
								format: "dd/mm/yyyy",
								clearBtn: true,
								autoclose: true,
								todayHighlight: true
							});
						  </script>
						</div>	
						<div class="form-group" name="doDatumDiv">
						  <label class="label label-primary">Do datuma</label>
						  <div class="datepicker input-group date" data-provide="datepicker">
							<input type="text" class="form-control" placeholder="dd/mm/yyyy" name="doDatum">
							<div class="input-group-addon">
							  <span class="glyphicon glyphicon-th"></span>
							</div>
						  </div>
						  <script>
							$('.datepicker').datepicker({
								format: "dd/mm/yyyy",
								clearBtn: true,
								autoclose: true,
								todayHighlight: true
							});
						  </script>
						</div>
						<input type="submit" value="Filtriraj" class="btn btn-info btn-block">
					</div>
				</form>
				</div>
			  </div>
		  </div>
			  
		  <table class="table ">
			<thead>
			  <tr>
				<th>Šifra naloga</th>
				<th>Ustvaril</th>
				<th>Pacient</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			  @foreach ($mix as $minimix)
			  <tr>
				<td>{{$minimix->sifra_dn}}</td>
				<td>{{$minimix->datum_prvega_obiska}}</td>
				<td>{{$minimix->datum_koncnega_obiska}}</td>
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
			</tbody>
		  </table>
	</div>
	</div>
</div>
@stop
