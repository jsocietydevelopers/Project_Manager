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
		$this->load->view('v_actividades', $data);
	}
}
