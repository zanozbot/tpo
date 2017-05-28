<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Spremeni uporabnika</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					@if ($uporabnik->vloga->sifra_vloga == 2 || $uporabnik->vloga->sifra_vloga == 3)
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra uporabnika</label>
						<input style="width: 100%" type="text" class="form-control" name="sifra" readonly="true" value="{{ $uporabnik->delavec->sifra_delavec }}">
					</div>
					@elseif ($uporabnik->vloga->sifra_vloga == 4)
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra uporabnika</label>
						<input style="width: 100%" type="text" class="form-control" name="sifra" readonly="true" value="{{ $uporabnik->patronazna_sestra->sifra_ps }}">
					</div>
					@endif
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Vloga uporabnika</label>
						<input style="width: 100%" type="text" class="form-control" name="vloga" readonly="true" value="{{ $uporabnik->vloga->ime }}">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Email uporabnika</label>
						<input style="width: 100%" type="email" class="form-control" name="email" value="{{ $uporabnik->email }}" required="true">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Ime uporabnika</label>
						<input style="width: 100%" type="text" class="form-control" name="ime" value="{{ $uporabnik->ime }}" required="true">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Priimek uporabnika</label>
						<input style="width: 100%" type="text" class="form-control" name="priimek" value="{{ $uporabnik->priimek }}" required="true">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Novo geslo uporabnika</label>
						<input style="width: 100%" pattern="(?=.*\d).{8,}" type="password" class="form-control" name="geslo" >
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Telefonska številka uporabnika</label>
						<input style="width: 100%" type="text" pattern="[0-9]{9}" class="form-control" name="stevilka" value="{{ $uporabnik->tel_stevilka }}" required="true">
					</div>
					<input type="submit" value="Posodobi" class="btn btn-info btn-block" >
					<input type="hidden" name="method" value="posodobi"/>
					<input type="hidden" name="id" value="{{ $uporabnik->id_uporabnik }}"/>
					<input type="hidden" name="_token" value="{{ Session::token() }}"/>
				</form>
			</div>		
		</div>
	</div>
</div>