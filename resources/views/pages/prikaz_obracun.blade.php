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
		<h3 class="panel-title">Obračun stroškov storitev za obdobje od {{$datumZacetek}} do {{$datumKonec}}.</h3>
	  </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Stroški glede na vrsto obiska</h3>
        </div>
        <div class="panel-body">
            <table class="table ">
                <thead>
                    <tr>
                    <th><label>Vrsta obiska</label></th>
                    <th><label>Število obiskov</label></th>
                    <th><label>Skupni stroški v €</label></th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($vrsteObiskov as $vrstaObiska)
                        <tr>
                            <td><label>{{$vrstaObiska->ime}}</label></td>
                            <td><label>{{$vrstaObiska->st_obiskov}}</label></td>
                            <td><label>{{$vrstaObiska->stroski}}</label></td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Skupni stroški vseh obiskov</h3>
        </div>
        <div class="panel-body">
            <table class="table ">
                <thead>
                    <tr>
                    <th><label>Število obiskov</label></th>
                    <th><label>Skupni stroški v €</label></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label>{{$stVsehObiskov_vrstaObiska}}</label></td>
                        <td><label>{{$skupniStroskiObiskov_vrstaObiska}}</label></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Stroški glede na zdravilo</h3>
        </div>
        <div class="panel-body">
            <table class="table ">
                <thead>
                    <tr>
                    <th><label>Zdravilo</label></th>
                    <th><label>Število doz zdravila</label></th>
                    <th><label>Skupni stroški v €</label></th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($zdravila as $zdravilo)
                        <tr>
                            <td><label>{{$zdravilo->ime}}</label></td>
                            <td><label>{{$zdravilo->st_obiskov}}</label></td>
                            <td><label>{{$zdravilo->stroski}}</label></td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Skupni stroški vseh zdravil</h3>
        </div>
        <div class="panel-body">
            <table class="table ">
                <thead>
                    <tr>
                    <th><label>Število doz zdravil</label></th>
                    <th><label>Skupni stroški v €</label></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label>{{$stVsehObiskov_zdravilo}}</label></td>
                        <td><label>{{$skupniStroskiObiskov_zdravilo}}</label></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
        <h3 class="panel-title">Skupni stroški</h3>
        </div>
        <div class="panel-body">
            <table class="table ">
                <thead>
                    <tr>
                    <th><label>Število obiskov</label></th>
                    <th><label>Skupna cena v €</label></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><label>{{$stVsehObiskov_vrstaObiska}}</label></td>
                        <td><label>{{$skupniStroski_vsi}}</label></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop