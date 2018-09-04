<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Admin extends CI_Controller{
	
	function __construct(){
		parent::__construct();
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->load->model('M_Solicitud');
        $this->load->model('M_Login');
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
	}

	public function index (){
        if($this->session->userdata('usuario') == null){
            header("location: Login");
        } else {
            $nombre = $this->M_Login->verificaUsuario( $this->session->userdata('usuario') );
            $pais   = $this->session->userdata('pais');
            $idUser = $this->session->userdata('Id_user');
            $data['nombre'] = $nombre[0]->no_vendedor;
            $datos  = $this->M_Solicitud->getCanalMasUsado($pais, $idUser);
            $datos2 = $this->M_Solicitud->getLastCotizaciones($pais, $idUser);
            $datos3 = $this->M_Solicitud->getDatosReporte();
            $html   = ' ';
            $html2  = ' ';
            $html3  = ' '; 
            $producto= '';
            foreach ($datos as $key) {
                $importe = round($key->importe * 100) / 100;
                $html .= '<tr>
                              <td>'.$key->no_compania.'</td>
                              <td>'.$key->no_contacto_mayo.'</td>
                              <td>'.$key->pais.'</td>
                              <td class="text-right">'.$importe.'</td>
                          </tr>';
            }
            foreach ($datos2 as $key) {
                $html2 .= '<tr>
                               <td>'.$key->user.'</td>
                               <td>'.$key->no_contacto_mayo.'</td>
                               <td>'.$key->no_mayorista.'</td>
                               <td>'.$key->pais.'</td>
                               <td>'.(($key->puntos == 100) ? 'Storage' : 'Server').'</td>
                               <td>'.$key->fecha.'</td>
                               <td class="text-center">
                                   <button class="mdl-button mdl-js-button mdl-button--icon" onclick="getDetails('.$key->id_cotizacion.');">
                                       <i class="mdi mdi-visibility"> </i>
                                   </button>
                                   <button class="mdl-button mdl-js-button mdl-button--icon" onclick="openModalDocuemento('.$key->id_cotizacion.')">
                                       <i class="mdi mdi-collections"> </i>
                                   </button>
                               </td>
                             </tr>';
            }
            foreach ($datos3 as $key) {
                $html3 .= '<tr>
                               <td>'.$key->user.'</td>
                               <td>'.$key->compania.'</td>
                               <td>'.$key->no_mayorista.'</td>
                               <td>'.$key->no_contacto_mayo.'</td>
                               <td>'.$key->email.'</td>
                               <td>'.$key->pais.'</td>
                               <td>'.(($key->puntos == 100) ? 'Storage' : 'Server').'</td>
                               <td>'.$key->fecha2.'</td>
                               <td>'.RUTA_ARCHIVOS.$key->documento.'</td>
                           </tr>';
            }
            $data['bodyCanales'] = $html;
            $data['bodyCotizaciones'] = $html2;
            $data['bodyReporte'] = $html3;
            $data['pais'] = $pais;
            $this->load->view('en/v_champion', $data);
        }
	}

    function getDetalles() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $id     = $this->input->post('cotizacion');
            $datos  = $this->M_Solicitud->getDetallesCotizacion($id);
            $data['detalles'] = $datos;
            $idVendedor = $this->session->userdata('Id_user');
            $datos2 = $this->M_Solicitud->getMayoristas($idVendedor);
            $option = ' ';
            foreach ($datos2 as $key) {
                if($datos[0]->mayorista == $key->mayorista) {
                    $option = '<option value="'.$key->mayorista.'" class="selected">'.$key->mayorista.'</option>';
                }
            }
            $data['option'] = $option;
            $data['error'] = EXIT_SUCCESS;
        }
        catch (Exception $ex){
            $data['msj'] = $ex->getMessage();
        }
        echo json_encode($data);
    }

    function comboMayoristas(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $pais = $this->session->userdata('pais');
            $idVendedor = $this->session->userdata('Id_user');
            $datos2 = $this->M_Solicitud->getMayoristas($idVendedor);
            $option = ' ';
            foreach ($datos2 as $key) {
                $option .= '<option value="'.$key->mayorista.'">'.$key->mayorista.'</option>';
            }
            $data['option'] = $option;
            $data['pais']   = $pais;
            $data['error']  = EXIT_SUCCESS;
        } catch (Exception $ex){
            $data['msj'] = $ex->getMessage();
        }
        
        echo json_encode($data);
    }

    public function getDatosGraficosCanales() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $datos = $this->M_Solicitud->getDatosGraficosCanales();
            $array = [];
            foreach ($datos as $key) {
                array_push($array, [$key->pais, intval($key->importe) ]);
            }
            $data['datos'] = json_encode($array);
        }
        catch (Exception $ex){
            $data['msj'] = $ex->getMessage();
        }
        echo json_encode($data);
    }

    public function getDatosGraficoCotiza() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $datos = $this->M_Solicitud->getDatosGraficoCotiza();
            $array = [];
            foreach ($datos as $key) {
                array_push($array, [$key->pais, intval($key->puntos_entregados) ]);
            }
            $data['datos'] = json_encode($array);
        }
        catch (Exception $ex){
            $data['msj'] = $ex->getMessage();
        }
        echo json_encode($data);
    }

    function muestraDocumento() {
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $id  = $this->input->post('id');
            $img = $this->M_Solicitud->getDocumento($id);
            if($img[0]->documento != null) {
                $data['imagen'] = RUTA_ARCHIVOS.$img[0]->documento;
            } else {   
                $data['imagen'] = "";
            }
            
            // $data['imagen'] = $this->M_Solicitud->getDocumento($id);
            $data['error'] = EXIT_SUCCESS;
        }
        catch (Exception $ex){
            $data['msj'] = $ex->getMessage();
        }
        echo json_encode($data);
    }
}