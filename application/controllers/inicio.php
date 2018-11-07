<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inicio extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('iniciar');
		$this->load->library(array('session','email'));
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
		$datos = array(
			'correo' => $this->input->post('txtEmail'),
			'nombre' => $this->input->post('txtNombre'),
			'asunto' => $this->input->post('txtAsunto'),
			'mensaje' => $this->input->post('txtMensaje')
		);
		/*
		$this->load->library('email');
		$this->email->from('viny.mtz@gmail.com', $datos['nombre']);
		$this->email->to('angelesleva.r@gmail.com');
		$this->email->subject($datos['asunto']);
		$this->email->message($datos['mensaje']);
		if ($this->email->send()) {
			$this->index();
		}else {
			$this->AcercaDe();
		}
		*/
		//Indicamos el protocolo a utilizar
        $config['protocol'] = 'smtp';

       //El servidor de correo que utilizaremos
        $config["smtp_host"] = 'smtp.gmail.com';

       //Nuestro usuario
        $config["smtp_user"] = 'angelesleva.r@gmail.com';

       //Nuestra contraseña
        $config["smtp_pass"] = 'therose15*';

       //El puerto que utilizará el servidor smtp
        $config["smtp_port"] = '587';

       //El juego de caracteres a utilizar
        $config['charset'] = 'utf-8';

       //Permitimos que se puedan cortar palabras
        $config['wordwrap'] = TRUE;

       //El email debe ser valido
       $config['validate'] = true;
	   $config['mailtype'] = html;


      //Establecemos esta configuración
        $this->email->initialize($config);

      //Ponemos la dirección de correo que enviará el email y un nombre
        $this->email->from('angelesleva.r@gmail.com', $datos['nombre']);

      /*
       * Ponemos el o los destinatarios para los que va el email
       * en este caso al ser un formulario de contacto te lo enviarás a ti
       * mismo
       */
        $this->email->to('angelesleva.r@gmail.com', 'Admin');

      //Definimos el asunto del mensaje
        $this->email->subject($datos['asunto']);

      //Definimos el mensaje a enviar
        $this->email->message(
                "Email: ".$datos['correo'],
				"Nombre: " .$datos['nombre'],
                " Mensaje: ".$datos['mensaje']
                );

        //Enviamos el email y si se produce bien o mal que avise con una flasdata
        if($this->email->send()){
            $this->session->set_flashdata('envio', 'Email enviado correctamente');
			redirect(base_url("index.php/inicio/index"));
        }else{
            $this->session->set_flashdata('envio', 'No se a enviado el email');
			redirect(base_url("index.php/inicio/AcercaDe"));
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
}
