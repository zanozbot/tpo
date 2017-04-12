@extends('layouts.default')
@section('content')
	<div class="container">
		@if (session('status'))
		    <div class="alert alert-success">
		        {{ session('status') }}
		    </div>
		@endif
		@if (session('warning'))
		    <div class="alert alert-warning">
		        {{ session('warning') }}
		    </div>
		@endif
		@if (session('danger'))
		    <div class="alert alert-danger">
		        {{ session('danger') }}
		    </div>
		@endif
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Prijava</h3>
				  </div>
				  <div class="panel-body">
					<form role="form" method="post">
					{{ csrf_field() }}
					  <div class="form-group">
						<label class="label label-primary">Uporabniško ime</label>
						<input type="text" name="uporabniskoime" class="form-control input-sm" placeholder="Uporabnik" required>
					  </div>
					  <div class="form-group">
							<label class="label label-primary">Geslo</label>
							<!-- <input type="password" pattern="(?=.*\d).{8,}" name="geslo" class="form-control input-sm" placeholder="Geslo" 
							title="neustrezno geslo" required> -->
							<input type="password" name="geslo" class="form-control input-sm" placeholder="Geslo" required>
					  </div>
					  <input type="submit" value="Prijavi se" class="btn btn-info btn-block">
					  <a style="padding: 1px;" href="{{route('register')}}"><center>Še nimaš uporabniškega računa? Klikni tu.</center></a>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop