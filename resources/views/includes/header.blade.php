<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href ="{{ route('home') }}">Patronažna služba</a>
	</div>
	<div class="collapse navbar-collapse " id="navbar-collapse-1">
		<ul class="nav navbar-nav pull-right">
			@if (Auth::check())
			<li>
				<a>{{Auth::user()->ime}} {{Auth::user()->priimek}}</a>
			</li>
			@else
			<li>
				<a href="{{route('home')}}">Prijava</a>
			</li>
			@endif
		</ul>
	</div>
</nav>

			    


