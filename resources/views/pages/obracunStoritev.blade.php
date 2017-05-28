@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Obračun storitev v izbranem obdobju</h3>
				  </div>
				  @if (count($errors) > 0)
			          <div class="alert alert-danger">
			            <ul>
			              @foreach ($errors->all() as $error)
			              <li>{{ $error }}</li>
			              @endforeach
			            </ul>
			          </div>
			      @endif
				  <div class="panel-body">
					<form role="form" method="post" action="">
						{{ csrf_field() }}
						<div class="form-group">
						<label class="label label-primary">Datum začetka</label>
						  <div class="datepicker input-group date" data-provide="datepicker">
							<input type="text" class="form-control" placeholder="dd.mm.llll" name="datumZacetek" required="true">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>

						<div class="form-group">
						<label class="label label-primary">Datum konca</label>
						  <div class="datepicker input-group date" data-provide="datepicker">
							<input type="text" class="form-control" placeholder="dd.mm.llll" name="datumKonec" required="true">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
						<script>
							$('.datepicker').datepicker({
								format: "dd.mm.yyyy",
								todayBtn: "linked",
								clearBtn: true,
								autoclose: true,
								todayHighlight: true
							});
						</script>
						</div>
						<div class="form-group">
						 <input type="submit" value="Naredi obračun" class="btn btn-info btn-block">
						</div>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop