<?php
require_once("../modeloAbstractoDB.php");
class Paciente extends ModeloAbstractoDB
{
	private $id_paciente;
	private $nombre;
	private $documento;
	private $telefono;
	private $correo;
	private $estado;

	function __construct()
	{
		//$this->db_name = '';
	}

	public function getId_paciente()
	{
		return $this->id_paciente;
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

	public function getTelefono()
	{
		return $this->telefono;
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

	public function consultar($id_paciente = '')
	{
		if ($id_paciente != '') :
			$this->query = "
				SELECT id_paciente, nombre, documento, telefono, correo, estado
				FROM paciente
				WHERE id_paciente = '$id_paciente' 
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
			SELECT id_paciente, nombre, documento, telefono, correo, estado
			FROM paciente ORDER BY nombre
			";

		$this->obtener_resultados_query();
		return $this->rows;
		//se retorna todos los registros que se hallan listado
	}

	public function listaPaciente()
	{
		$this->query = "
			SELECT id_paciente, nombre, documento, telefono, correo, estado
			FROM paciente ORDER BY nombre
			";
		$this->obtener_resultados_query();
		return $this->rows;
	}

	public function nuevo($datos = array())
	{
		if (array_key_exists('id_paciente', $datos)) : //llave primaria
			foreach ($datos as $campo => $valor) :
				$$campo = $valor;
			endforeach;
			$nombre = utf8_decode($nombre);
			$this->query = "
					INSERT INTO paciente
					(id_paciente, nombre, documento, telefono, correo, estado)
					VALUES
					('$id_paciente', '$nombre', '$documento', '$telefono', '$correo', '$estado')
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
			UPDATE paciente
			SET nombre='$nombre',
			documento='$documento',
			telefono='$telefono',
			correo='$correo',
			estado='$estado'
			WHERE id_paciente = '$id_paciente'
			";
		$resultado = $this->ejecutar_query_simple();
		return $resultado;
	}

	public function borrar($id_paciente = '')
	{
		$this->query = "
			DELETE FROM paciente
			WHERE id_paciente = '$id_paciente'";
		$resultado = $this->ejecutar_query_simple();

		return $resultado;
	}

	function __destruct()
	{
		//unset($this);
	}
}
