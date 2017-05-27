<div class="panel panel-default">
	@if(!empty($razmerje))
	<div class="panel-heading">
		<h3 class="panel-title">Spremeni vrsto razmerja</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra vrste razmerja</label>
						<input style="width: 100%" type="text" class="form-control" name="sifra" readonly="true" value="{{ $razmerje->sifra_razmerje }}">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Ime razmerja</label>
						<input style="width: 100%" type="text" class="form-control" name="ime" required="true" value="{{ $razmerje->ime }}">
					</div>
					<input type="submit" value="Posodobi" class="btn btn-info btn-block" >
					<input type="hidden" name="method" value="posodobi"/>
					<input type="hidden" name="_token" value="{{ Session::token() }}"/>
				</form>
			</div>		
		</div>
	</div>
	@else
	<div class="panel-heading">
		<h3 class="panel-title">Dodaj vrsto razmerja</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra vrste razmerja</label>
						<input style="width: 100%" type="text" class="form-control" name="sifra" required="true" ">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Ime razmerja</label>
						<input style="width: 100%" type="text" class="form-control" name="ime" required="true">
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