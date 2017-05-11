@extends('layouts.default')
@section('content')
{{ HTML::script('js/nadomescanje.js') }}
	<div class="container">
		@if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
		<div class="row">
			@if(isset($sestre))
			<div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
					<h3 class="panel-title">Nadomeščanja</h3>
					</div>
					<div class="panel-body">
						<table class="table ">
							<thead>
								<tr>
								<th><label>Šifra</label></th>
								<th><label>Ime</label></th>
								<th><label>Priimek</label></th>
								<th><label>Nerealizirani obiski</label></th>
								<th><label></label></th>
								</tr>
							</thead>
							<tbody>
								 @foreach($sestre as $sestra)
											<tr>
												<td><label>{{$sestra->sifra_ps}}</label></td>
												<td><label>{{$sestra->uporabnik->ime}}</label></td>
												<td><label>{{$sestra->uporabnik->priimek}}</label></td>
												@if($sestra->opravljeno)
												<td style='background-color: rgb(150,255,150);'><label>Ne</label></td>
												@else
												<td style='background-color: rgb(255,150,150);'><label>Da</label></td>
												<td>
													<form role="form" method="post">
													<input type="hidden" name="sifra" value="{{$sestra->sifra_ps}}"/>
													<div class="form-group">
														<input type="submit" value="Ponovno dodeli"  class="btn btn-info btn-block">
													</div>
													<input type="hidden" name="_token" value="{{ Session::token() }}"/>
													</form>
												</td>
												@endif

											</tr>
								 @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		 @endif
		</div>
	</div>
@stop
