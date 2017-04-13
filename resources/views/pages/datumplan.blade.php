@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Kreiranje plana</h3>
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
					<form role="form" method="post">
					{{ csrf_field() }}
					<div class="form-group">
						<label class="label label-primary">Datum plana</label>
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
						  <input type="submit" value="Ustvari plan" class="btn btn-info btn-block">
						</form>
					</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop