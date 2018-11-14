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
    public function Noticias()
    {
        $this->load->view('helpers/headerUsuario');
        $this->load->view('altaNoticia');
        $this->load->view('helpers/footer');
    }
    public function Noticias_MisNoticias(){
        $datos['consulta'] = $this->user_model->misNoticias($this->session->userdata('idUsuario'));
        $this->load->view('helpers/headerUsuario');
        $this->load->view('misNoticias',$datos);
        $this->load->view('helpers/footer');
    }
    public function datosNoticia(){

        $this->load->library('upload');
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $this->createHash();
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pic'))
        {
            $image_path = $this->upload->data();
            $fechaActual = date('Y-m-d');
            $datos = array(
                'id' => $this->session->userdata('idUsuario'),
    			'titulo' => $this->input->post('txtTitulo'),
                'contenido' => $this->input->post('content'),
                'imagen' => $image_path['file_name'],
                'fecha' => $fechaActual
    		);
                $this->user_model->altaNoticia($datos);
        }
        else
        {
            echo $this->upload->display_errors();
        }

    }
    public function eliminarNoticia(){
        $id = $this->uri->segment(3);
        $this->user_model->eliminar($id);
    }
    public function datosEditarNoticia()
    {
        if ($this->input->post('pic')!="") {
            $this->load->library('upload');
            $config['upload_path'] = 'assets/img/';
            $config['allowed_types'] = 'jpg|png';
            $config['overwrite'] =TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if($this->upload->do_upload('pic'))
            {
                $image_path = $this->upload->data();
                $datos = array(
                    'id' => $this->session->userdata('idUsuario'),
                    'titulo' => $this->input->post('txtTitulo'),
                    'contenido' => $this->input->post('content'),
                    //guarda toda la ubicacion
                    //'imagen' => $image_path['full_path'],
                    //solo guardar el nombre
                    'imagen' => $image_path['file_name']
                );


            }
            else
            {
                echo $this->upload->display_errors();
            }
        }
        else {
            $fechaActual = date('Y-m-d');
            $datos = array(
                'id' => $this->session->userdata('idUsuario'),
                'titulo' => $this->input->post('txtTitulo'),
                'contenido' => $this->input->post('content'),
            );
        }


    }
    public function editarNoticia(){
        $id = $this->uri->segment(3);
        $datos['consulta'] = $this->user_model->obtenerNoticia($id);
        $this->load->view('helpers/headerUsuario');
        $this->load->view('editarNoticia',$datos);
        $this->load->view('helpers/footer');
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
    //Función que crea una cadena aleatoria de 24 caracteres para el nombre de un archivo.
    private function createHash()
    {
        $len = 24;
        for($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != $len; $x = rand(0, $z), $s .= $a{$x}, $i++);

        return $s;
    }

}
