<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
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

    public function salir()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}

?>