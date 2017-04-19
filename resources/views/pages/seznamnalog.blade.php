@extends('layouts.default')
@section('content')
<div class="container">
	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Seznam Nalogov</h3>
	  </div>
	  <div class="panel-body">
			  <div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Filter</h3>
				  </div>
				  <div class="panel-body"> 
					<div class="row">
					<form role="form" action="{{ route('filterSeznamNalogov') }}" method="post">
	            		{{ csrf_field() }}
						<div class="col-xs-12 col-sm-12 col-md-6">
							<div class="form-group">
							  <label class="label label-primary">Izdajalec</label>
							  @if (Auth::user()->sifra_vloga == 3)
							  	<input type="text" class="form-control input-sm" name="izdajalec" placeholder=""></input>
							  @else 
							  <input type="text" class="form-control input-sm" name="izdajalec" placeholder="Med izdajalci lahko išče le vodja" disabled="true"></input>
							  @endif
							</div>
							<div class="form-group">
							  <label class="label label-primary">Pacient</label>
							  <!--<input type="text" class="form-control input-sm" name="pacient" placeholder="Šifra pacienta"></input>-->
							  <select class="selectpicker form-control input-sm" name="pacient" required>
			                    <option> - </option>
			                  @foreach ($pacienti as $pacient)
			                    <option value="{{$pacient->stevilka_KZZ}}">{{ $pacient->ime_pacienta . " " . $pacient->priimek_pacienta . " | " . $pacient->stevilka_KZZ }}</option>
			                  @endforeach
			                  </select>
							</div>
							<div class="form-group">
							  <label class="label label-primary">Zadolžena patronažna sestra</label>
							  <!--<input type="text" class="form-control input-sm" name="zadolzenaSestra" placeholder="Šifra patronažne sestre"></input>-->
							  @if (Auth::user()->sifra_vloga != 4)
							  <select class="selectpicker form-control input-sm" name="zadolzenaSestra" required>
			                    <option> - </option>
			                  @foreach ($sestre as $sestra)
			                    <option value="{{$sestra->sifra_ps}}">{{ $sestra->ime . " " . $sestra->priimek }}</option>
			                  @endforeach
			                  </select>
			                  @else 
				                  @foreach ($sestre as $sestra)
				                  	@if ($sestra->id_sestre == Auth::user()->id_uporabnik)
										<input type="text" class="form-control input-sm" name="zadolzenaSestra" value="{{$sestra->sifra_ps}} " disabled="true"></input>
				                  	@endif
				                  @endforeach
			                  @endif
							</div>
							<div class="form-group">
							  <label class="label label-primary">Nadomestna patronažna sestra</label>
							  <input type="text" class="form-control input-sm" name="nadomestnaSestra" placeholder="Šifra patronažne sestre"></input>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6">
							<form>
								<div class="form-group">
								  <label class="label label-primary">Vrsta obiska</label>
								  <select class="form-control input-sm" name="obisk">
									<option>-</option>
									<option>Obisk nosečnice</option>
									<option>Obisk otročnice</option>
									<option>Preventiva starostnika</option>	
									<option>Aplikacija injekcij</option>
									<option>Odvzem krvi</option>
									<option>Kontrola zdravstvenega stanja</option>	
								  </select>
								</div>
							</form>
							<div class="form-group" name="odDatumDiv">
							  <label class="label label-primary">Od datuma</label>
							  <div class="datepicker input-group date" data-provide="datepicker">
								<input type="text" class="form-control" placeholder="dd.mm.llll" name="odDatum">
								<div class="input-group-addon">
								  <span class="glyphicon glyphicon-th"></span>
								</div>
							  </div>
							  <script>
								$('.datepicker').datepicker({
									format: "dd.mm.yyyy",
									clearBtn: true,
									autoclose: true,
									todayHighlight: true
								});
							  </script>
							</div>	
							<div class="form-group" name="doDatumDiv">
							  <label class="label label-primary">Do datuma</label>
							  <div class="datepicker input-group date" data-provide="datepicker">
								<input type="text" class="form-control" placeholder="dd.mm.llll" name="doDatum">
								<div class="input-group-addon">
								  <span class="glyphicon glyphicon-th"></span>
								</div>
							  </div>
							  <script>
								$('.datepicker').datepicker({
									format: "dd.mm.yyyy",
									clearBtn: true,
									autoclose: true,
									todayHighlight: true
								});
							  </script>
							</div>
							<input type="submit" value="Filtriraj" class="btn btn-info btn-block">
						</div>
					</form>
					</div>
				  </div>
			  </div>
			  
		  <table class="table ">
			<thead>
			  <tr>
				<th><label>Šifra naloga</label></th>
				<th><label>Pacient</label></th>
				<th><label>Naslov</label></th>
				<th><label>Vrsta naloga</label></th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			   @foreach ($mix as $mini)
			    <!-- TODO: Ko je šifra naloga ista, se izpiše le prvi
			    AFNAif ($mini->ime_vrsta_obiska == 'Obisk otročnice' && $mini->pac_stevilka_KZZ != -1)

			   	AFNAelse-->
			   	@if (!isset($prejsnjaSifra) || $prejsnjaSifra != $mini->sifra_dn)
					<tr>
						<td><label>{{$mini->sifra_dn}}</label></td>
						<td><label>{{$mini->ime_pacienta.' '.$mini->priimek_pacienta}}</label></td>
						<td><label>{{$mini->naslov_pacienta.', '.$mini->kraj_pacienta}}</label></td>
						<td><label>{{$mini->ime_vrsta_obiska}}</label></td>
						<td >		
							<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti{{$mini->sifra_dn}}"><span class="glyphicon glyphicon-plus"></span></button>
							<div class="modal fade" id="podrobnosti{{$mini->sifra_dn}}" role="dialog">
								<div class="modal-dialog modal-lg">
								  <div class="modal-content">
									<div class="modal-header">
									  <button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
									<div class="container-fluid">
										@include('includes.nalog')
									</div>
									</div>
								  </div>
								</div>
							</div>
						</td>
					</tr>
				@endif
				@php ($prejsnjaSifra = $mini->sifra_dn)
				<!-- AFNAendif -->
			@endforeach
			</tbody>
		  </table>
	</div>
	</div>
</div>
@stop
