<?
class PublicacionInexistente extends Exception {}
class BusquedaSinResultados extends Exception {}

class Publicaciones
{
    private $db;
    
    public function __construct() 
    {
        $this->db = Database::getInstance();
    }
    
    public function newPublicacion($idusuario,$titulo,$descripcion,$precio)
    {
        
        if(!ctype_digit($idusuario)) die();
        if($idusuario==0) die('2');
        
        if(strlen($titulo)<3) throw new Exception;
        $titulo = $this->db->escape($titulo);
        $titulo = htmlentities($titulo);
        
        if(strlen($descripcion)<3) throw new Exception;
        $descripcion = $this->db->escape($descripcion);
        $descripcion = htmlentities($descripcion);
        
        if(!is_numeric($precio)) die();
		$precio = (float) $precio;
        if($precio<=0) throw new Exception;
        
        $this->db->query('insert into publicaciones (idvendedor,titulo,
                            descripcion,precio) 
                          values ('.$idusuario.',\''.$titulo.'\',\''.$descripcion
                          .'\','.$precio.')');
						  
        return $this->db->insertId();
    }
    
    public function getPublicacion($idpublicacion)
    {
        if($idpublicacion==0) die();
        $this->db->query('select p.idpublicacion as idpublicacion,
                                 p.titulo as titulo,
                                 p.descripcion as descripcion, 
                                 p.precio as precio,
                                 u.nombre as nombrevendedor
                          from publicaciones as p
                          join usuarios u on
                            u.idusuario = p.idvendedor
                          where idpublicacion = '. $idpublicacion);
		if($this->db->numRows() == 0) throw new PublicacionInexistente;
        $publicacion = $this->db->fetch();
	
        return $publicacion;
    }
    public function buscar($texto)
    {
        if(strlen($texto)<3) die();
        $textobusqueda = $this->db->escape($texto);
        $textobusqueda = $this->db->escaparComodines($textobusqueda);
        $textobusqueda = htmlentities($textobusqueda);
        $this->db->query('select * from publicaciones
                            where titulo like \'%' . $textobusqueda . '%\'');
        if($this->db->numRows() == 0) throw new BusquedaSinResultados;
        return $this->db->fetchAll();
    }

    public function listaUltimas() {
        $this->db->query('select * from publicaciones
                            where not vendido
                           order by idpublicacion DESC
                           limit 4');
        if ($this->db->numRows() == 0)
            return;
        return $this->db->fetchAll();
    }
    public function comprar($idpublicacion, $idcomprador){
        $this->db->query('insert into ventas(idpublicacion, idcomprador)
                            values('. $idpublicacion . ',' . $idcomprador .')');
        $this->db->query('update publicaciones set vendido=1 
                            where idpublicacion = ' . $idpublicacion);
    }

}

?>
