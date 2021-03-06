@extends('layouts.default')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-10 ">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Kreiranje delovnega naloga</h3>
        </div>
        @if (session('status'))
          <div class="alert alert-success">
            <strong>Uspeh!</strong> Delovni nalog je bil uspešno ustvarjen!
        </div>
        @endif
        @if ($errPacient != '')
            <div class="alert alert-danger">
              <ul>
                <li>{{ $errPacient }}</li>
              </ul>
            </div>
        @endif
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
          <form role="form" action="/nalog" method="post">
            {{ csrf_field() }}
            <!--  Zdravnik ali vodja PS lahko kreira delovni nalog. Zdravnik lahko kreira delovni nalog za vse vrste obiskov, vodja patronažne službe pa samo za preventivne obiske. Izmed preventivnih obiskov obravnavamo samo obisk nosečnice, obisk otročnice in novorojenčka ter preventivo starostnika. Izmed kurativnih obiskov obravnavamo aplikacijo injekcij, odvzem krvi in kontrolo zdravstvenega stanja. Pri obisku otročnice in novorojenčka je treba vnesti imena vseh pacientov (mame in otrok), tako da je na isti delovni nalog (v splošnem) lahko vezanih več pacientov. 
              Pri aplikaciji injekcij je treba iz šifranta zdravil izbrati še ustrezna zdravila, ki ga jih treba injicirati. Pri odvzemu krvi pa je potrebno določiti barvo (rdeča, modra, rumena, zelena) in število epruvet. Vsak delovni nalog se nanaša samo na eno vrsto obiskov. Za vsak delovni nalog je treba navesti datum prvega obiska, število obiskov in (časovni interval med dvema zaporednima obiskoma ali časovno obdobje, v katerem morajo biti ti obiski opravljeni). Pri datumu prvega obiska naj bo moč izbrati, ali je datum obvezen ali samo okviren. -->
            <div class="form-group">
              <label class="label label-primary">Naloge</label>
              <select class="selectpicker form-control input-sm" name="nalogeObiska">
                @foreach ($vrsteObiska as $vrstaObiska)
                  <option {{ (Request::old("nalogeObiska") == $vrstaObiska->ime ? "selected":"") }}>{{$vrstaObiska->ime}}</option>
                @endforeach
              </select>
            </div>
            <script type="text/javascript">
              $( document ).ready(function() {
                //$('div[name=vezaniPacienti]').hide();
              	$('div[name=epruvete]').hide();
              	$('div[name=zdravila]').hide();
              });
              $('select[name=nalogeObiska]').change(function(){
                  console.log($('select[name=nalogeObiska]').val());
              		switch($('select[name=nalogeObiska]').val()){
              			case 'Obisk nosečnice':
              				$('div[name=epruvete]').slideUp();
              				$('div[name=zdravila]').slideUp();
              				break;
              			case 'Obisk otročnice':
              				$('div[name=epruvete]').slideUp();
              				$('div[name=zdravila]').slideUp();
              				break;
              			case 'Aplikacija injekcij':
              				$('div[name=epruvete]').slideUp();
              				$('div[name=zdravila]').slideDown();
              				break;
              			case 'Odvzem krvi':
              				$('div[name=zdravila]').slideUp();
              				$('div[name=epruvete]').slideDown();
              				break;
              			default:
              				$('div[name=zdravila]').slideUp();
              				$('div[name=epruvete]').slideUp();
              				break;
              		}
              	});

                function setOption(){
                  $('select[name=nalogeObiska]').val($('select[name=nalogeObiska]').val()).trigger('change');
                }
                setTimeout(setOption, 500);              
            </script>
            <div class="form-group multiple-form-group" name="vezaniPacienti">
              <label class="label label-primary">Vezani pacienti</label>
              <div class="form-group input-group" name="vezaniPacientDiv">
                <select class="selectpicker form-control input-sm" name="vezaniPacient[0]" required>
                  <option disabled value>Izberi pacienta</option>
                  @foreach ($pacienti as $pacient)
                    <option value="{{$pacient->stevilka_KZZ}}" {{ (Request::old("vezaniPacient[0]") == $pacient->stevilka_KZZ ? "selected":"") }}>{{ $pacient->ime_pacienta . " " . $pacient->priimek_pacienta . " | " . $pacient->stevilka_KZZ }}</option>                  
                  @endforeach
                </select><span class="input-group-btn"><button type="button" class="btn btn-default btn-add dodajVezanegaPacienta">+
                </button></span>	
              </div>
              <script type="text/javascript">
                var dodajPoljeVezaniPacient = function(event){
                	event.preventDefault();
                  var $formGroup = $(this).closest('.form-group');
                  var $formGroupClone = $formGroup.clone();

            		  $i = $('div[name=vezaniPacientDiv').length;
            		  $formGroupClone.find('select').attr('name', 'vezaniPacient[' + $i + ']');
                  $formGroupClone.find('select').val('');

                  $formGroupClone.find('button').toggleClass('btn-default btn-add btn-danger odstraniVezanegaPacienta').html('–');

                  $formGroupClone.insertAfter($formGroup);

                  $('div[name=vezaniPacientDiv').each(function(j, obj){
                    $(this).find('input').attr('name', 'vezaniPacient[' + j + ']');
                  });
                }
                var odstraniPoljeVezaniPacient = function (event) {
                  event.preventDefault();
          
                  var $formGroup = $(this).closest('.form-group');
           			  var $multipleFormGroup = $formGroup.closest('.multiple-form-group');
          
                  var $lastFormGroupLast = $multipleFormGroup.find('.form-group:last');

                  $formGroup.remove();

                  $('div[name=vezaniPacientDiv').each(function(j, obj){
                    $(this).find('input').attr('name', 'vezaniPacient[' + j + ']');
                  });
                };
                $(document).on('click', '.odstraniVezanegaPacienta', odstraniPoljeVezaniPacient);
       					$(document).on('click', '.dodajVezanegaPacienta', dodajPoljeVezaniPacient);
              </script>							
            </div>
            <div class="form-group" name="bolezen">
              <label class="label label-primary">Ime bolezni</label>
              <select class="selectpicker form-control input-sm" name="imeBolezni">
              @foreach ($bolezni as $bolezen)
              	<option  {{ (Request::old("imeBolezni") == $bolezen->ime ? "selected":"") }}>{{ $bolezen->ime }}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group" name="zdravila">
              <label class="label label-primary">Ustrezna zdravila</label>
              <select class="selectpicker form-control input-sm" name="ustreznaZdravila[]" multiple>
              @foreach ($zdravila as $zdravilo)
              	<option>{{ $zdravilo->ime }}</option>
              @endforeach
              </select>
            </div>
            <div class="form-group" name="epruvete">
              <label class="label label-primary">Barva in število epruvet</label>
              <label class="label">Rde</label>
              <table class="table table-bordered">
                <thead>
                  <th><label>Barva<label></th>
                  <th><label>Število<label></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><label>Rdeča</label></td>
                    <td><input type="number" min="0" class="form-control input-sm" name="steviloRdeca" value="{{ Request::old('steviloRdeca') ?: 0 }}"></td>
                  </tr>
                  <tr>
                    <td><label>Modra</label></td>
                    <td><input type="number" min="0" class="form-control input-sm" name="steviloModra" value="{{ Request::old('steviloModra') ?: 0 }}"></td>
                  </tr>
                  <tr>
                    <td><label>Rumena</label></td>
                    <td><input type="number" min="0" class="form-control input-sm" name="steviloRumena" value="{{ Request::old('steviloRumena') ?: 0 }}"></td>
                  </tr>
                  <tr>
                    <td><label>Zelena</label></td>
                    <td><input type="number" min="0" class="form-control input-sm" name="steviloZelena" value="{{ Request::old('steviloZelena') ?: 0 }}"></td>
                  </tr>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="form-group">
              <label class="label label-primary">Datum prvega obiska</label>
              <div class="datepicker input-group date" data-provide="datepicker" data-date-format="dd.mm.yyyy">
                <input type="text" class="form-control" value="{{ Request::old('datumPrvegaObiska') }}" placeholder="dd.mm.llll" name="datumPrvegaObiska" required>
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="label label-primary">Število obiskov</label>
              <input type="number" class="form-control input-sm" value="{{ Request::old('steviloObiskov') }}" name="steviloObiskov" placeholder="Število obiskov" required>
            </div>
            <label class="label label-primary" name="intervalLabel">Časovni interval</label>
            <label class="label label-default" name="koncniDatumLabel">Končni datum</label>
            <div class="form-group" name="casovniIntervalDiv">
              <div class="input-group">
                <input type="number" class="form-control input-sm" value="{{ Request::old('casovniInterval') }}" name="casovniInterval" placeholder="Časovni interval med dvema zaporednima obiskoma">
                <span class="input-group-addon">dni</span>
              </div>
            </div>
            <script type="text/javascript">
              $(document).ready(function(){
              	$('div[name="koncniDatumDiv').hide();
              	$('label[name="intervalLabel"]').hover(function(){
              		$(this).css('cursor','pointer');
              	});
              	$('label[name="koncniDatumLabel"]').hover(function(){
              		$(this).css('cursor','pointer');
              	});
              });
              $('label[name="intervalLabel"]').click(function(){
              	$(this).removeClass();
              	$(this).addClass('label label-primary');
              	$('label[name="koncniDatumLabel"]').removeClass();
              	$('label[name="koncniDatumLabel"]').addClass('label label-default', true);
              	$('div[name="casovniIntervalDiv').show();
              	$('div[name="koncniDatumDiv').hide();
              });
              $('label[name="koncniDatumLabel"]').click(function(){
              	$(this).removeClass();
              	$(this).addClass('label label-primary');
              	$('label[name="intervalLabel"]').removeClass();
              	$('label[name="intervalLabel"]').addClass('label label-default', true);
              	$('div[name="casovniIntervalDiv').hide();
              	$('div[name="koncniDatumDiv').show();
              });
            </script>
            <div class="form-group" name="koncniDatumDiv">
              <div class="datepicker input-group date" data-provide="datepicker" data-date-format="dd.mm.yyyy">
                <input type="text" class="form-control" placeholder="dd.mm.llll" name="koncniDatum">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-th"></span>
                </div>
              </div>
              <script>
                $('.datepicker').datepicker({
                	format: "dd.mm.yyyy",
                	clearBtn: true,
                	autoclose: true,
                	todayHighlight: true
                });
              </script>
            </div>
            <div class="form-group">
              <label class="label label-primary">Datum je</label>
              <label class="radio-inline"><input type="radio" {{ (Request::old("obveznoDrzanjeDatuma") == 'Okviren' ? "checked":"") }} class="radio-inline" name="obveznoDrzanjeDatuma" value="Okviren" checked>Okviren</label>
              <label class="radio-inline"><input type="radio" {{ (Request::old("obveznoDrzanjeDatuma") == 'Obvezen' ? "checked":"") }} class="radio-inline" name="obveznoDrzanjeDatuma" value="Obvezen">Obvezen</label>
            </div>
            <input type="submit" value="Kreiraj nalog" class="btn btn-info btn-block">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop