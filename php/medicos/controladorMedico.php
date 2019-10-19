<?php
 
require_once 'medico_modelo.php';
$datos = $_GET;
switch ($_GET['accion']){
    case 'editar':
        $medico = new Medico();
        $resultado = $medico->editar($datos);
        $respuesta = array(
                'respuesta' => $resultado
            );
        echo json_encode($respuesta);
        break;
    case 'nuevo':
        $medico = new Medico();
		$resultado = $medico->nuevo($datos);
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
		$medico = new Medico();
		$resultado = $medico->borrar($datos['codigo']);
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
        $medico = new Medico();
        $medico->consultar($datos['id']);

        if($medico->getId() == null) {
            $respuesta = array(
                'respuesta' => 'no existe'
            );
        }  else {
            $respuesta = array(
                'codigo' => $medico->getId(),
                'nombre' => $medico->getNombre(),
                'documento' =>$medico->getDocumento(),
                'especialidad' =>$medico->getEspecialidad(),
                'correo' =>$medico->getCorreo(),
                'estado' =>$medico->getEstado(),
                'respuesta' =>'existe'
            );
        }
        echo json_encode($respuesta);
        break;

    case 'listar':
        $medico = new Medico();
        $listado = $medico->lista();
        echo json_encode(array('data'=>$listado), JSON_UNESCAPED_UNICODE);    
        break;
}
?>
