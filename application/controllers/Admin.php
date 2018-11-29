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
            $datos['consulta'] = $this->admin_model->get_usuarios();
            $this->load->view('helpers/headerAdmin');
        }
        else
        {
            redirect(base_url());
        }
    }
    public function salir()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    public function usuarios()
    {
        $data['consulta'] = $this->admin_model->get_usuarios();
        $this->load->view('admin/usuarios', $data);
    }
    public function instituciones(){
      $data['paises']=$this->admin_model->get_countries();
      $data['consulta'] = $this->admin_model->get_instituciones();
      $this->load->view('admin/instituciones', $data);
    }
  }
?>
