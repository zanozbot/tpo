<div class="panel panel-default">
	@if(!empty($vrstaObiska))
	<div class="panel-heading">
		<h3 class="panel-title">Spremeni vrsto obiska</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra vrste obiska</label>
						<input style="width: 100%" type="number" class="form-control" name="sifra" readonly="true" value="{{ $vrstaObiska->sifra_vrsta_obisk }}">
					</div>
					</br></br>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Preventivna vrsta obiska</label>
						<select  style="width: 100%" class="selectpicker form-control input-sm" name="preventivni" required="true">
							<option value="1" {{ $vrstaObiska->preventivni ? "selected" : "" }}>Da</option>
							<option value="0" {{ !$vrstaObiska->preventivni ? "selected" : "" }}>Ne</option>
					  	</select>
					</div>
					</br></br>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Ime vrste obiska</label>
						<input style="width: 100%" type="text" class="form-control" name="ime" required="true" value="{{ $vrstaObiska->ime }}">
					</div>
					</br></br>
					<input type="submit" value="Posodobi" class="btn btn-info btn-block" >
					<input type="hidden" name="method" value="posodobi"/>
					<input type="hidden" name="_token" value="{{ Session::token() }}"/>
				</form>
			</div>		
		</div>
	</div>
	@else
	<div class="panel-heading">
		<h3 class="panel-title">Dodaj vrsto obiska</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					<div class="form-group">
						<label class="label label-primary">Šifra vrste obiska</label>
						<input type="number" class="form-control" name="sifra" required="true">
					</div>
					<div class="form-group">
						<label class="label label-primary">Preventivna vrsta obiska</label>
						<select  class="selectpicker form-control input-sm" name="preventivni" required="true">
							<option value="1">Da</option>
							<option value="0">Ne</option>
					  	</select>
					</div>
					<div class="form-group">
						<label class="label label-primary">Ime vrste obiska</label>
						<input type="text" class="form-control" name="ime" required="true"">
					</div>
					<input type="submit" value="Dodaj" class="btn btn-info btn-block" >	
					<input type="hidden" name="method" value="dodaj"/>
					<input type="hidden" name="_token" value="{{ Session::token() }}"/>
				</form>
			</div>		
		</div>
	</div>
	@endif
</div>