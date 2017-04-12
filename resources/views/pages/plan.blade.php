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
					<form role="form" >
						<!-- seznam neopravljenih obiskov določene MS, vključno z obiski, kjer MS nadomešča -->
						<div class="list-group-item checkbox">
							<label><input type="checkbox" value="">Neobvezen obisk 1</label>
						</div>
						<div class="list-group-item checkbox">
							<label><input type="checkbox" value="">Neobvezen obisk 2</label>
						</div>
						<div class="list-group-item checkbox">
							<label><input type="checkbox" value="">Obisk nadomeščanje 1</label>
						</div>
						<div class="list-group-item checkbox">
							<label><input type="checkbox" value="">Obisk nadomeščanje 2</label>
						</div>
						<input type="submit" value="Dodaj obiske v plan" class="btn btn-info btn-block">
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
					<form role="form" >
						<!-- datepicker -->
						<div class="datepicker input-group date" data-provide="datepicker">
							<input type="text" class="form-control" placeholder="dd/mm/yyyy" name="datumPlana">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
						<script>
							$('.datepicker').datepicker({
								format: "dd/mm/yyyy",
								todayBtn: "linked",
								clearBtn: true,
								autoclose: true,
								todayHighlight: true
							});
						</script>
						<!-- seznam obiskov v planu, neobvezne se da odstraniti, obvezne pa ne -->
						<div class="list-group-item checkbox">
							<button type="button" class="btn btn-default" disabled>Odstrani</button>
							<label>Obvezen obisk 1</label>
						</div>
						<div class="list-group-item checkbox">
							<button type="button" class="btn btn-default" disabled>Odstrani</button>
							<label>Obvezen obisk 2</label>
						</div>
						<div class="list-group-item checkbox">
							<button type="button" class="btn btn-default" disabled>Odstrani</button>
							<label>Obvezen obisk 3</label>
						</div>
						<div class="list-group-item checkbox">
							<button type="button" class="btn btn-default">Odstrani</button>
							<label>Neobvezen obisk 3</label>
						</div>
						<input type="submit" value="Shrani plan" class="btn btn-info btn-block">
					</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
