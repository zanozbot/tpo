<div class="panel panel-default">			
  <div class="panel-heading">
	<h3 class="panel-title">Obisk</h3>
  </div>
  <div class="panel-body">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6">
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">1 - Zavarovana oseba</h3>
			  </div>
			  <div class="panel-body">
				  <div class="form-group">
					<label class="label label-primary">Številka zavarovane osebe</label>
					<div class="form-control nalog" name="stZavOsebe"><label>{{$mini->stevilka_KZZ}}</label></div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Datum rojstva</label>
					<div class="form-control nalog" name="rojstvoZavOsebe"><label id="dat_roj_{{$mini->sifra_obisk}}"></label></div>
				  </div>
				  <script>
				  	var prvotniDatum = "{{$mini->datum_rojstva}}";
				  	var arrStringov = prvotniDatum.split("-");
				  	var preurejeniDatum = arrStringov[2].concat(".".concat(arrStringov[1].concat(".".concat(arrStringov[0]))));
				  	$("#dat_roj_{{$mini->sifra_obisk}}").html(preurejeniDatum);
				  </script>
				  <div class="form-group">
					<label class="label label-primary">Priimek</label>
					<div class="form-control nalog" name="priimekZavOsebe"><label>{{$mini->priimek_pacienta}}</label></div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Ime</label>
					<div class="form-control nalog" name="imeZavOsebe"><label>{{$mini->ime_pacienta}}</label></div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Ulica in hišna številka</label>
					<div class="form-control nalog" name="ulicaZavOsebe"><label>{{$mini->naslov_pacienta}}</label></div>
				  </div>
				  <div class="row">
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Poštna številka</label>
						<div class="form-control nalog" name="postaZavOsebe"><label>{{$mini->posta_pacient}}</label></div>
					  </div>
					</div>
					<div class="col-lg-6">
					  <div class="form-group">
						<label class="label label-primary">Kraj</label>
						<div class="form-control nalog" name="krajZavOsebe"><label>{{$mini->kraj_poste}}</label></div>
					  </div>
					</div>
				  </div>	 
				  <div class="form-group">
					<label class="label label-primary">Email</label>
					<div class="form-control nalog" name="emailZavOsebe"><label>{{$mini->email}}</label></div>
				  </div>
				  <div class="form-group">
					<label class="label label-primary">Telefonska številka</label>
					<div class="form-control nalog" name="telZavOsebe"><label>{{$mini->tel_stevilka}}</label></div>
				  </div>			  
			  </div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-8 col-md-6">
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">2 - Storitev</h3>
			  </div>
			  <div class="panel-body">					  
				<div class="form-group">
				    <label class="label label-primary">Ime obiska</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->ime_vrsta_obiska}}</label></div>
				</div>
				<div class="form-group">
				    <label class="label label-primary">Datum obiska</label>
					<div class="form-control nalog" name="datumStoritve"><label id="dat_ob_{{$mini->sifra_obisk}}"></label></div>
					<script>
					  	var prvotniDatum = "{{$mini->predvideni_datum_obiska}}";
					  	var arrStringov = prvotniDatum.split("-");
					  	var preurejeniDatum = arrStringov[2].concat(".".concat(arrStringov[1].concat(".".concat(arrStringov[0]))));
					  	$("#dat_ob_{{$mini->sifra_obisk}}").html(preurejeniDatum);
					</script>
				</div>
				<div class="form-group" >
					<label class="label label-primary">Vrsta obiska</label>
					@if ($mini->preventivni == 1)
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled checked>Preventivni</label>
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>Kurativni</label>
					@else
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled>Preventivni</label>
						<label class="checkbox-inline"><input type="checkbox" name="vrstaZdravnik" disabled checked>Kurativni</label>
					@endif
				</div>
			  </div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">3 - Bolezen</h3>
			  </div>
			  <div class="panel-body">
			  	  <div class="form-group">
				    <label class="label label-primary">Šifra bolezni</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->sifra_bolezni}}</label></div>
				  </div>				  
				  <div class="form-group">
				    <label class="label label-primary">Ime bolezni</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->ime_bolezni}}</label></div>
				  </div>
				</div>
			</div>
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">4 - Zadolžena patronažna sestra</h3>
			  </div>
			  <div class="panel-body">
			  	  <div class="form-group">
				    <label class="label label-primary">Šifra sestre</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->sestra[0]->sifra_ps}}</label></div>
				  </div>
				  <div class="form-group">
				    <label class="label label-primary">Ime sestre</label>
					<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->sestra[0]->ime}} {{$mini->sestra[0]->priimek}}</label></div>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-0">
			<div class="panel panel-default">			
			  <div class="panel-heading">
				<h3 class="panel-title">5 - Izvedene aktivnosti</h3>
			  </div>
				@if ($mini->ime_vrsta_obiska == 'Obisk nosečnice')
					<div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						  <div class="panel-body">
						  	<div class="form-group">
							    <label class="label label-primary">Seznanitev nosečnice o normalnem poteku nosečnosti in o spremembah na telesu.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[0]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Povabilo v šolo za starše.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[1]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Seznanitev o rednih ginekoloških pregledih.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[2]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Seznanitev z bližajočim se porodom in pravočasnim odhodom v porodnišnico.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[3]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Pogovor in vključevanje partnerja v nosečnost in porod ter po prihodu domov.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[4]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Svetovanje o pripomočkih, ki jih bo potrebovala v porodnišnici.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[5]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Seznanitev nosečnice o štetju in beleženju plodovih gibov.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[6]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Svetovanje glede opreme za novorojenca in primerno ležišče.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[7]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Svetovanje o pravilni prehrani, ustrezni izbiri obleke in obutve.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[8]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Svetovanje o primernem režim življenja, telesne vaje, gibanje na svežem zraku.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[9]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Odsvetovanje razvad kot so uživanje alkohola, kajenje, uživanje zdravil in drog.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[10]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Seznanitev nosočnice z nevšečnostmi in svetovanje glede lajšanja težav zaradi nevšečnosti (slabosti, bruhanja, zaprtja, pogostih mikcij, nespečnosti, zgage, ...).</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[11]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Seznanitev nosečnice s pravicami do starševskega dopusta (porodniški dopust, pravica do dopusta za nego in varstvo otroka, pravica do očetovskega dopusta) in o uveljavljanju pravic povezanih </label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[12]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Pričakovan datum poroda.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[13]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Anamneza: počutje, telesni znaki nosečnosti.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[14]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Družinska anamneza: Odnosi v družini, odnos družine do okolja, bivalni pogoji, ekonomske razmere, zdravstveno stanje družinskih članov, zdravstvena prosvetljenost in vzgojenost.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[15]->opis}}</label></div>
							</div>
							@if ($mini->porocilo[16]->aid == 17 && $mini->porocilo[17]->aid != 18)
								<div class="form-group">
								    <label class="label label-primary">Izražanje čustev.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label id="cus_{{$mini->sifra_obisk}}"></label></div>
								</div>
								<script>
									var stEp = "{{$mini->porocilo[16]->opis}}";
					  				var arrStringovCu = stEp.split("&quot;");
					  				var msg = "Je moteno."
					  				if (arrStringovCu[3] == "niMoteno"){
					  					msg = "Ni moteno."
					  				}
					  				$("#cus_{{$mini->sifra_obisk}}").html(msg+" Opis: "+arrStringovCu[7]);
								</script>
								<div class="form-group">
								    <label class="label label-primary">Fizična obremenjenost.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label></label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Krvni pritisk: sistolični, diastolični.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label id="kri_{{$mini->sifra_obisk}}"></label></div>
								</div>
								<script>
									var stEp = "{{$mini->porocilo[17]->opis}}";
					  				var arrStringovKr = stEp.split("&quot;");
					  				var sis = "";
					  				var dia = "";
					  				if(arrStringovKr[3] != "dia"){
					  					sis = "Sistolični "+arrStringovKr[3];
					  				}
					  				if(arrStringovKr[7] != undefined){
					  					dia = "Diastolični "+arrStringovKr[7];
					  				}
					  				$("#kri_{{$mini->sifra_obisk}}").html(sis+". "+dia);
								</script>
								<div class="form-group">
								    <label class="label label-primary">Srčni utrip.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[18]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Dihanje.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[19]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Telesna temperatura.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[20]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Telesna teža pred nosečnostjo.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[21]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Trenutna telesna teža.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[22]->opis}}</label></div>
								</div>
							@elseif ($mini->porocilo[16]->aid == 18)
								<div class="form-group">
								    <label class="label label-primary">Izražanje čustev.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label></label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Fizična obremenjenost.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label id="fiz_{{$mini->sifra_obisk}}"></label></div>
								</div>
								<script>
									var stEp = "{{$mini->porocilo[16]->opis}}";
					  				var arrStringovCu = stEp.split("&quot;");
					  				var msg = "Nizka obremenjenost."
					  				if (arrStringovCu[3] == "srednja"){
					  					msg = "Srednja obremenjenost."
					  				} else if (arrStringovCu[3] == "visoka"){
					  					msg = "Visoka obremenjenost."
					  				}
					  				$("#fiz_{{$mini->sifra_obisk}}").html(msg+" Opis: "+arrStringovCu[7]);
								</script>
								<div class="form-group">
								    <label class="label label-primary">Krvni pritisk: sistolični, diastolični.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label id="kri_{{$mini->sifra_obisk}}"></label></div>
								</div>
								<script>
									var stEp = "{{$mini->porocilo[17]->opis}}";
					  				var arrStringovKr = stEp.split("&quot;");
					  				var sis = "";
					  				var dia = "";
					  				if(arrStringovKr[3] != "dia"){
					  					sis = "Sistolični "+arrStringovKr[3];
					  				}
					  				if(arrStringovKr[7] != undefined){
					  					dia = "Diastolični "+arrStringovKr[7];
					  				}
					  				$("#kri_{{$mini->sifra_obisk}}").html(sis+". "+dia);
								</script>
								<div class="form-group">
								    <label class="label label-primary">Srčni utrip.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[18]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Dihanje.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[19]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Telesna temperatura.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[20]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Telesna teža pred nosečnostjo.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[21]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Trenutna telesna teža.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[22]->opis}}</label></div>
								</div>
							@elseif ($mini->porocilo[16]->aid == 17 && $mini->porocilo[17]->aid == 18)
								<div class="form-group">
								    <label class="label label-primary">Izražanje čustev.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label id="cus_{{$mini->sifra_obisk}}"></label></div>
								</div>
								<script>
									var stEp = "{{$mini->porocilo[16]->opis}}";
					  				var arrStringovCu = stEp.split("&quot;");
					  				var msg = "Je moteno."
					  				if (arrStringovCu[3] == "niMoteno"){
					  					msg = "Ni moteno."
					  				}
					  				$("#cus_{{$mini->sifra_obisk}}").html(msg+" Opis: "+arrStringovCu[7]);
								</script>
								<div class="form-group">
								    <label class="label label-primary">Fizična obremenjenost.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label id="fiz_{{$mini->sifra_obisk}}"></label></div>
								</div>
								<script>
									var stEp = "{{$mini->porocilo[17]->opis}}";
					  				var arrStringovCu = stEp.split("&quot;");
					  				var msg = "Nizka obremenjenost."
					  				if (arrStringovCu[3] == "srednja"){
					  					msg = "Srednja obremenjenost."
					  				} else if (arrStringovCu[3] == "visoka"){
					  					msg = "Visoka obremenjenost."
					  				}
					  				$("#fiz_{{$mini->sifra_obisk}}").html(msg+" Opis: "+arrStringovCu[7]);
								</script>
								<div class="form-group">
								    <label class="label label-primary">Krvni pritisk: sistolični, diastolični.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label id="kri_{{$mini->sifra_obisk}}"></label></div>
								</div>
								<script>
									var stEp = "{{$mini->porocilo[18]->opis}}";
					  				var arrStringovKr = stEp.split("&quot;");
					  				var sis = "";
					  				var dia = "";
					  				if(arrStringovKr[3] != "dia"){
					  					sis = "Sistolični "+arrStringovKr[3];
					  				}
					  				if(arrStringovKr[7] != undefined){
					  					dia = "Diastolični "+arrStringovKr[7];
					  				}
					  				$("#kri_{{$mini->sifra_obisk}}").html(sis+". "+dia);
								</script>
								<div class="form-group">
								    <label class="label label-primary">Srčni utrip.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[19]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Dihanje.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[20]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Telesna temperatura.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[21]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Telesna teža pred nosečnostjo.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[22]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Trenutna telesna teža.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[23]->opis}}</label></div>
								</div>
							@else
								<div class="form-group">
								    <label class="label label-primary">Izražanje čustev.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label></label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Fizična obremenjenost.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label></label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Krvni pritisk: sistolični, diastolični.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label id="kri_{{$mini->sifra_obisk}}"></label></div>
								</div>
								<script>
									var stEp = "{{$mini->porocilo[16]->opis}}";
					  				var arrStringovKr = stEp.split("&quot;");
					  				var sis = "";
					  				var dia = "";
					  				if(arrStringovKr[3] != "dia"){
					  					sis = "Sistolični "+arrStringovKr[3]+". ";
					  				}
					  				if(arrStringovKr[7] != undefined){
					  					dia = "Diastolični "+arrStringovKr[7];
					  				}
					  				$("#kri_{{$mini->sifra_obisk}}").html(sis+dia);
								</script>
								<div class="form-group">
								    <label class="label label-primary">Srčni utrip.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[17]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Dihanje.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[18]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Telesna temperatura.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[19]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Telesna teža pred nosečnostjo.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[20]->opis}}</label></div>
								</div>
								<div class="form-group">
								    <label class="label label-primary">Trenutna telesna teža.</label>
									<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[21]->opis}}</label></div>
								</div>
							@endif
						  </div>
					  </div>
					</div>
				  </div>
				@elseif ($mini->ime_vrsta_obiska == 'Obisk otročnice')
				  <div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						  <div class="panel-body">
						  	<div class="form-group">
							    <label class="label label-primary">Pregled materinske knjižice in odpustnice iz porodnišnice.</label>
							    @php
							    	$json = $mini->porocilo[0]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($obj->{'datum'} !== null) {
										$msg = $msg."Datum rojstva otroka: ".$obj->{'datum'}.". ";
									}
									if ($obj->{'teza'} !== null) {
										$msg = $msg."Porodna teža otroka: ".$obj->{'teza'}." g. ";
									}
									if ($obj->{'visina'} !== null) {
										$msg = $msg."Porodna višina otroka: ".$obj->{'visina'}." cm. ";
									}
									if ($obj->{'opis'} !== null) {
										$msg = $msg."Opis: ".$obj->{'opis'}.". ";
									}
									echo "<div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div>";
								@endphp
							</div>
							<div class="form-group">
							    <label class="label label-primary">Kontrola vitalnih funkcij.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[1]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Opazovanje čišče.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[2]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Nadzor nad izločanjem blata in urina.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[3]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Zdravstveno vzgojno delo glede pravilnega rokovanja z novorojenčkom, učenje tehnike nege novorojenčka.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[4]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Motivacija za dojenje. Nadzor in pomoč pri dojenju.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[5]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Svetovanje o čustveni podpori s strani partnerja.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[6]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Seznanitev o otrokovih potrebah po toplini, nežnosti in varnosti.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[7]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Svetovanje o spalnih potrebah otročnice, pravilni negi in higienskem režimu v poporodnem obdobju.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[8]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Svetovanje o pravilni prehrani, pitju ustreznih količin tekočin.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[9]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Poučitev o poporodni telovadbi.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[10]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Sezananitev z nekaterimi obolenji.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[11]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Napotitev na poporodni pregled.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[12]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Seznanitev z metodami zaščite pred nezaželjno nosečnostjo.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[13]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Svetovanje o normalnem delu, življenju in spolnih odnosih.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[14]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Krvni pritisk.</label>
								@php
							    	$json = $mini->porocilo[15]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($obj->{'sis'} !== null) {
										$msg = $msg."Sistolični: ".$obj->{'sis'}.". ";
									}
									if ($obj->{'dia'} !== null) {
										$msg = $msg."Diastolični: ".$obj->{'dia'}.". ";
									}
									echo "<div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>$msg</label></div>";
								@endphp
							</div>
							<div class="form-group">
							    <label class="label label-primary">Srčni utrip.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[16]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Dihanje.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[17]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Telesna temperatura.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[18]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Trenutna telesna teža.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[19]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Anamneza: počutje, telesni znaki nosečnosti.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[20]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Družinska anamneza: odnosi v družini, odnos družine do okolja, bivalni pogoji, ekonomske razmere, zdravstveno stanje družinskih članov, zdravstvena prosvetljenost in vzgojenost.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[21]->opis}}</label></div>
							</div>
								@php
									$i = 22;
									$json = $mini->porocilo[$i]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($mini->porocilo[$i]->aid == 47){
										if ($obj->{'mot'} === "moteno") {
											$msg = $msg."Je moteno. ";
										} else if ($obj->{'mot'} === "niMoteno"){
											$msg = $msg."Ni moteno. ";
										}
										if ($obj->{'opis'} !== null) {
											$msg = $msg."Opis: ".$obj->{'opis'}.". ";
										}
										$i = $i + 1;
									}
									echo "<div class=\"form-group\"><label class=\"label label-primary\">Izražanje čustev.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div></div>";

									$json = $mini->porocilo[$i]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($mini->porocilo[$i]->aid == 48){
										if ($obj->{'fizicna'} === "nizka") {
											$msg = $msg."Nizka obremenjenost. ";
										} else if ($obj->{'fizicna'} === "srednja"){
											$msg = $msg."Srednja obremenjenost. ";
										} else  if ($obj->{'fizicna'} === "visoka"){
											$msg = $msg."Visoka obremenjenost. ";
										}
										if ($obj->{'opis'} !== null) {
											$msg = $msg."Opis: ".$obj->{'opis'}.". ";
										}
										$i = $i + 1;
									}
									echo "<div class=\"form-group\"><label class=\"label label-primary\">Fizična obremenjenost.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div></div>";

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Prikaz nege dojenčka.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Nega popokovne rane.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Nudenje pomoči pri dojenju in seznanitev s tehnikami dojenja.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Ureditev ležišča.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Svetovanje o povijanju, oblačenju, slačenju.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Trenutna telesna teža.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Trenutna telesna višina.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									$json = $mini->porocilo[$i]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($mini->porocilo[$i]->aid == 56){
										if ($obj->{'dane'} === "ne") {
											$msg = $msg."Ne. ";
										} else if ($obj->{'dane'} === "da"){
											$msg = $msg."Da. ";
										}
										if ($obj->{'opis'} !== null) {
											$msg = $msg."Opis: ".$obj->{'opis'}.". ";
										}
										$i = $i + 1;
									}
									echo "<div class=\"form-group\"><label class=\"label label-primary\">Dojenje.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div></div>";
									
									$json = $mini->porocilo[$i]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($mini->porocilo[$i]->aid == 57){
										if ($obj->{'dane'} === "ne") {
											$msg = $msg."Ne. ";
										} else if ($obj->{'dane'} === "da"){
											$msg = $msg."Da. ";
										}
										if ($obj->{'opis'} !== null) {
											$msg = $msg."Opis: ".$obj->{'opis'}.". ";
										}
										$i = $i + 1;
									}
									echo "<div class=\"form-group\"><label class=\"label label-primary\">Dodajanje adaptiranega mleka.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div></div>";

									$json = $mini->porocilo[$i]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($mini->porocilo[$i]->aid == 58){
										if ($obj->{'defekacija'} === "ni") {
											$msg = $msg."Ni posebnosti. ";
										} else if ($obj->{'defekacija'} === "mikcija"){
											$msg = $msg."Mikcija. ";
										} else if ($obj->{'defekacija'} === "defekacija"){
											$msg = $msg."Defekacija. ";
										} else if ($obj->{'defekacija'} === "kolike"){
											$msg = $msg."Kolike. ";
										} else if ($obj->{'defekacija'} === "polivanje"){
											$msg = $msg."Polivanje. ";
										} else if ($obj->{'defekacija'} === "bruhanje"){
											$msg = $msg."Bruhanje. ";
										}
										if ($obj->{'opis'} !== null) {
											$msg = $msg."Opis: ".$obj->{'opis'}.". ";
										}
										$i = $i + 1;
									}
									echo "<div class=\"form-group\"><label class=\"label label-primary\">Izločanje in odvajanje.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div></div>";

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Ritem spanja.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Povišanje bilirubina (zlatenica).</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Kolki.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Posebnosti.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

								@endphp
						  </div>
					  </div>
					</div>
				  </div>
				  <div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						  <div class="panel-heading">
							<h3 class="panel-title">Otroci</h3>
						  </div>
						  <div class="panel-body">
							  <table class="table table-bordered">
								<thead>
								  <tr>
									<th>Številka KZZ</th>
									<th>Ime</th>
									<th>Datum rojstva</th>
								  </tr>
								</thead>
								<tbody>
								  @foreach ($mini->otroci as $otrok)
								  <tr>
									<td><label>{{$otrok->stevilka_KZZ}}</label></td>
									<td><label>{{$otrok->ime}} {{$otrok->priimek}}</label></td>
									<td><label id="dat_roj_ot_{{$mini->sifra_dn}}_{{$otrok->stevilka_KZZ}}"></label></td>
									<script>
									  	var prvotniDatumOt = "{{$otrok->datum_rojstva}}";
									  	var arrStringovOt = prvotniDatumOt.split("-");
									  	var preurejeniDatumOt = arrStringovOt[2].concat(".".concat(arrStringovOt[1].concat(".".concat(arrStringovOt[0]))));
									  	$("#dat_roj_ot_{{$mini->sifra_dn}}_{{$otrok->stevilka_KZZ}}").html(preurejeniDatumOt);
									</script>
								  </tr>
								  @endforeach
								</tbody>
							  </table>
						  </div>
					  </div>
				    </div>
				  </div>
				@elseif ($mini->ime_vrsta_obiska == 'Preventiva starostnika')
					<div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						  <div class="panel-body">
							<div class="form-group">
							    <label class="label label-primary">Anamneza.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[0]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Družinska anamneza.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[1]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Krvni pritisk.</label>
								@php
							    	$json = $mini->porocilo[2]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($obj->{'sis'} !== null) {
										$msg = $msg."Sistolični: ".$obj->{'sis'}.". ";
									}
									if ($obj->{'dia'} !== null) {
										$msg = $msg."Diastolični: ".$obj->{'dia'}.". ";
									}
									echo "<div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>$msg</label></div>";
								@endphp
							</div>
							<div class="form-group">
							    <label class="label label-primary">Srčni utrip.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[3]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Dihanje.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[4]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Telesna temperatura.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[5]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Telesna teža.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[6]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Osebna higiena.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[7]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Prehranjevanje in pitje.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[8]->opis}}</label></div>
							</div>
								@php
									$i = 9;
									$json = $mini->porocilo[$i]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($obj->{'urin'} !== null) {
										$msg = $msg."Opis urina: ".$obj->{'urin'}.". ";
									}
									if ($obj->{'blato'} !== null){
										$msg = $msg."Opis blata: ".$obj->{'blato'}.". ";
									}
									
									echo "<div class=\"form-group\"><label class=\"label label-primary\">Izločanje in odvajanje.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Gibanje.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									$json = $mini->porocilo[$i]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($obj->{'vid'} !== null) {
										$msg = $msg."Opis vida: ".$obj->{'vid'}.". ";
									}
									if ($obj->{'vonj'} !== null){
										$msg = $msg."Opis vonja: ".$obj->{'vonj'}.". ";
									}
									if ($obj->{'sluh'} !== null) {
										$msg = $msg."Opis sluha: ".$obj->{'sluh'}.". ";
									}
									if ($obj->{'okus'} !== null){
										$msg = $msg."Opis okusa: ".$obj->{'okus'}.". ";
									}
									if ($obj->{'otip'} !== null){
										$msg = $msg."Opis otipa: ".$obj->{'otip'}.". ";
									}
									if ($obj->{'opis'} !== null){
										$msg = $msg."Opis: ".$obj->{'opis'}.". ";
									}
									
									echo "<div class=\"form-group\"><label class=\"label label-primary\">Čutila in občutki.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Spanje in počitek.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Duševno stanje: izražanje čustev in potreb, komunikacija.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									$json = $mini->porocilo[$i]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($mini->porocilo[$i]->aid == 77){
										if ($obj->{'odvisnost'} === "samostojen") {
											$msg = $msg."Samostojen. ";
										} else if ($obj->{'odvisnost'} === "delnoOdvisen"){
											$msg = $msg."Delno odvisen. ";
										} else if ($obj->{'odvisnost'} === "povsemOdvisen"){
											$msg = $msg."Povsem odvisen. ";
										} else if ($obj->{'odvisnost'} === "pomocSvojcev"){
											$msg = $msg."Pomoč svojcev. ";
										} else if ($obj->{'odvisnost'} === "pomocDrugih"){
											$msg = $msg."Pomoc drugih. ";
										}
										if ($obj->{'opis'} !== null) {
											$msg = $msg."Opis: ".$obj->{'opis'}.". ";
										}
										$i = $i + 1;
									}
									echo "<div class=\"form-group\"><label class=\"label label-primary\">Stanje neodvisnosti.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div></div>";

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Pregled predpisanih terapij.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Pogovor, nasvet in vzpodbuda.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

								@endphp
						  </div>
					  </div>
					</div>
				  </div>
				@elseif ($mini->ime_vrsta_obiska == 'Aplikacija injekcij')
					<div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						  <div class="panel-body">
						  	<div class="form-group">
							    <label class="label label-primary">Aplikacija injekcije.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[0]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Pogovor, nasvet in vzpodbuda.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[1]->opis}}</label></div>
							</div>
						  </div>
					  </div>
					</div>
				  </div>
				  <div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						  <div class="panel-heading">
							<h3 class="panel-title">Zdravila</h3>
						  </div>
						  <div class="panel-body">
							  <table class="table table-bordered">
								<thead>
								  <tr>
									<th>Šifra zdravila</th>
									<th>Ime zdravila</th>
									<th>Opis zdravila</th>
								  </tr>
								</thead>
								<tbody>
								@foreach ($mini->zdravila as $zdravilo)
								  <tr>
									<td><label>{{$zdravilo->sifra_zdravila}}</label></td>
									<td><label>{{$zdravilo->ime_zdravila}}</label></td>
									<td><label>{{$zdravilo->opis_zdravila}}</label></td>
								  </tr>
								@endforeach
								</tbody>
							  </table>
						  </div>
					  </div>
				    </div>
				  </div>
				</div>
				@elseif ($mini->ime_vrsta_obiska == 'Odvzem krvi')
				  <div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						  <div class="panel-body">
						  <label class="label label-primary">Epruvete</label>
							  <table class="table table-bordered">
								<thead>
								  <tr>
									<th>Barva</th>
									<th>Število</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td><label>Rdeča</label></td>
									<td><label id="rdeca_{{$mini->sifra_obisk}}"></label></td>
								  </tr>
								  <tr>
									<td><label>Modra</label></td>
									<td><label id="modra_{{$mini->sifra_obisk}}"></label></td>
								  </tr>
								  <tr>
									<td><label>Rumena</label></td>
									<td><label id="rumena_{{$mini->sifra_obisk}}"></label></td>
								  </tr>
								  <tr>
									<td><label>Zelena</label></td>
									<td><label id="zelena_{{$mini->sifra_obisk}}"></label></td>
								  </tr>
								</tbody>
							  </table>
							  <script>
								var stEp = "{{$mini->porocilo[0]->opis}}";
				  				var arrStringovEp = stEp.split("&quot;");
				  				$("#rdeca_{{$mini->sifra_obisk}}").html(arrStringovEp[3]);
				  				$("#modra_{{$mini->sifra_obisk}}").html(arrStringovEp[7]);
				  				$("#rumena_{{$mini->sifra_obisk}}").html(arrStringovEp[11]);
				  				$("#zelena_{{$mini->sifra_obisk}}").html(arrStringovEp[15]);
							  </script>
							  <div class="form-group">
							    <label class="label label-primary">Pogovor, nasvet in vzpodbuda.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[1]->opis}}</label></div>
							  </div>
						  </div>
					  </div>
					</div>
				  </div>
				@elseif ($mini->ime_vrsta_obiska == 'Kontrola zdravstvenega stanja')
				  <div class="panel-body">					  
					  <div class="form-group">
						<div class="form-control nalog" name="vrstaStoritve">
						  <div class="panel-body">
							<div class="form-group">
							    <label class="label label-primary">Anamneza.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[0]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Krvni pritisk: sistolični, diastolični.</label>
								@php
							    	$json = $mini->porocilo[1]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($obj->{'sis'} !== null) {
										$msg = $msg."Sistolični: ".$obj->{'sis'}.". ";
									}
									if ($obj->{'dia'} !== null) {
										$msg = $msg."Diastolični: ".$obj->{'dia'}.". ";
									}
									echo "<div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>$msg</label></div>";
								@endphp
							</div>
							<div class="form-group">
							    <label class="label label-primary">Srčni utrip.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[2]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Dihanje.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[3]->opis}}</label></div>
							</div>
							<div class="form-group">
							    <label class="label label-primary">Telesna temperatura.</label>
								<div class="form-control nalog" name="vrstaStoritve"><label>{{$mini->porocilo[4]->opis}}</label></div>
							</div>

								@php
									$i = 5;
									$json = $mini->porocilo[$i]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($obj->{'num'} !== null) {
										$msg = $msg.$obj->{'num'}." mmol/L. ";
									}
									if ($obj->{'opis'} !== null){
										$msg = $msg."Opis: ".$obj->{'opis'}.". ";
									}
									
									echo "<div class=\"form-group\"><label class=\"label label-primary\">Krvni sladkor.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Oksigenacija SpO2.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									$json = $mini->porocilo[$i]->opis;
									$obj = json_decode($json);
									$msg = "";
									if ($mini->porocilo[$i]->aid == 91){
										if ($obj->{'terapija'} === "ne") {
											$msg = $msg."Ne. ";
										} else if ($obj->{'terapija'} === "da"){
											$msg = $msg."Da. ";
										} else if ($obj->{'terapija'} === "delno"){
											$msg = $msg."Delno. ";
										}
										if ($obj->{'opis'} !== null) {
											$msg = $msg."Opis: ".$obj->{'opis'}.". ";
										}
										$i = $i + 1;
									}
									echo "<div class=\"form-group\"><label class=\"label label-primary\">Upoštevanje terapije.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$msg."</label></div></div>";

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Pregled terapije.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Navodila za terapijo do naslednjega obiska.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

									echo "<div class=\"form-group\"><label class=\"label label-primary\">Pogovor, nasvet in vzpodbuda.</label><div class=\"form-control nalog\" name=\"vrstaStoritve\"><label>".$mini->porocilo[$i]->opis."</label></div></div>";
									$i = $i + 1;

								@endphp
						  </div>
					  </div>
					</div>
				  </div>
				@endif
			</div>
		</div>
  </div>
</div>


