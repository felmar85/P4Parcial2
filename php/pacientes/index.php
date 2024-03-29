<div id="nuevo-editar" class="hide">
	<!-- div para cargar el formulario para una nueva paciente o editar una paciente -->
</div>

<div id="paciente">
	<div class="box-header">
		<i class="ion ion-clipboard"></i>
		<!-- tools box -->
		<div class="pull-right box-tools">
			<button class="btn btn-info btn-sm" id="nuevo" data-toggle="tooltip" title="Nueva paciente"><i class="fa fa-plus" aria-hidden="true"></i></button>
			<button class="btn btn-info btn-sm btncerrar" data-toggle="tooltip" title="Ocultar"><i class="fa fa-times"></i></button>

		</div><!-- /. tools -->

	</div><!-- /.box-header -->

	<div class="box-body">

		<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>id_paciente</th>
					<th>nombre</th>
					<th>documento</th>
					<th>telefono</th>
					<th>correo</th>
					<th>estado</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>

			</tbody>

		</table>

	</div><!-- /.box-body -->
	<script src="js/funcionesPaciente.js"></script>
</div>