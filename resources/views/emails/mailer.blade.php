<h3>Pozdravljeni {{ $uporabnik->ime }}!</h3>

<p>Z klikom na spodnjo povezavo aktivirate vaš uporabniški račun.</p>
<p><a href="{{ route('confirm-account', $uporabnik->aktivacija->token) }}" target="_blank">Aktivirajte račun.</a></p>
</b>
<p>Hvala, ker uporabljate našo Patronažno službo</p>