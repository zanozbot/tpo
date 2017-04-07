@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Prijava</h3>
				  </div>
				  <div class="panel-body">
					<form role="form" >
					  <div class="form-group">
						<label class="label label-primary">Uporabniško ime</label>
						<input type="text" name="uporabniskoime" class="form-control input-sm" placeholder="Uporabnik" required>
					  </div>
					  <div class="form-group">
							<label class="label label-primary">Geslo</label>
							<input type="password" pattern="(?=.*\d).{8,}" name="geslo" class="form-control input-sm" placeholder="Geslo" 
							title="neustrezno geslo" required>
					  </div>
					  <input type="submit" value="Prijavi se" class="btn btn-info btn-block">
					  <a href="{{route('register')}}">Še nimaš uporabniškega računa? Klikni tu.</a>
					</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop