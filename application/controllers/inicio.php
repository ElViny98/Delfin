<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('iniciar');
		$this->load->library(array('session'));
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('helpers/headerInicio');
		$this->load->view('inicio');
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
		$this->load->view('perfilUsuario',array('error'=>''));
		$this->load->view('helpers/footer');
	}
	public function iniciarAdmin(){
		$this->load->view('helpers/headerAdmin');
		//$this->load->view('acerca');
		$this->load->view('helpers/footer');
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
	//$this->load->view('perfilUsuario',array('error'=>''));
	public function do_upload(){
		$config['upload_path'] = 'assets/uploads'; //yo might want to comeback to this if theres an error about path upload
		$config['allowed_types'] = 'jpg|jpeg|gif|png';
		$config['max_size'] = '900';
$config['max_width'] = '400';
$config['max_height'] = '400';
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('perfilUsuario',$error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->iniciar->Fileupload($data);
  		$this->load->view('perfilUsuario', $data);
		}
	}
}
?>
