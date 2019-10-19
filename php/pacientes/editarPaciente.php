   <div id="seccion-paciente">
    <div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestion de Pacientes</i>
        
        <!-- tools box -->
        <div class="pull-right box-tools">
        	<button class="btn btn-info btn-sm btncerrar2" data-toggle="tooltip" title="Cerrar"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
    </div>
    <div class="box-body">

		<div align ="center">
				<div id="actual"> 
				</div>
		</div>

        <div class="panel-group"><div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">
    
                <form class="form-horizontal" role="form"  id="fpaciente">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id_paciente">Codigo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_paciente" name="id_paciente" placeholder="Ingrese Codigo"
                            value = "" readonly="true">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre paciente"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="documento">documento:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="documento" name="documento" placeholder="Ingrese documento paciente"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="telefono">telefono:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese telefono paciente"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="correo">correo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese correo paciente"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="estado">estado:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="Ingrese estado paciente"
                            value = "">
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="actualizar" data-toggle="tooltip" title="Actualizar paciente" class="btn btn-primary">Actualizar</button>
                            <button type="button" id="cancelar" data-toggle="tooltip" title="Cancelar Edición" class="btn btn-success btncerrar2"> Cancelar </button>
                        </div>

                    </div>                    

					<input type="hidden" id="editar" value="editar" name="accion"/>
			</fieldset>

		</form>
	</div>
    <input type="hidden" id="pagina" value="editar" name="editar"/>
</div>