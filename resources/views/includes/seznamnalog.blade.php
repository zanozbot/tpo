<div class="container">

	<div class="panel panel-default">			
	  <div class="panel-heading">
		<h3 class="panel-title">Seznam Nalogov</h3>
	  </div>
	  <div class="panel-body">
		  <table class="table ">
			<thead>
			  <tr>
				<th>Šifra naloga</th>
				<th>Datum</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>
			  <tr>
				<td>Value</td>
				<td>Value</td>
				<td >		
					<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#podrobnosti"><span class="glyphicon glyphicon-plus"></span></button>
					<div class="modal fade" id="podrobnosti" role="dialog">
						<div class="modal-dialog modal-lg">
						  <div class="modal-content">
							<div class="modal-header">
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
							<div class="container-fluid">
							  @include('includes.nalog')
							</div>
							</div>
						  </div>
						</div>
					</div>
				</td>
			  </tr>
			  <tr>
				<td>Value</td>
				<td>Value</td>
				<td>Value</td>
			  </tr>
			  <tr>
				<td>Value</td>
				<td>Value</td>
				<td>Value</td>
			  </tr>
			</tbody>
		  </table>
	</div>
	</div>
</div>

