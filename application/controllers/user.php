<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library(array('session'));
    }

    public function index()
    {
        if($this->session->userdata('nivel') == 2)
        {
            $this->load->view('helpers/headerUsuario');
        }
        else
        {
            redirect(base_url());
        }
    }
    public function Noticias(){
        $this->load->view('helpers/headerUsuario');
        $this->load->view('altaNoticia');
        $this->load->view('helpers/footer');
    }
    public function datosNoticia(){
        $fechaActual = date('Y-m-d');
        $datos = array(
            'id' => $this->session->userdata('idUsuario'),
			'titulo' => $this->input->post('txtTitulo'),
            'contenido' => $this->input->post('content'),
            'imagen' => $this->input->post('pic'),
            'fecha' => $fechaActual
		);
        echo $_POST['pic'];

        $this->load->library('upload');
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] =TRUE;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pic'))
        {
            $this->user_model->altaNoticia($datos);
        }
        else
        {
            echo $this->upload->display_errors();
        }

    }


}
