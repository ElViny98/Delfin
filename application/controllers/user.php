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
        $config['allowed_types'] = 'jpg|png|jpeg';
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
                redirect(base_url('user/Noticias'));
        }
        else
        {
            echo $this->upload->display_errors();
        }

    }
    public function eliminarNoticia(){
        $id = $this->uri->segment(3);
        $this->user_model->eliminar($id);
        redirect(base_url('index.php/user/Noticias_MisNoticias'));
    }

    public function upload_img(){

        $this->load->library('upload');
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = TRUE;
        $config['file_name'] = $this->createHash();
        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if($this->upload->do_upload('userPhoto'))
        {
            $image_path = $this->upload->data();
            $datos = array(
                'id' => $this->session->userdata('idUsuario'),
                'imagen' => $image_path['file_name']
              );
              $query = 'UPDATE usuarios SET ';
              $query.= 'img = "'.$datos['imagen'].'" WHERE idUsuarios = '.$datos['id'];
            $this->user_model->uploadimg($query);
            redirect(base_url('index.php/user/Perfil'));
        }
        else
        {
            echo $this->upload->display_errors();
        }

    }

    public function editarDatosNoticia()
    {
        echo $this->input->post('pic');
        $data = array(
            'id' => $this->input->get('id'),
            'titulo' => $this->input->post('txtTitulo'),
            'contenido' => $this->input->post('content'),
            'imagen' => $this->input->post('pic')
        );
        echo $data['imagen'];
        $query = 'UPDATE Noticias SET ';
        if($_FILES['pic']['name'] == null)
        {
            $query.= 'Titulo = "'.$data['titulo'].'", Descripcion = "'.$data['contenido'].'" WHERE idNoticias = '.$data['id'];
            $this->user_model->editarDatosNoticia($query);
        }

        else
        {
            $i = $this->user_model->getImg($data['id']);
            $i = $i->row();
            $this->load->library('upload');
            $config['upload_path'] = 'assets/img/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['overwrite'] = TRUE;
            $config['file_name'] = $i->img;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if($this->upload->do_upload('pic'))
            {
                $query.= 'Titulo = "'.$data['titulo'].'", Descripcion = "'.$data['contenido'].'" WHERE idNoticias = '.$data['id'];
                $this->user_model->editarDatosNoticia($query);
            }
            else
            {
                echo $this->upload->display_errors();
            }
        }
        redirect(base_url('index.php/user/Noticias_MisNoticias'));

    }

    //Función que crea una cadena aleatoria de 24 caracteres para el nombre de un archivo.
    private function createHash()
    {
        $len = 24;
        for($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != $len; $x = rand(0, $z), $s .= $a{$x}, $i++);
    }

    public function editarNoticia(){
        $id = $_GET['id'];
        $datos = $this->user_model->obtenerNoticia($id);
        $d = $datos->row();
        $data = array(
            'id'            => $id,
            'titulo'        => $d->Titulo,
            'descripcion'   => $d->Descripcion,
            'img'           => $d->img
        );
        $this->load->view('helpers/headerUsuario');
        $this->load->view('editarNoticia',$data);
        $this->load->view('helpers/footer');
    }
    public function Perfil(){
        $id = $this->session->userdata('idUsuario');
        $data_user= $this->user_model->get_user_data($id);
        $user_academico= $this->user_model->get_user_academico($id);
        $user_institucion= $this->user_model->get_user_institucion($id);
        $data_user= $this->user_model->get_user_data($id);
        $datos = array(
            'id'            => $id,
            'nombre'        => $data_user->Nombre,
            'apaterno'      => $data_user->ApPaterno,
            'amaterno'      => $data_user->ApMaterno,
            'correo'        => $data_user->Correo,
            'pais'          => $data_user->Pais,
            'fechaNac'      => $data_user->Nacimiento,
            'telefono'      => $data_user->Telefono,
            'sexo'          => $data_user->Sexo,
            'img'           => $data_user->Img,
            'grado'         =>$user_academico->Grado,
            'cuerpoA'       =>$user_academico->cuerpoAcademico,
            'consolidacion' =>$user_academico->consolidacionCA,
            'promep'        =>$user_academico->perfilPROMEP,
            'sni'           =>$user_academico->nivelSNI,
            'areaC'         =>$user_academico->areaConocimiento,
            'institucion'   =>$user_institucion->Nombre,
            'unidad'        =>$user_institucion->UAcademica,
            'paisInst'      =>$user_institucion->Pais,
            'estadoInst'    =>$user_institucion->Estado,
            'ciudadInst'     =>$user_institucion->Ciudad
        );
        $this->load->view('helpers/headerUsuario');
        $this->load->view('perfilUsuario',$datos);
        $this->load->view('helpers/footer');
    }

}
