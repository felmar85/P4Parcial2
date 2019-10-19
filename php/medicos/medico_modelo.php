<?php
require_once("../modeloAbstractoDB.php");
class Medico extends ModeloAbstractoDB
{
	private $id;
	private $nombre;
	private $documento;
	private $especialidad;
	private $correo;
	private $estado;

	function __construct()
	{
		//$this->db_name = '';
	}

	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set the value of pais_codi
	 *
	 * @return  self
	 */

	public function setId_paciente($id_paciente)
	{
		$this->id_paciente = $id_paciente;

		return $this;
	}

	/**
	 * Set the value of pais_codi
	 *
	 * @return  self
	 */


	public function getNombre()
	{
		return $this->nombre;
	}
/* 
	public function setNombre($nombre)
	{
		$this->nombre = $nombre;

		return $this;
	} */

	public function getDocumento()
	{
		return $this->documento;
	}
/* 
	public function setDocumento($documento)
	{
		$this->documento = $documento;

		return $this;
	} */

	public function getEspecialidad()
	{
		return $this->especialidad;
	}

/* 	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;

		return $this;
	}
 */

	public function getCorreo()
	{
		return $this->correo;
	}

/* 	public function setCorreo($correo)
	{
		$this->correo = $correo;

		return $this;
	} */

	public function getEstado()
	{
		return $this->estado;
	}

/* 	public function setEstado($estado)
	{
		$this->estado = $estado;

		return $this;
	} */

	public function consultar($id = '')
	{
		if ($id != '') :
			$this->query = "
				SELECT  id, nombre, documento, especialidad, correo, estado
				FROM medico
				WHERE id = '$id' 
				";
			$this->obtener_resultados_query();
		endif;
		//busca una comuna del cod y si la encuentra arma un objeto 
		if (count($this->rows) == 1) :
			foreach ($this->rows[0] as $propiedad => $valor) :
				$this->$propiedad = $valor;
			endforeach;
		endif;
		//pasa los atributos del objeto a los campos y su valor
	}

	public function lista()
	{
		$this->query = "
			SELECT id, nombre, documento, especialidad, correo, estado
			FROM medico ORDER BY nombre
			";

		$this->obtener_resultados_query();
		return $this->rows;
		//se retorna todos los registros que se hallan listado
	}

	public function listaMedicos()
	{
		$this->query = "
			SELECT id, nombre, documento, especialidad, correo, estado
			FROM medico ORDER BY nombre
			";
		$this->obtener_resultados_query();
		return $this->rows;
	}

	public function nuevo($datos = array())
	{
		if (array_key_exists('documentos', $datos)) : //llave primaria
			foreach ($datos as $campo => $valor) :
				$$campo = $valor;
			endforeach;
			$nombre = utf8_decode($nombre);
			$this->query = "
					INSERT INTO medico
					(nombre, documento, especialidad, correo, estado)
					VALUES
					('$nombre', '$documento', '$especialidad', '$correo', '$estado')
					";
			$resultado = $this->ejecutar_query_simple();
			return $resultado;
		endif;
		//inserta nuevo registro
	}

	public function editar($datos = array())
	{
		//mmodifica los datos
		foreach ($datos as $campo => $valor) :
			$$campo = $valor;
		endforeach;
		//los recibe un areglo
		$this->query = "
			UPDATE medico
			SET nombre='$nombre',
			documento='$documento',
			especialidad='$especialidad',
			correo='$correo',
			estado='$estado'
			WHERE id = '$id'
			";
		$resultado = $this->ejecutar_query_simple();
		return $resultado;
	}

	public function borrar($id = '')
	{
		$this->query = "
			DELETE FROM medico
			WHERE id = '$id'";
		$resultado = $this->ejecutar_query_simple();

		return $resultado;
	}

	function __destruct()
	{
		//unset($this);
	}
}
