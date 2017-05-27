<div class="panel panel-default">
	@if(!empty($bolezen))
	<div class="panel-heading">
		<h3 class="panel-title">Spremeni bolezen</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra bolezni</label>
						<input style="width: 100%" type="text" class="form-control" name="sifra" readonly="true" value="{{ $bolezen->sifra_bolezen }}">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Ime rbolezni</label>
						<input style="width: 100%" type="text" class="form-control" name="ime" required="true" value="{{ $bolezen->ime }}">
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
		<h3 class="panel-title">Dodaj bolezen</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra bolezni</label>
						<input style="width: 100%" type="text" class="form-control" name="sifra" required="true" ">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Ime bolezni</label>
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