<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library(array('session'));
        $this->load->library('table');
    }
    public function index()
    {
        if($this->session->userdata('nivel') == 1)
        {
            $this->load->view('helpers/headerAdmin');
        }
        else
        {
            redirect(base_url());
        }
    }

    public function usuarios(){
        $query='SELECT idUsuarios,usuarios.Nombre as Nombre,ApPaterno,ApMaterno,Img,Correo,Telefono,status,inst.Nombre as institucion  FROM inst, usuarios WHERE inst.idInstitucion=usuarios.idInst and usuarios.Privilegio=2';
        $datos['consulta'] = $this->admin_model->get_usuarios($query);
        $this->load->view('admin/usuarios',$datos);
    }
    public function salir()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function permisoUsuario()
    {
        if($this->admin_model->bloquearPermiso($this->input->post('id'), $this->input->post('p')))
            echo '1';

        else
            echo '0';
    }
    public function instituciones(){
      $data['paises']=$this->admin_model->get_countries();
      $data['consulta'] = $this->admin_model->get_instituciones();
      $this->load->view('admin/instituciones', $data);
    }
  }
?>
