<div class="panel panel-default">
	@if(!empty($zdravilo))
	<div class="panel-heading">
		<h3 class="panel-title">Spremeni zdravilo</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra zdravila</label>
						<input style="width: 100%" type="text" class="form-control" name="sifra" readonly="true" value="{{ $zdravilo->sifra_zdravilo }}">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Ime zdravila</label>
						<input style="width: 100%" type="text" class="form-control" name="ime" required="true" value="{{ $zdravilo->ime }}">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Opis zdravila</label>
						<input style="width: 100%" type="text" class="form-control" name="opis" required="true" value="{{ $zdravilo->opis }}">
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
		<h3 class="panel-title">Dodaj zdravilo</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra zdravila</label>
						<input style="width: 100%" type="text" class="form-control" name="sifra" required="true" ">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Ime zdravila</label>
						<input style="width: 100%" type="text" class="form-control" name="ime" required="true">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Opis zdravila</label>
						<input style="width: 100%" type="text" class="form-control" name="opis" required="true">
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