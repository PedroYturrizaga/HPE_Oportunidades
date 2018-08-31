<?php

class M_Solicitud extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function insertarCotizacion($arrayInsert, $tabla) {
		$this->db->insert($tabla, $arrayInsert);
		$sql = $this->db->insert_id();
		if($this->db->affected_rows() != 1) {
            throw new Exception('Error al insertar');
            $data['error'] = EXIT_ERROR;
		}
		return array("error" => EXIT_SUCCESS, "msj"=> MSJ_INS, "id_cotizacion"=> $sql);
	}

	function updateDatos($arrayData, $id, $tabla){
        $this->db->where('id_cotizacion'  , $id);
        $this->db->update($tabla, $arrayData);
        if ($this->db->trans_status() == false) {
            throw new Exception('No se pudo actualizar los datos');
        }
        return array('error' => EXIT_SUCCESS,'msj' => MSJ_UPT);
    }

	function getMayoristas($idVendedor, $region = null) {
		$where = ($region == null) ? "" : " AND m.pais = v.region "; 
		$sql = "SELECT v.id_vendedor,
					   m.mayorista
				  FROM tb_mayorista m, 
				  	   tb_vendedores v
				 WHERE v.id_vendedor = ".$idVendedor.
				 $where."
				 GROUP BY mayorista
			  ORDER BY mayorista ASC";
		$result = $this->db->query($sql);
		return $result->result();
	}

	function getLastOrders($idUser) {
		$sql="SELECT id_cotizacion,
					 pais,
					 compania,
					 no_mayorista,
					 fecha_factura,
					 puntos,
					 SUM(`puntos`) AS puntos_total
				FROM tb_cotizacion 
			   WHERE _id_vendedor = ".$idUser."
 			GROUP BY id_cotizacion
			ORDER BY id_cotizacion DESC
			   LIMIT 4";
	  	$result = $this->db->query($sql);
		return $result->result();
	}

	function eliminaRegistro($id, $tabla1, $tabla2) {
		$this->db->where('id_cotizacion'  , $id);
        $this->db->delete($tabla1);

        return array('error' => EXIT_SUCCESS,'msj' => MSJ_DEL);
	}

// 	PARA EL CHAMPION
	function getDetallesCotizacion($idCotizacion) {
		$sql = "SELECT c.email, 
					   c.Nombre,
					   c.no_contacto_mayo, 
					   c.email_contacto,
					   c.pais, 
					   c.compania, 
					   c.telefono, 
					   c.nu_factura, 
					   date_format(c.fecha_factura, '%d/%m/%Y') AS fecha, 
					   c.monto_final, 
					   m.mayorista, 
					   c.documento
				  FROM tb_cotizacion c, 
				       tb_vendedores v, 
                       tb_mayorista m
				 WHERE c.id_cotizacion = ".$idCotizacion." 
				   AND trim(c.no_mayorista) = trim(m.mayorista)
			  GROUP BY c.no_contacto_mayo";
	   	$result = $this->db->query($sql);
	   	return $result->result();
	}

	function getCanalMasUsado ($pais, $idUser) {	
		if($pais == '') {
			$sql = "SELECT COUNT(compania) AS cantidad_compania,
						   compania AS no_compania,
						   no_contacto_mayo,
						   pais,
						   SUM(monto_final) AS importe
					  FROM tb_cotizacion
				  GROUP BY LOWER(compania)
				  ORDER BY cantidad_compania DESC, importe DESC
				  	 LIMIT 3";
		} else {
			$sql = "SELECT COUNT(compania) AS cantidad_compania,
						   compania AS no_compania,
						   no_contacto_mayo,
						   pais,
						   SUM(monto_final) AS importe
					  FROM tb_cotizacion
					 WHERE pais LIKE '".$pais."'
					   AND no_mayorista LIKE (SELECT m.mayorista 
	                                            FROM tb_mayorista m, tb_vendedores v 
	                                           WHERE v.id_vendedor = ".$idUser."
	                                             AND v.region = m.pais)
				  GROUP BY LOWER(compania)
				  ORDER BY cantidad_compania DESC, importe DESC
				  	 LIMIT 3";
		}
		$result = $this->db->query($sql);
		return $result->result();
	}

	function getLastCotizaciones($pais, $idUser) {
		if($pais == '') {
			$sql = "SELECT id_cotizacion,
						   email,
					       no_contacto_mayo,
					       compania,
					       pais,
					       date_format(fecha_factura, '%d/%m/%Y') AS fecha,
					       fecha_factura as fecha2,
					       documento
					  FROM tb_cotizacion
				  ORDER BY fecha2 DESC
					 LIMIT 10";
		} else {
			$sql = "SELECT id_cotizacion,
    					   email,
    					   no_contacto_mayo,
    					   compania,
    					   pais,
						   DATE_FORMAT(fecha_factura, '%d/%m/%Y') AS fecha
					  FROM tb_cotizacion
					 WHERE pais LIKE '".$pais."'
					   AND no_mayorista LIKE (SELECT m.mayorista 
	                                            FROM tb_mayorista m, tb_vendedores v 
	                                           WHERE v.id_vendedor = ".$idUser."
	                                             AND v.region = m.pais) 
				  ORDER BY id_cotizacion DESC
					 LIMIT 10";
		}
		$result = $this->db->query($sql);
		return $result->result();
	}

	function getDatosGraficosCanales(){
		$sql = "SELECT pais, 
					   SUM(monto_final) AS importe
				  FROM tb_cotizacion
			  GROUP BY pais
			  ORDER BY importe DESC";
		$result = $this->db->query($sql);
		return $result->result();
	}

	function getDatosGraficoCotiza() {
		$sql = "SELECT pais, 
					   SUM(monto_final) AS puntos_entregados 
				  FROM tb_cotizacion
			  GROUP BY pais 
			  ORDER BY puntos_entregados DESC";
		$result = $this->db->query($sql);
		return $result->result();
	}

	function getDocumento($id){
		$sql    = "SELECT documento 
					 FROM tb_cotizacion
					WHERE id_cotizacion = ".$id."";
		$result = $this->db->query($sql);
		return $result->result();
	}
	function getDatosReporte(){
		$sql = "SELECT id_cotizacion,
					   email,
				       no_contacto_mayo,
				       compania,
				       pais,
				       date_format(fecha_factura, '%d/%m/%Y') AS fecha,
				       fecha_factura as fecha2,
				       documento
				  FROM tb_cotizacion
			  ORDER BY fecha2 DESC";
		$result = $this->db->query($sql);
		return $result->result();
	}
}