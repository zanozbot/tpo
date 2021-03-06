<div class="container-fluid">
	<div class="row">
		@if (Auth::check())
		<div class="col-sm-3 col-lg-2">
			<div class="navbar navbar-inverse  navbar-fixed-side" >
				<ul class="nav navbar-nav">
					@if (Auth::user()->sifra_vloga == 1)
					<li>
						<a class="vloga">Administrator</a>
					</li>
					<li>
						<a href="{{ url('admin') }}"><span class="glyphicon glyphicon-user"></span> Dodaj osebje</a>
					</li>
					<li>
						<a href="{{ url('sifranti') }}"><span class="glyphicon glyphicon-th-list"></span> Šifranti</a>
					</li>
					<li>
						<a href="{{ url('uporabniki') }}"><span class="glyphicon glyphicon-pencil"></span> Zdravstveno osebje</a>
					</li>
					@endif
					@if (Auth::user()->sifra_vloga == 2)
					<li>
						<a class="vloga">Zdravnik</a>
					</li>
					<li>
						<a href="{{route('nalog')}}"><span class="glyphicon glyphicon-plus"></span> Nov nalog</a>
					</li>
					<li>
						<a href="{{route('seznamNalogov')}}"><span class="glyphicon glyphicon-list"></span> Nalogi</a>
					</li>
					<li>
						<a href="{{route('seznamObiskov')}}"><span class="glyphicon glyphicon-list"></span> Obiski</a>
					</li>
					<li>
						<a href="{{route('prikazMeritev')}}"><span class="glyphicon glyphicon-list-alt"></span> Prikaz meritev</a>
					</li>
					@endif
					@if (Auth::user()->sifra_vloga == 3)
					<li>
						<a class="vloga">Vodja patronažne službe</a>
					</li>
					<li>
						<a href="{{route('nalog')}}"><span class="fa fa-calendar-plus-o"></span> Nov nalog</a>
					</li>
					<li>
						<a href="{{route('seznamNalogov')}}"><span class="glyphicon glyphicon-list"></span> Nalogi</a>
					</li>
					<li>
						<a href="{{route('seznamObiskov')}}"><span class="glyphicon glyphicon-list"></span> Obiski</a>
					</li>
					<li>
						<a href="{{route('obracun_storitev')}}"><span class="glyphicon glyphicon-euro"></span> Obračun storitev</a>
					</li>
					<li>
						<a href="{{route('dolocitev_nadomescanja')}}"><span class="glyphicon glyphicon-th-large"></span> Določitev nadomeščanja</a>
					</li>
					<li>
						<a href="{{route('zakljucek_nadomescanja')}}"><span class="glyphicon glyphicon-th-large"></span> Zaključek nadomeščanja</a>
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
						<a class="vloga">Patronažna sestra</a>
					</li>
					<li>
						<a href="{{route('datumPlan')}}"><span class="glyphicon glyphicon-calendar"></span> Plan</a>
					</li>
					<li>
						<a href="{{route('material')}}"><span class="glyphicon glyphicon-list"></span> Material</a>
					</li>
					<li>
						<a href="{{route('seznamNalogov')}}"><span class="glyphicon glyphicon-list"></span> Nalogi</a>
					</li>
					<li>
						<a href="{{route('seznamObiskov')}}"><span class="glyphicon glyphicon-list"></span> Obiski</a>
					</li>
					<li>
						<a href="{{route('seznamObiskovVceraj')}}"><span class="glyphicon glyphicon-list"></span> Včerajšni/Današnji obiski</a>
					</li>
					<li>
						<a href="{{route('prikazMeritev')}}"><span class="glyphicon glyphicon-list-alt"></span> Prikaz meritev</a>
					</li>
					@endif
					@if (Auth::user()->sifra_vloga == 6)

					<li>
						<a class="vloga">Pacient</a>
					</li>
					<li>
						<a href="{{route('profil')}}"><span class="glyphicon glyphicon-user"></span> Profil</a>
					</li>
					<li>
						<a href="{{route('contact')}}"><span class="fa fa-address-book"></span> Kontaktne osebe</a>
					</li>
					<li>
						<a href="{{route('poduporabnik')}}"><span class="glyphicon glyphicon-user"></span> Poduporabniki</a>
					</li>
					<li>
						<a href="{{route('seznamObiskovPacient')}}"><span class="glyphicon glyphicon-list"></span> Obiski</a>
					</li>
					<li>
						<a href="{{route('prikazMeritev')}}"><span class="glyphicon glyphicon-list-alt"></span> Prikaz meritev</a>
					</li>
					<li>
						<a href="{{route('odstraniRacun')}}"><span class="glyphicon glyphicon-list-alt"></span> Odstrani račun</a>
					</li>
					@endif
					<li>
						<a href="{{route('newPassword')}}"><span class="fa fa-edit"></span> Spremeni geslo</a>
						<a href="{{route('odjava')}}"><span class="fa fa-power-off"></span>	Odjava</a>
					</li>
					<li>
						<a id="datum_zadnje_prijave" class="line"></a>
					</li>
					<script>
					  	var prvotniDatum = "{{ Auth::user()->datum_prijave }}";
					  	var arrStringov = prvotniDatum.split("-");
					  	var preurejeniDatum = arrStringov[2].concat(".".concat(arrStringov[1].concat(".".concat(arrStringov[0]))));
					  	$("#datum_zadnje_prijave").html("Datum zadnje prijave: "+preurejeniDatum);
					  </script>
				</ul>

			</div>
		</div>
		<div class="col-sm-9 col-lg-10">
		@endif
     		@yield('content')

		</div>
	</div>
</div>
