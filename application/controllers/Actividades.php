<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Actividades extends CI_Controller {

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
        $data['proyecto'] = strtoupper($this->session->userdata('proyect_name'));
        $html  = '';
        $cont  = 1;
        $acti  = '';
        $datos = $this->M_usuario->getTareas($this->session->userdata('Id_user'));
        if(count($datos) == 0){
            return;
        }else {
            foreach ($datos as $key){
                /*if($key->acti_name == ''){
                    $acti .= '<a onclick="cambiarInput('.$cont.')"><span id="activi'.$cont.'">Ingrese una actividad...</span></a></br>';
                }else {
                    $acti .= '<a onclick="cambiarInput('.$cont.')"><span id="activi'.$cont.'">'.$key->acti_name.'</span></a></br>';
                }*/
                $html .= '<div class="div-activis'.$cont.'">
                          <h3>'.$key->tarea.'</h3>'.
                          '<div class="progress">'.
                             '<div class="progress-bar" style="width:0%; color:black">0%</div>'.
                          '</div>'.
                          '<div class="add-activis">'.
                            '<a onclick="cambiarInput('.$cont.')"><span id="activi'.$cont.'">Ingrese una actividad...</span></a></br>'.
                          '</div>'.
                          '<input type="text" class="form-control" id="actividad'.$cont.'" placeholder="Ingrese una actividad..." style="display: none;">'.
                          '<input type="text" class="form-control" id="horas'.$cont.'" placeholder="Nro Horas" style="display: none;">'.
                          '<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" id="btnActividad'.$cont.'" onclick="crearActividad('.$cont.')" style="display: none;"><i class="mdi mdi-add"></i>Crear actividad</button>
                          </div>';
                $cont++;
            }
        }
        $data['html'] = $html;
		$this->load->view('v_actividades', $data);
	}
    function crearTarea(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $tarea         = $this->input->post('tarea');
            $tiempo        = $this->input->post('tiempo');
            $arrayInsert   = array('Nombre'     => $tarea,
                                   'tiempo'     => $tiempo,
                                   'id_project' => $this->session->userdata('Id_project'));
            $datoInsert    = $this->M_usuario->insertarDatos($arrayInsert, 'tareas');
            $data['error'] = EXIT_SUCCESS;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
    function crearActividad(){
        $data['error'] = EXIT_ERROR;
        $data['msj']   = null;
        try {
            $activi      = $this->input->post('activi');
            $horas       = $this->input->post('horas');
            $arrayInsert = array('Nombre' => $activi,
                                 'tiempo' => $horas);
            $datoInsert  = $this->M_usuario->insertarDatos($arrayInsert, 'actividades');
            $html        = '';
            $cont        = 1;
            $datos       = $this->M_usuario->getActividades($this->session->userdata('Id_user'));
            if(count($datos) == 0){
                return;
            }else {
                foreach ($datos as $key){
                    $html .= '<a onclick="cambiarInput('.$cont.')"><span id="activi'.$cont.'">'.$activi.'</span></a></br>';
                    $cont++;
                }
            }
            $data['html_activi'] = $html;
            $data['error']       = EXIT_SUCCESS;
        }catch(Exception $e){
            $data['msj'] = $e->getMessage();
        }
        echo json_encode($data);
    }
}