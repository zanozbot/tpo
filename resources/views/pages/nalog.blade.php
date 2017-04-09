@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-10 ">
				<div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Kreiranje delovnega naloga</h3>
				  </div>
				  <div class="panel-body">
				  <form role="form" >
						  <!--  Zdravnik ali vodja PS lahko kreira delovni nalog. Zdravnik lahko kreira delovni nalog za vse vrste obiskov, vodja patronažne službe pa samo za preventivne obiske. Izmed preventivnih obiskov obravnavamo samo obisk nosečnice, obisk otročnice in novorojenčka ter preventivo starostnika. Izmed kurativnih obiskov obravnavamo aplikacijo injekcij, odvzem krvi in kontrolo zdravstvenega stanja. Pri obisku otročnice in novorojenčka je treba vnesti imena vseh pacientov (mame in otrok), tako da je na isti delovni nalog (v splošnem) lahko vezanih več pacientov. 
						  Pri aplikaciji injekcij je treba iz šifranta zdravil izbrati še ustrezna zdravila, ki ga jih treba injicirati. Pri odvzemu krvi pa je potrebno določiti barvo (rdeča, modra, rumena, zelena) in število epruvet. Vsak delovni nalog se nanaša samo na eno vrsto obiskov. Za vsak delovni nalog je treba navesti datum prvega obiska, število obiskov in (časovni interval med dvema zaporednima obiskoma ali časovno obdobje, v katerem morajo biti ti obiski opravljeni). Pri datumu prvega obiska naj bo moč izbrati, ali je datum obvezen ali samo okviren. -->
						  
						  <div class="form-group">
							<label class="label label-primary">Vrsta obiska</label>
							<select class="selectpicker form-control input-sm" name="vrstaObiska">
								<option>Preventivni</option>
								<option>Kurativni</option>
							</select>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Naloge</label>
							<select class="selectpicker form-control input-sm" name="nalogeObiska" multiple>
								<option>Obisk nosečnice</option>
								<option>Obisk otročnice</option>
								<option>Preventiva starostnika</option>
								<option>Aplikacija injekcij</option>
								<option>Odvzem krvi</option>
								<option>Kontrola zdravstvenega stanja</option>
							</select>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Vezani pacienti</label>
							<input type="text" class="form-control" name="vezaniPacient" ><button type="button" class="btn btn-add btn-block"><strong>+</strong>
						</button>
							</input>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Ustrezna zdravila</label>
							<select class="selectpicker form-control input-sm" name="ustreznaZdravila" multiple>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
							</select>
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Barva in število epruvet</label>
							<select class="selectpicker form-control input-sm" name="barvaEpruvete">
								<option>Rdeča</option>
								<option>Modra</option>
								<option>Rumena</option>
								<option>Zelena</option>
							</select>
							<input type="number" class="form-control input-sm" name="steviloEpruvet" placeholder="Število epruvet">
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Datum prvega obiska</label>
							<input type="date" class="form-control input-sm" name="datumPrvegaObiska">
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Število obiskov</label>
							<input type="number" class="form-control input-sm" name="steviloObiskov" placeholder="Število obiskov">
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Časovni interval</label>
							<input type="number" class="form-control input-sm" name="casovniInterval" placeholder="Število dni">
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Končni datum</label>
							<input type="date" class="form-control input-sm" name="koncniDatum">
						  </div>
						  <div class="form-group">
							<label class="label label-primary">Obvezno držanje datuma</label>
							<label class="radio-inline"><input type="radio" class="radio-inline" name="obveznoDrzanjeDatuma">Da</label>
							<label class="radio-inline"><input type="radio" class="radio-inline" name="obveznoDrzanjeDatuma">Ne</label>
						  </div>
						  <input type="submit" value="Kreiraj nalog" class="btn btn-info btn-block">
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop