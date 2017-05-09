@extends('layouts.default')
@section('content')
<div class="container">
	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Seznam Obiskov</h3>
	  </div>
	  <div class="panel-body">
			  <div class="panel panel-default">			
				  <div class="panel-heading">
					<h3 class="panel-title">Filter</h3>
				  </div>
				  <div class="panel-body">
						<div class="row">
						<form role="form" action="{{ route('filterSeznamObiskov') }}" method="post">
		            		{{ csrf_field() }}
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Podatki</h3>
									</div>
								<div class="panel-body">
								<div class="form-group">
								  <label class="label label-primary">Izdajalec</label>
									@if (Auth::user()->sifra_vloga != 2)
									  <select class="selectpicker form-control input-sm" name="pacient" required>
				                    	<option> - </option>
									  	@foreach ($izdajatelji as $izdajatelj)
						                    <option value="{{$izdajatelj->sifra_delavca}}">{{ $izdajatelj->ime_delavca . " " . $izdajatelj->priimek_delavca . " | " . $izdajatelj->ime_vloge }}</option>
						                @endforeach
						                </select>
									@else 
								  		@foreach ($izdajatelji as $izdajatelj)
						                  	@if ($izdajatelj->id_uporabnik == Auth::user()->id_uporabnik)
												<input type="text" class="form-control input-sm" name="zadolzenaSestra" value="{{$izdajatelj->sifra_delavca}} " disabled="true"></input>
						                  	@endif
						                @endforeach
								  	@endif
								</div>
								<div class="form-group">
								  <label class="label label-primary">Pacient</label>
								  <select class="selectpicker form-control input-sm" name="pacient" required>
				                    <option> - </option>
				                  @foreach ($pacienti as $pacient)
				                    <option value="{{$pacient->stevilka_KZZ}}">{{ $pacient->ime_pacienta . " " . $pacient->priimek_pacienta . " | " . $pacient->stevilka_KZZ }}</option>
				                  @endforeach
				                  </select>
								</div>
								<div class="form-group">
								  <label class="label label-primary">Zadolžena patronažna sestra</label>
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
								  @if (Auth::user()->sifra_vloga != 4)
									<select class="selectpicker form-control input-sm" name="nadomestnaSestra" required>
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
								<div class="form-group">
								  <label class="label label-primary">Stanje obiska</label>
								  <select class="form-control input-sm" name="stanjeObiska">
									<option>-</option>
									<option>Opravljen</option>
									<option>Neopravljen</option>
								  </select>
								</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Predvideni datum obiska</h3>
								</div>
								<div class="panel-body">
									<div class="form-group" name="odDatumDiv">
									  <label class="label label-primary">Od datuma</label>
									  <div class="datepicker input-group date" data-provide="datepicker">
										<input type="text" class="form-control" placeholder="dd.mm.llll" name="predvideniOdDatum">
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
										<input type="text" class="form-control" placeholder="dd.mm.llll" name="predvideniDoDatum">
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
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h3 class="panel-title">Dejanski datum obiska</h3>
								</div>
								<div class="panel-body">
									<div class="form-group" name="odDatumDiv">
									  <label class="label label-primary">Od datuma</label>
									  <div class="datepicker input-group date" data-provide="datepicker">
										<input type="text" class="form-control" placeholder="dd.mm.llll" name="dejanskiOdDatum">
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
										<input type="text" class="form-control" placeholder="dd.mm.llll" name="dejanskiDoDatum">
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
								</div>
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
				<th><label>Šifra obiska</label></th>
				<th><label>Pacient</label></th>
				<th><label>Naslov</label></th>
				<th><label>Vrsta obiska</label></th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			 	@foreach ($mix as $mini)
					<tr>
						<td><label>{{$mini->sifra_obisk}}</label></td>
						<td><label>{{$mini->ime_pacienta.' '.$mini->priimek_pacienta}}</label></td>
						<td><label>{{$mini->naslov_pacienta.', '.$mini->kraj_pacienta}}</label></td>
						<td><label>{{$mini->ime_vrsta_obiska}}</label></td>
						<td >		
							<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti{{$mini->sifra_obisk}}"><span class="glyphicon glyphicon-plus"></span></button>
							<div class="modal fade" id="podrobnosti{{$mini->sifra_obisk}}" role="dialog">
								<div class="modal-dialog modal-lg">
								  <div class="modal-content">
									<div class="modal-header">
									  <button type="button" class="close" data-dismiss="modal">&times;</button>
									</div>
									<div class="modal-body">
									<div class="container-fluid">
										@include('includes.obisk')
									</div>
									</div>
								  </div>
								</div>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		  </table>
	</div>
	</div>
</div>
@stop
