<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('iniciar');
		$this->load->library(array('session', 'email'));
	}

	public function index()
	{
		$this->load->view('helpers/headerInicio');

		$data['noticias'] = $this->iniciar->noticias();
		
		$this->load->view('inicio', $data);
		$this->load->view('helpers/footerInicio');
	}
	public function AcercaDe()
	{
		$this->load->view('helpers/headerInicio');
		$this->load->view('acerca');
		$this->load->view('helpers/footerInicio');
	}

	public function iniciarUsuario(){
		$this->load->view('helpers/headerUsuario');
		//$this->load->view('acerca');
		$this->load->view('helpers/footer');
	}
	public function iniciarAdmin(){
		$this->load->view('helpers/headerAdmin');
		//$this->load->view('acerca');
		$this->load->view('helpers/footer');
	}
	public function contacto(){
		$this->email->initialize(array(
			'protocol' 		=> 'sendmail',
			'wordwrap'		=> TRUE,
			'mailpath'		=> 'c:/xampp/sendmail/sendmail.exe',
			'smtp_crypto'	=> 'ssl'
		));
		$datos = array(
			'correo' => $this->input->post('txtEmail'),
			'nombre' => $this->input->post('txtNombre'),
			'asunto' => $this->input->post('txtAsunto'),
			'mensaje' => $this->input->post('txtMensaje')
		);
		$this->email->from('valerialopez40@gmail.com', $datos['nombre']);
		$this->email->to('2016030004@upsin.edu.mx');
		$this->email->subject($datos['asunto']);
		$this->email->message($datos['mensaje']);
		echo $this->email->send();
		if ($this->email->send()) {
			$this->index();
		}else {
			$this->AcercaDe();
		}
		$this->email->print_debugger(array('headers', 'subject', 'body'));
	}

	public function ingresar()
	{
		$data = $this->iniciar->iniciar($_POST['email'], $_POST['password']);
		//Respuesta del servidor en caso de contraseña o correo incorrectos.
		if($data == null)
		{
			echo '0';
			return;
		}

		switch($data->Privilegio)
		{
			//Inicio de administrador/lider
			case 1:
				//El campo nombre se concatena para dar el nombre completo
				//El campo nivel indica el nivel del privilegio. Es necesario para permitir
				//O restringir acceso a determinadas páginas
				$userData = array(
					'idUsuario'	=> $data->idUsuarios,
					'nombre'	=> $data->Nombre. ' '. $data->ApPaterno. ' '. $data->ApMaterno,
					'nivel'		=> $data->Privilegio
				);
				$this->session->set_userdata($userData);
				echo $data->Privilegio;
				break;

			//Inicio de usuario
			case 2:
				//El campo nombre se concatena para dar el nombre completo
				//El campo nivel indica el nivel del privilegio. Es necesario para permitir
				//O restringir acceso a determinadas páginas
				$userData = array(
					'idUsuario'	=> $data->idUsuarios,
					'nombre'	=> $data->Nombre. ' '. $data->ApPaterno. ' '. $data->ApMaterno,
					'nivel'		=> $data->Privilegio
				);
				$this->session->set_userdata($userData);
				echo $data->Privilegio;
				break;
		}
	}
}
