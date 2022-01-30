<?php 
namespace ventas\productos;

class Producto
{
	protected $codigo;
	protected $nombre;

	public static function obtenerListaCompletaStatica()
	{
		return [1];
	}

	function __construct($codigo,$nombre)
	{
		$this->codigo=$codigo;
		$this->nombre=$nombre;
	}


	function obtenerListaCompleta()
	{
		return [];
	}


	


	/*
	Funcion que devuelve el codigo
	*/
	function  getCodigo()
	{
		return $this->codigo;
	}

	function  setCodigo($codigo)
	{
		$this->codigo=$codigo;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function setNombre($nombre)
	{
		$this->nombre=$nombre;
	}
}

