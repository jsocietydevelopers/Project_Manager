<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_usuario');
        $this->load->helper("url");//BORRAR CACHÉ DE LA PÁGINA
        $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
        $this->output->set_header('Pragma: no-cache');
    }
	public function index(){
		$datos = $this->M_usuario->getProyectos($this->session->userdata('Id_user')); 
		$html  = '';
		$count = 1;
		if(count($datos) == 0){
			$html  = '<tr>
				        <td>-</td>
				        <td>-</td>
				        <td>-</td>
				        <td>-</td>
				      </tr>';
		}else {
			foreach ($datos as $key) {
				$html  .= '<tr>
					        <td>'.$key->Nombre.'</td>
					        <td>'.$key->colaboradores.'</td>
					        <td>'.$key->estatus.'</td>
					        <td>
					        	<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Editar" id="editar'.$count.'" onclick="editarProyecto('.$count.', &quot;'.$key->Nombre.'&quot;)"><i class="mdi mdi-edit"></i></button>
	                        	<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Eliminar" id="eliminar'.$count.'" onclick="modalEliminar(this, '.$count.')"><i class="mdi mdi-delete"></i></button>
					        </td>
					      </tr>';
				$count++;
			}
		}
		$data['tabla'] = $html;
		$this->load->view('v_admin', $data);
	}
	function editarProyecto(){
		$data['error'] = EXIT_ERROR;
		$data['msj']   = null;
		try {
			$proyecto    = $this->input->post('proyecto');
			$id_proyecto = $this->M_usuario->getIdProyecto($proyecto);
			$session     = array('proyect_name' => $proyecto,
								 'Id_project'   => $$id_proyecto);
			$this->session->set_userdata($session);
			$data['error'] = EXIT_SUCCESS;
		}catch(Exception $e){
			$data['msj'] = $e->getMessage();
		}
		echo json_encode($data);
	}
	function crearProyecto(){
		$data['error'] = EXIT_ERROR;
		$data['msj']   = null;
		try {
			$proyecto 	   = $this->input->post('project');
			$colaboradores = $this->input->post('colaboradores');
			$arrayInsert   = array('Nombre'   	   => $proyecto,
								   'colaboradores' => $colaboradores,
								   'estatus' 	   => 'Creado',
								   'Id_persona'    => $this->session->userdata('Id_user'));
            $datoInsert    = $this->M_usuario->insertarDatos($arrayInsert, 'proyectos');
            $session  = array('Nombre'   	  => $proyecto,
							  'colaboradores' => $colaboradores,
							  'estatus' 	  => 'Creado',
							  'Id_project' 	  => $datoInsert['Id']);
			$this->session->set_userdata($session);
			$datos = $this->M_usuario->getProyectos($this->session->userdata('Id_user')); 
			$html  = '';
			$count = 1;
			if(count($datos) == 0){
				$html  = '<tr>
					        <td>-</td>
					        <td>-</td>
					        <td>-</td>
					        <td>
					        	<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Editar" id="editar" onclick="editarProyecto()"><i class="mdi mdi-edit"></i></button>
	                        	<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Eliminar" id="eliminar" onclick="modalEliminar(this)"><i class="mdi mdi-delete"></i></button>
					        </td>
					      </tr>';
			}else {
				foreach ($datos as $key) {
					$html  .= '<tr>
						        <td>'.$key->Nombre.'</td>
						        <td>'.$key->colaboradores.'</td>
						        <td>'.$key->estatus.'</td>
						        <td>
						        	<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Editar" id="editar'.$count.'" onclick="editarProyecto('.$count.')"><i class="mdi mdi-edit"></i></button>
		                        	<button class="mdl-button mdl-js-button mdl-button--icon" data-toggle="tooltip" data-placement="bottom" title="Eliminar" id="eliminar'.$count.'" onclick="modalEliminar(this, '.$count.')"><i class="mdi mdi-delete"></i></button>
						        </td>
						      </tr>';
					$count++;
				}
			}
			$data['tabla'] = $html;
			$data['error'] = EXIT_SUCCESS;
		}catch(Exception $e){
			$data['msj'] = $e->getMessage();
		}
		echo json_encode($data);
	}
}
