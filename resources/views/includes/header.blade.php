<nav class="navbar navbar-default" role="navigation">
	<div class="container">
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
				@if (Auth::check() && (Auth::user()->sifra_vloga == 2 || Auth::user()->sifra_vloga == 3))
				<li>
					<a href="{{route('nalog')}}">Nalog</a>
				</li>
				@endif
				@if (Auth::check() && (Auth::user()->sifra_vloga == 4))
				<li>
					<a href="obisk.html">Obisk</a>
				</li>
				@endif
				<!-- Trenutno funkcionalnost ni podprta
				<li>
					<a href="material.html">Material</a>
				</li>-->
				@if (Auth::check() && (Auth::user()->sifra_vloga == 4))
				<li>
					<a href="{{route('datumPlan')}}">Plan</a>
				</li>
				@endif
				@if (Auth::check() && (Auth::user()->sifra_vloga == 1))
				<li >
					<a href="{{ url('admin') }}">Admin</a>
				</li>	
				@endif
				@if (Auth::check())
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->ime}}<span class="caret"></span></a>
					<ul class="dropdown-menu">
			            <li><a href="#">Poduporabnik #1</a></li>
			            <li><a href="{{route('register')}}">Dodaj poduporabnika</a></li>
			            <li><a href="{{route('odjava')}}">Odjava</a></li>
			          </ul>
				</li>
				@else
				<li>
					<a href="{{route('home')}}">Prijava</a>
				</li>
				@endif
			</ul>
		</div>
	</div>
</nav>

