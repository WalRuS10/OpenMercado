<?php
/*Patron Singleton*/
class Database
{
	private static $instancia;
	private $res;
	private $cn;
        
	private function __construct(){}
		
	public static function getInstance()
	{
		if(!self::$instancia) self::$instancia = new Database;
		return self::$instancia;
	}
	public function query($q)
	{
		if(!$this->cn) $this->connect();
		$this->res = mysql_query($q);
		$err = mysql_error();
		if($err != "") throw new Exception($err);
	}
	private function connect()
	{
		$this->cn=mysql_connect("localhost","root","");
		mysql_select_db("mercado",$this->cn);
	}
	public function fetch()
	{
		return mysql_fetch_assoc($this->res);
	}
	public function numRows()
	{
		return mysql_num_rows($this->res);
	}
	public function fetchAll()
	{
		$aux=array();
		while($fila = $this->fetch())
		{
			$aux[] = $fila;
		}
		return $aux;
	}
	public function escape($str)
	{
		if(!$this->cn) $this->connect();
		return mysql_real_escape_string($str);
	}
        public function escaparComodines($str)
        {
            $aux = str_replace('%', '\%', $str);
            $aux = str_replace('_', '\_', $aux);
            return $aux;
        }

        public function insertId() {
		return mysql_insert_id($this->cn);
	}
	
}
