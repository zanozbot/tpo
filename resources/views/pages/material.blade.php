@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Pregled materiala za plan</h3>
				  </div>
				  @if (count($errors) > 0)
			          <div class="alert alert-danger">
			            <ul>
			              @foreach ($errors->all() as $error)
			              <li>{{ $error }}</li>
			              @endforeach
			            </ul>
			          </div>
			      @endif
				  <div class="panel-body">
					<form role="form" method="post">
					{{ csrf_field() }}
						<div class="form-group">
						<label class="label label-primary">Datum plana</label>
						  <div class="datepicker input-group date" data-provide="datepicker">
							<input type="text" class="form-control" placeholder="dd.mm.llll" name="datumPlana">
							<div class="input-group-addon">
								<span class="glyphicon glyphicon-th"></span>
							</div>
						</div>
						<script>
							$('.datepicker').datepicker({
								format: "dd.mm.yyyy",
								todayBtn: "linked",
								clearBtn: true,
								autoclose: true,
								todayHighlight: true
							});
						</script>
						</div>
						<div class="form-group">
						 <input type="submit" value="Seznam materiala" class="btn btn-info btn-block">
						</div>
						</form>
				  </div>
				</div>
			</div>
			@if(isset($zdravila))
			<div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
					<h3 class="panel-title">Zdravila</h3>
					</div>
					<div class="panel-body">
						<table class="table ">
							<thead>
								<tr>
								<th><label>Šifra zdravila</label></th>
								<th><label>Ime zdravila</label></th>
								<th><label>Opis zdravila</label></th>
								<th><label>Količina</label></th>
								<th></th>
								</tr>
							</thead>
							<tbody>
								 @foreach($zdravila as $zdravilo)
								 	@if($zdravilo->kolicina>0)
											<tr>
												<td><label>{{$zdravilo->sifra_zdravilo}}</label></td>
												<td><label>{{$zdravilo->ime}}</label></td>
												<td><label>{{$zdravilo->opis}}</label></td>
												<td><label>{{$zdravilo->kolicina}}</label></td>
											</tr>
									@endif
								 @endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-10 col-sm-offset-1 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
					<h3 class="panel-title">Epruvete</h3>
					</div>
					<div class="panel-body">
						<table class="table ">
							<thead>
								<tr>
								<th><label>Barva epruvete</label></th>
								<th><label>Količina epruvet</label></th>
								<th></th>
								</tr>
							</thead>
							<tbody>
											<tr>
												<td style='background-color: rgb(255,150,150);'><label>Rdeča</label></td>
												<td><label>{{$epruvete['rd']}}</label></td>
											</tr>
											<tr>
												<td style='background-color: rgb(150,150,255);'><label>Modra</label></td>
												<td><label>{{$epruvete['mo']}}</label></td>
											</tr>
											<tr>
												<td style='background-color: rgb(255,255,150);'><label>Rumena</label></td>
												<td><label>{{$epruvete['ru']}}</label></td>
											</tr>
											<tr>
												<td style='background-color: rgb(150,255,150);'><label>Zelena</label></td>
												<td><label>{{$epruvete['ze']}}</label></td>
											</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		 @endif
		</div>
	</div>
@stop
