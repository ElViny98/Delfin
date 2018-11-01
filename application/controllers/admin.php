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
            echo "Administrador";
            $this->load->view('helpers/headerInicio');
        }
        else
        {
            redirect(base_url());
        }
    }
}

?>