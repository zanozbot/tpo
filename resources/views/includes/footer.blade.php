<div class="container navbar navbar-fixed-bottom">
<!--<div style="text-align: center" class="navbar navbar-fixed-bottom navbar-default">© Copyright 2017 We Made This</div>-->
@if(Auth::check())
<footer>
<center>Datum zadnje prijave {{ Auth::user()->datum_prijave }} </center>
</footer>
@endif
</div>