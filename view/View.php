<?
abstract class View
{
	public function render()
	{
		include '../html/'.get_class($this).'.php';
	}
}
/* get_class() obtiene el nombre de la clase */