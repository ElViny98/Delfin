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

        $this->load->library('upload');
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] =TRUE;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pic'))
        {
            $data_upload_files = $this->upload->data();
            $image_path = $this->upload->data();
            $fechaActual = date('Y-m-d');
            $datos = array(
                'id' => $this->session->userdata('idUsuario'),
    			'titulo' => $this->input->post('txtTitulo'),
                'contenido' => $this->input->post('content'),
                'imagen' => $image_path['full_path'],
                'fecha' => $fechaActual
    		);
            $this->user_model->altaNoticia($datos);
        }
        else
        {
            echo $this->upload->display_errors();
        }

    }
    public function upload_img(){

        $this->load->library('upload');
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] =TRUE;
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile'))
        {
            $data_upload_files = $this->upload->data();
            $image_path = $this->upload->data();
            $datos = array(
                'imagen' => $config['upload_path'].$image_path['file_name'],
              );
            $this->user_model->uploadimg($datos);
            redirect('/inicio/iniciarUsuario', 'refresh');
        }
        else
        {
            echo $this->upload->display_errors();
        }

    }



}
