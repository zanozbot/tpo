@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Sprememba gesla</h3>
				  </div>
				  <div class="panel-body">
						<form role="form" >
						  <div class="form-group">
							<label class="label label-primary">Geslo</label>
							<input type="password" pattern="(?=.*\d).{8,}" name="geslo" class="form-control input-sm" placeholder="Geslo" 
							title="najmanj 8 znakov, vsaj en numeričen" required>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Potrdi geslo</label>
							<input type="password" pattern="(?=.*\d).{8,}" name="potrdigeslo" class="form-control input-sm" placeholder="Geslo" 
							title="najmanj 8 znakov, vsaj en numeričen" required>
						  </div>
						  <input type="submit" value="Spremeni geslo" class="btn btn-info btn-block">
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop
