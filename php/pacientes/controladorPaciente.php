<?php
 
require_once 'paciente_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $paciente = new Paciente();
        $resultado = $paciente->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $paciente = new Paciente();
		$resultado = $paciente->nuevo($datos);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;
    case 'borrar':
		$paciente = new Paciente();
		$resultado = $paciente->borrar($datos['codigo']);
        if($resultado > 0) {
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        }  else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'consultar':
        $paciente = new Paciente();
        $paciente->consultar($datos['codigo']);

        if($paciente->getId_paciente() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $paciente->getId_paciente(),
                'nombre' => $paciente->getNombre(),
                'documento' =>$paciente->getDocumento(),
                'telefono' =>$paciente->getTelefono(),
                'correo' =>$paciente->getCorreo(),
                'estado' =>$paciente->getEstado(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $paciente = new Paciente();
        $listado = $paciente->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
