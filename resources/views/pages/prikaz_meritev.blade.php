@extends('layouts.default')
@section('content')
<div class="container">

{{ HTML::script('js/Chart.bundle.min.js') }}

	@if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Prikaz meritev krvnega tlaka za delovni nalog {{ $delovniNalog->sifra_dn }} - {{ $delovniNalog->pacient->first()->ime }} {{ $delovniNalog->pacient->first()->priimek }}.</h3>
	  </div>

	  <div class="panel-body">
		  <div id="container" style="width: 100%;">
        <canvas id="canvas" style="display: block; width: auto; height: auto;"></canvas>
    </div>
    <script>
    	window.chartColors = {
			red: 'rgb(255, 99, 132)',
			orange: 'rgb(255, 159, 64)',
			yellow: 'rgb(255, 205, 86)',
			green: 'rgb(75, 192, 192)',
			blue: 'rgb(54, 162, 235)',
			purple: 'rgb(153, 102, 255)',
			grey: 'rgb(201, 203, 207)'
		};
    
        var color = Chart.helpers.color;
        var barChartData = {
            labels: [
            @foreach($datum as $d)
                	"{{ $d }}",
            @endforeach
            ],
            datasets: [{
                label: 'Sistolični krvni tlak',
                backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
                borderColor: window.chartColors.red,
                borderWidth: 1,
                data: [
                	@foreach($sistolicni as $sis)
                	{{$sis}},
                	@endforeach
                ]
            }, {
                label: 'Diastolični krvni tlak',
                backgroundColor: color(window.chartColors.blue).alpha(0.5).rgbString(),
                borderColor: window.chartColors.blue,
                borderWidth: 1,
                data: [
                    @foreach($diastolicni as $dia)
                	{{$dia}},
                	@endforeach
                ]
            }]

        };

        window.onload = function() {
            var ctx = document.getElementById("canvas").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: false
                    }
                }
            });

        };
    </script>
	  </div>
	</div>
</div>
@stop