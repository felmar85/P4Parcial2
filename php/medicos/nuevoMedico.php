<!-- quick email widget -->
<div id="seccion-medico">
	<div class="box-header">
    	<i class="fa fa-building" aria-hidden="true">Gestión de medico</i>
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
    
                <form class="form-horizontal" role="form"  id="fmedico">


 					<div class="form-group">
                        <label class="control-label col-sm-2" for="id"></label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id" name="id" value = "" readonly="readonly"  
                            data-validation="length alphanumeric" data-validation-length="3-12">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese Nombre medico"
                            value = "">
                        </div>
                    </div>
					
					
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="documento">Documento:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="documento" name="documento" placeholder="Ingrese Nombre medico"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="especialidad">especialidad:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="especialidad" name="especialidad" placeholder="Ingrese Nombre medico"
                            value = "">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="correo">Correo:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="correo" name="correo" placeholder="Ingrese Nombre medico"
                            value = "">
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="estado">Estado:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="estado" name="estado">
                            <option value='1'>Activo</option>       
                            <option value='2'>Inactivo</option>    
							</select>	
                        </div>
                    </div>

					 <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" id="grabar" class="btn btn-primary" data-toggle="tooltip" title="Grabar medico">Grabar medico</button>
                            <button type="button" id="cerrar" class="btn btn-success btncerrar2" data-toggle="tooltip" title="Cancelar">Cancelar</button>
                        </div>
                    </div>

					<input type="hidden" id="nuevo" value="nuevo" name="accion"/>
			</fieldset>

		</form>
	</div>
</div>