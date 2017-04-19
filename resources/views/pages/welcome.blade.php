@extends('layouts.default')
@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
		@if (Auth::user())
        <div class="alert alert-success text-center">Dobrodošli {{Auth::user()->ime}}! <div>
		@else	
		<div class="container">
			<div class="row">
				<div class="box" >  
					<div class="col-lg-12 text-center">
						<div id="carousel" class="carousel slide">
							<!-- Indicators -->
							<ol class="carousel-indicators hidden-xs">
								<li data-target="#carousel" data-slide-to="0" class="active"></li>
								<li data-target="#carousel" data-slide-to="1"></li>
								<li data-target="#carousel" data-slide-to="2"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner">
								<div class="item active">
									<img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
								</div>
								<div class="item">
									<img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
								</div>
								<div class="item">
									<img class="img-responsive img-full" src="img/slide-3.jpg" alt="">
								</div>
							</div>

							<!-- Controls -->
							<a class="left carousel-control" href="#carousel" data-slide="prev">
								<span class="icon-prev"></span>
							</a>
							<a class="right carousel-control" href="#carousel" data-slide="next">
								<span class="icon-next"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="box" >                   
					<div class="col-lg-12">
						<div class="text-center">
						<h1>Patronažna služba</h1>
						<hr>
						<h2>
						<a href="{{route('register')}}">Pridruži se!</a>
						</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endif
		

@stop