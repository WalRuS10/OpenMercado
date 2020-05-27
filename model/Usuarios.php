<?
class UsuarioIncorrecto extends Exception {}

class Usuarios
{
    private $db;
    
    public function __construct() 
    {
        $this->db = Database::getInstance();
    }
    
    public function newUsuario($nombre, $pass)
    {
	$nombre = (string) $nombre;
        if(strlen($nombre)<3) die();
        $nombre = $this->db->escape($nombre);
        
        $pass = (string) $pass;
        if(strlen($pass)<3) die();
        $pass = $this->db->escape($pass);
        $pass = md5($pass);
        $this->db->query('insert into usuarios (nombre, password) 
                          values (\''.$nombre.'\',\''.$pass
                          .'\')');
						  
            return $this->db->insertId();
    }
    
    public function getUsuario($nombre)
    {
        if(strlen($nombre)<3) die();
        $this->db->query('select * from usuarios 
                           where nombre = \'' . $nombre . '\'');
        if($this->db->numRows() == 0) throw new UsuarioIncorrecto;
        
        $ret = $this->db->fetch();        
        return $ret;
    }
    public function validarPassword($idusuario, $password)
    {
            if($idusuario==0) die();
            $this->db->query('select * from usuarios 
                       where idusuario = ' . $idusuario );
            if($this->db->numRows() == 0) throw new UsuarioIncorrecto;
            $usuario = $this->db->fetch();
            if(md5($password)==$usuario['password'])
                    return true;
            else
                    return false;
    }
    public function usuarioExiste($nombre){
        if(strlen($nombre)<3) die();
        $this->db->query('select * from usuarios 
                           where nombre = \'' . $nombre . '\'');
        if($this->db->numRows() == 0)
            return false;
        else
            return true;
    }
}
?>
