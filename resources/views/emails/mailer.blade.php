<h3>Pozdravljen/a {{ $uporabnik->ime }}!</h3>

<p>Z klikom na spodnjo povezavo aktiviraš svoj uporabniški račun.</p>
<p>{{ route('confirm-account', $uporabnik->aktivacija->token) }}<p>