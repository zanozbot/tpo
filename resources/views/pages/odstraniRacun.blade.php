@extends('layouts.default')
@section('content')
	<div class="container">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Odstranitev računa</h3>
				  </div>
				  <div class="panel-body">
						<form role="form" method="post">
						<div class="form-group">
							<label class="label label-primary">Geslo za potrditev</label>
							<input type="password" name="geslo" class="form-control input-sm" placeholder="Geslo"
							 required>
						  </div>
						  <input type="submit" value="Odstrani račun" class="btn btn-info btn-block">
						  {{ csrf_field() }}
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
