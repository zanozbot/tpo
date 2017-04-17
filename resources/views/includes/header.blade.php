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
		<div class="container-fluid">
		<div class="row">
		@if (Auth::check())
		<div class="col-sm-3 col-lg-2">
		<div class="navbar navbar-inverse  navbar-fixed-side" >
			<ul class="nav navbar-nav">
				<li>
					<a class="vloga">Admin</a>
				</li>
				@if ((Auth::user()->sifra_vloga == 2 || Auth::user()->sifra_vloga == 3))
				<li>
					<a href="{{route('nalog')}}">Nov nalog</a>
				</li>
				<li>
					<a href="{{route('seznamNalogov')}}">Seznam nalogov</a>
				</li>
				@endif
				<!-- Trenutno funkcionalnost ni podprta
				@if (Auth::check() && (Auth::user()->sifra_vloga == 4))
				<li>
					<a href="obisk.html">Obisk</a>
				</li>
				@endif-->
				<!-- Trenutno funkcionalnost ni podprta
				<li>
					<a href="material.html">Material</a>
				</li>-->
				@if (Auth::user()->sifra_vloga == 4)
				<li>
					<a href="{{route('datumPlan')}}">Plan obiskov</a>
				</li>
				@endif
				@if (Auth::user()->sifra_vloga == 1)
				<li>
					<a href="{{ url('admin') }}"><span class="glyphicon glyphicon-user"></span> Dodaj osebje</a>
				</li>	
				@endif
				@if (Auth::user()->sifra_vloga == 6)
				<li>
					<a href="{{route('contact')}}"><span class="glyphicon glyphicon-phone"></span> Kontaktne osebe</a>		
				</li>
				<li>
					<a href="{{route('poduporabnik')}}"><span class="glyphicon glyphicon-user"></span> Poduporabniki</a>
					
				</li>
				@endif
				<li>
					<a href="{{route('newPassword')}}"><span class="glyphicon glyphicon-pencil"></span> Spremeni geslo</a>
					<a href="{{route('odjava')}}"><span class="glyphicon glyphicon-log-out"></span>	Odjava</a>
						
				</li>

			</ul>
		</div>
		</div>
		<div class="col-sm-9 col-lg-10">
		@else
		<div class="col-sm-12 col-lg-12">
		@endif
		
     		@yield('content')

		</div>
		</div>
			    


