@extends('layouts.default')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
				<div class="panel panel-default">
				  <div class="panel-heading">
					<h3 class="panel-title">Izberi šifrant</h3>
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
				  	<a href="{{ route('obiski') }}" class="btn btn-info btn-block">Šifrant vrste obiskov</a>
				  	<a href="{{ route('vloge') }}" class="btn btn-info btn-block">Šifrant uporabniških vlog</a>
				  	<a href="{{ route('razmerja') }}" class="btn btn-info btn-block">Šifrant sorodstvenih razmerij</a>
				  	<a href="{{ route('bolezni') }}" class="btn btn-info btn-block">Šifrant belezni</a>
				  	<a href="{{ route('zdravila') }}" class="btn btn-info btn-block">Šifrant zdravil</a>
				  	<a href="{{ route('meritve') }}" class="btn btn-info btn-block">Šifrant meritev</a>
					<a href="{{ route('izvajalci') }}" class="btn btn-info btn-block">Šifrant izvajalcev zdravstvene dejavnosti</a>
				  </div>
				</div>
			</div>
		</div>
	</div>
@stop