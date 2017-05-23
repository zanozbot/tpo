@extends('layouts.default')
@section('content')
{{ HTML::script('js/nadomescanje.js') }}
	<div class="container">
		<div class="row">
			@if(isset($sestre))
			<div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1">
				@if(session('status'))
								<div class="alert alert-success">
									{{ session('status') }}
								</div>
				@endif
				<div class="panel panel-default">
					<div class="panel-heading">
					<h3 class="panel-title">Nadomeščanja</h3>
					</div>
					<div class="panel-body">
						@if(count($sestre)==0)
						 <td><label>Ni nadomeščanj, katera bi potrebovala zaključevanje.</label></td>
						@else
						<table class="table ">
							<thead>
								<tr>
								<th><label>Šifra</label></th>
								<th><label>Ime</label></th>
								<th><label>Priimek</label></th>
								<th><label>Ali je nadomestna sestra opravila vse obiske</label></th>
								<th><label>Ponovno dodeli obiske prvotni sestri</label></th>
								</tr>
							</thead>
							<tbody>
								 @foreach($sestre as $sestra)
											<tr>
												<td><label>{{$sestra->sifra_ps}}</label></td>
												<td><label>{{$sestra->uporabnik->ime}}</label></td>
												<td><label>{{$sestra->uporabnik->priimek}}</label></td>
												<td><span class="glyphicon glyphicon-remove-sign"></span></td>
												<td>
													<form role="form" method="post">
													<input type="hidden" name="sifra" value="{{$sestra->sifra_ps}}"/>
													<div class="form-group">
														<input type="submit" value="Zaključi nadomeščanje"  class="btn btn-info btn-block">
													</div>
													<input type="hidden" name="_token" value="{{ Session::token() }}"/>
													</form>
												</td>
											</tr>
								 @endforeach
							</tbody>
						</table>
						@endif
					</div>
				</div>
			</div>
		 @endif
		</div>
	</div>
@stop
