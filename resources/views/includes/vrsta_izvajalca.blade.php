<div class="panel panel-default">
	@if(!empty($izvajalec))
	<div class="panel-heading">
		<h3 class="panel-title">Spremeni izvajalca</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra izvajalca</label>
						<input style="width: 100%" type="text" class="form-control" name="sifra" readonly="true" value="{{ $izvajalec->sifra_zd }}">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Poštna številka</label>
						</br>
						<select style="width: 100%" class="selectpicker form-control input-sm" name="posta" required="true">
						  @foreach ($poste as $posta)
							<option value="{{ $posta->postna_stevilka }}" {{ ($izvajalec->postna_stevilka == $posta->postna_stevilka ? "selected":"") }}>{{ $posta->postna_stevilka . " " . $posta->kraj }}</option>
						  @endforeach
						  </select>
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Naziv izvajalca</label>
						<input style="width: 100%" type="text" class="form-control" name="naziv" value="{{ $izvajalec->naziv }}" required="true">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Naslov izvajalca</label>
						<input style="width: 100%" type="text" class="form-control" name="naslov" value="{{ $izvajalec->naslov }}" required="true">
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
		<h3 class="panel-title">Dodaj izvajalec</h3>
	</div>
  	<div class="panel panel-default">
  		<div class="panel-body">  		
		  	<div class="row">		
				<form action="" method="post">
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Šifra izvajalca</label>
						<input style="width: 100%" type="text" class="form-control" name="sifra" required="true">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Poštna številka</label>
						<select  class="selectpicker form-control input-sm" name="posta" required="true">
						  @foreach ($poste as $posta)
							<option value="{{ $posta->postna_stevilka }}">{{ $posta->postna_stevilka . " " . $posta->kraj }}</option>
						  @endforeach
						  </select>
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Naziv izvajalca</label>
						<input style="width: 100%" type="text" class="form-control" name="naziv" required="true"">
					</div>
					<div class="form-group" style="width: 100%">
						<label class="label label-primary">Naslov izvajalca</label>
						<input style="width: 100%" type="text" class="form-control" name="naslov" required="true"">
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