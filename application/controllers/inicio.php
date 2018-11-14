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
		$this->load->helper('text');
		$this->load->library(array('session', 'email'));
	}

	public function index()
	{	
		//Si no se ha iniciado sesión, la dirección "localhost/Delfin" 
		//Dirige a la página de inicio
		if($this->session->userdata('nivel') == null)
		{
			$this->load->view('helpers/headerInicio');

			$data['noticias'] = $this->iniciar->noticias();

			$this->load->view('inicio', $data);
			$this->load->view('helpers/footerInicio');
		}
		//Si hay una sesión abierta, se mantendrá abierta hasta que caduque
		//o hasta que el usuario cierre sesión
		else
		{
			switch($this->session->userdata('nivel'))
			{
				case 1:
					redirect(base_url('index.php/admin'));
					break;

				case 2:
					redirect(base_url('index.php/user'));
					break;
			}
		}
	}
	public function AcercaDe()
	{
		$this->load->view('helpers/headerInicio');
		$this->load->view('acerca');
		$this->load->view('helpers/footerInicio');
	}

	public function iniciarUsuario(){
		$this->load->model('user_model');
		$data = $this->user_model->get_user_data(2);
		$this->load->view('helpers/headerUsuario');
		$this->load->view('perfilUsuario',array('user_data' => $data));
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
			'correo' 	=> $this->input->post('txtEmail'),
			'nombre' 	=> $this->input->post('txtNombre'),
			'asunto' 	=> $this->input->post('txtAsunto'),
			'mensaje' 	=> $this->input->post('txtMensaje')
		);
		$this->email->from('valerialopez40@gmail.com', $datos['nombre']);
		$this->email->to('2016030004@upsin.edu.mx');
		$this->email->subject($datos['asunto']);
		$this->email->message($datos['mensaje']);
		if ($this->email->send()) {
			 $this->session->set_flashdata("email","Mensaje Enviado");
		}else {
			 $this->session->set_flashdata("email","Error: Mensaje NO Enviado");
		}
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
	public function noticia()
	{
		$noticia = $this->iniciar->getNoticia($this->input->get('id'));
		$data = array(
			'titulo'		=> $noticia->Titulo,
			'descripcion'	=> $noticia->Descripcion,
			'fecha'			=> $noticia->Fecha
		);
		$this->load->view('noticia', $data);
	}

	public function buscarNoticia()
	{
		$this->iniciar->buscarNoticia($this->input->post('buscar'));
	}

	private function createHash()
	{
		for($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != 24; $x = rand(0, $z), $s .= $a{$x}, $i++);

		return $s;
	}

	public function recoverPass()
	{
		$this->load->view('recover');
	}

	public function recuperar()
	{
		$token = $this->createHash();
		$id = $this->iniciar->generarToken($this->input->post('correo'), $token);
		if($id == null)
		{
			echo 'No existe el correo';
		}
		else
		{
			$this->email->initialize(array(
				'protocol'		=> 'sendmail',
				'wordwrap'		=> TRUE,
				'mailpath'		=> 'c:/xampp/sendmail/sendmail.exe',
				'smtp_crypto'	=> 'ssl',
				'mailtype'		=> 'html'
			));

			$this->email->from('null', 'Administrador Delfin');
			$this->email->subject('Recuperación de contraseña');
			$this->email->to($this->input->post('correo'));
			$this->email->message('<h1>Solicitud de recuperación de contraseña</h1><br><br>
			<p>Se solicitó una recuperación de contraseña para la cuenta DELFIN vinculada 
			a este correo electrónico. Si usted solicitó esta modificación, dé clic en el 
			enlace que aparece a continuación: <br><br><center><i>
			<a href="'. base_url('index.php/inicio/passwordrecovery?token='.$token).'">
			Recuperar contraseña</a></i></center>');
			if($this->email->send())
			{
				echo 'Se envió';
			}
		}
	}

	public function passwordrecovery()
	{	
		$token = '';
		if(isset($_GET['token']))
		{
			$data['token'] = $_GET['token'];
			$token = $_GET['token'];
			$this->load->view('newpass', $data);
		}

		else
		{
			$x = $this->iniciar->updatePass($this->input->post('token'), $this->input->post('newpass'));
			echo $x;
		}
	}
}

?>
