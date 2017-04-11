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
				<li>
					<a href="{{route('nalog')}}">Nalog</a>
				</li>
				<li>
					<a href="obisk.html">Obisk</a>
				</li>
				<li>
					<a href="material.html">Material</a>
				</li>
				<li>
					<a href="pot.html">Pot</a>
				</li>
				<li >
					<a href="{{ url('admin') }}">Admin</a>
				</li>	
				<li>
					<a href="profil.html">Profil</a>
				</li>
			</ul>
		</div>
	</div>
</nav>

