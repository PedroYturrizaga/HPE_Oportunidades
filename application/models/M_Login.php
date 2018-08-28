<?php 

class M_Login extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}

	function verificaUsuario($user) {
		$sql = "SELECT *
				  FROM tb_vendedores
				 WHERE usuario LIKE '%".$user."%'";
		$result = $this->db->query($sql);
		return $result->result();
	}
	function insertarUsuario($arrayInsert, $tabla) {
		$this->db->insert($tabla, $arrayInsert);
		$sql = $this->db->insert_id();
		if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
		}
		return array("error" => EXIT_SUCCESS, "msj"=> MSJ_INS);
	}
}