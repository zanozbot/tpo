@extends('layouts.default')
@section('content')
<div class="container">

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
                    <th class="text-center"><label>Strošek za 1</label></th>
                    <th class="text-center"><label>Število obiskov</label></th>
                    <th class="text-center"><label>Skupni stroški</label></th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($vrsteObiskov as $vrstaObiska)
                        @if ($vrstaObiska->st_obiskov !== 0)
                        <tr>
                            <td><label>{{$vrstaObiska->ime}}</label></td>
                            <td class="text-center"><label>{{$vrstaObiska->cena}} €</label></td>
                            <td class="text-center"><label>{{$vrstaObiska->st_obiskov}}</label></td>
                            <td class="text-center"><label>{{$vrstaObiska->stroski}} €</label></td>
                        </tr>
                        @endif
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
                    <th class="text-center"><label>Število obiskov</label></th>
                    <th class="text-center"><label>Skupni stroški</label></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><label>{{$stVsehObiskov_vrstaObiska}}</label></td>
                        <td class="text-center"><label>{{$skupniStroskiObiskov_vrstaObiska}} €</label></td>
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
                    <th class="text-center"><label>Strošek za 1</label></th>
                    <th class="text-center"><label>Število doz zdravila</label></th>
                    <th class="text-center"><label>Skupni stroški</label></th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($zdravila as $zdravilo)
                        @if ($zdravilo->st_obiskov !== 0)
                        <tr>
                            <td><label>{{$zdravilo->ime}}</label></td>
                            <td class="text-center"><label>{{$zdravilo->cena}} €</label></td>
                            <td class="text-center"><label>{{$zdravilo->st_obiskov}}</label></td>
                            <td class="text-center"><label>{{$zdravilo->stroski}} €</label></td>
                        </tr>
                        @endif
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
                    <th class="text-center"><label>Število doz zdravil</label></th>
                    <th class="text-center"><label>Skupni stroški</label></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><label>{{$stVsehObiskov_zdravilo}}</label></td>
                        <td class="text-center"><label>{{$skupniStroskiObiskov_zdravilo}} €</label></td>
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
                    <th class="text-center"><label>Število obiskov</label></th>
                    <th class="text-center"><label>Število doz zdravil</label></th>
                    <th class="text-center"><label>Skupna cena</label></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><label>{{$stVsehObiskov_vrstaObiska}}</label></td>
                        <td class="text-center"><label>{{$stVsehObiskov_zdravilo}}</label></td>
                        <td class="text-center"><label>{{$skupniStroski_vsi}} €</label></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop