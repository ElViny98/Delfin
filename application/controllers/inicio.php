<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('iniciar');
	}
	public function index()
	{
		$this->load->view('acerca');
	}


}
