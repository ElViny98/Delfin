<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library(array('session', 'image_lib'));
        $this->load->helper('file');
    }
    public function index()
    {
        if($this->session->userdata('nivel') == 2)
        {
            $data['privilegio'] = 2;
            $this->load->view('helpers/headerAdmin', $data);
        }
        else
        {
            redirect(base_url());
        }
    }
    public function home(){
      $this->load->view('helpers/headerUsuario');//comentar esto para blogview 2.0
      $this->datos_PerfilUsuario();
    }
    public function datos_PerfilUsuario(){//acuerdense que esta funcion recibira el id del usuario que se desea visualizar su perfil
      //$id = $this->session->userdata('idUsuario');
      $id = $_GET['id'];
      $data_user = $this->user_model->get_user_data($id);//porque esta otra vez?
      $user_academico = $this->user_model->get_user_academico($id);
      $user_noticias = $this->user_model->get_user_noticias($id);
      $user_institucion = $this->user_model->get_user_institucion($data_user->idInstitucion);
      $user_investigaciones=$this->user_model->getInvestigaciones($id);
      $datos = array(
          //'id'            => $id,
          'nombre'        => $data_user->Nombre,
          'apaterno'      => $data_user->ApPaterno,
          'amaterno'      => $data_user->ApMaterno,
          'correo'        => $data_user->Correo,
          'pais'          => $data_user->Pais,
          'fechaNac'      => $data_user->Nacimiento,
          'telefono'      => $data_user->Telefono,
          'sexo'          => $data_user->Sexo,
          'img'           => $data_user->Img,
          'noticias'      => $user_noticias,
          'idInst'        => $data_user->idInstitucion,
          'grado'         => $user_academico->Grado,
          'cuerpoA'       => $user_academico->cuerpoAcademico,
          'consolidacion' => $user_academico->consolidacionCA,
          'promep'        => $user_academico->perfilPROMEP,
          'sni'           => $user_academico->nivelSNI,
          'areaC'         => $user_academico->areaConocimiento,
          'unidad'        => $user_academico->UAcademica,
          'institucion'   => $user_institucion->Nombre,
          'paisInst'      => $user_institucion->Pais,
          'estadoInst'    => $user_institucion->Estado,
          'ciudadInst'    => $user_institucion->cp,
          'investigaciones' =>$user_investigaciones,
      );
      $this->load->view('blogview',$datos);
    }
    public function Noticias()
    {
        $this->load->view('altaNoticia');
    }
    public function Noticias_MisNoticias(){
        $datos['consulta'] = $this->user_model->misNoticias($this->session->userdata('idUsuario'));
        $this->load->view('user/misNoticias',$datos);
    }
    function update_prof()
    {
      $id= $this->session->userdata('idUsuario');
      $data = array(
            'Nombre' => $this->input->post('name'),
            'ApPaterno' => $this->input->post('appaterno'),
            'ApMaterno' => $this->input->post('apmaterno'),
            'Sexo' => $this->input->post('sexo'),
            'Nacimiento' => $this->input->post('fechanaci'),
            'Pais' => $this->input->post('pais'),
            'Telefono' => $this->input->post('telefono'),
            'Correo' => $this->input->post('correo'),
            'idInstitucion'    => $this->input->post('inst'),
          );
            //infoAcademica grado: gra, cuerp: cue, consolidacion: con, promep: pro, Sni: sni, area: are,
            $dataca = array(
            'Grado' => $this->input->post('grado'),
            'cuerpoAcademico' => $this->input->post('cuerp'),
            'consolidacionCA' => $this->input->post('consolidacion'),
            'perfilPROMEP' => $this->input->post('promep'),
            'nivelSNI' => $this->input->post('Sni'),
            'areaConocimiento' => $this->input->post('area'),
            'UAcademica' => $this->input->post('unidad'),
          );
        $this->user_model->update_prf($id,$data,$dataca);
    }
    public function update_pass(){
      $id= $this->session->userdata('idUsuario');
      $data = $this->input->post('newPass');
      $query='UPDATE Usuarios SET Password="'.$data.'" WHERE idUsuarios='.$id ;
      if($this->user_model->update_pass($query)){
        echo 1;
      }
      else {
        echo 0;
      }
    }
    public function datosNoticia()
    {
            $fechaActual = date('Y-m-d');
            $datos = array(
                'id' => $this->session->userdata('idUsuario'),
    			'titulo' => $this->input->post('txtTitulo'),
                'contenido' => $this->input->post('content'),
                'fecha' => $fechaActual
    		);
            $this->user_model->altaNoticia($datos);
            //Usado para evaluar desde javascript que todo haya ido bien
            echo '1';
    }
    public function eliminarNoticia(){
        $id = $this->input->get('id');
        //Las noticias no llevarán imágenes, esta parte quedará sin uso.
        // $path = 'assets/img/';
        // $img = $this->user_model->getImg($id);
        // $img = $img->row();
        // $del = $path.$img->img;
        // //Si ocurre un error durante el borrado de la imagen se detiene la ejecución.
        // if(!unlink($del))
        //     return;
        if($this->user_model->eliminar($id))
            echo "1";
        else
            echo "0";
    }
    public function upload_img(){
        $this->load->library('upload');
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'jpg|png|jpeg|gif';
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
              $query = 'UPDATE Usuarios SET ';
              $query.= 'img = "'.$datos['imagen'].'" WHERE idUsuarios = '.$datos['id'];
            $this->user_model->uploadimg($query);
            echo $datos['imagen'];
            //si usamos solo esto se redirige a home sin crashear.
            //redirect(base_url('index.php/user/Perfil')); no detecta el jquery ni los estilos de BStrp
        }
        else
        {
            echo $this->upload->display_errors();
        }
    }
    public function resize_image($image_data){
        $this->load->library('image_lib');
        $w = $image_data['image_width']; // original image's width
        $h = $image_data['image_height']; // original images's height
        $n_w = 300; // destination image's width
        $n_h = 300; // destination image's height
        $source_ratio = $w / $h;
        $new_ratio = $n_w / $n_h;
        if($source_ratio != $new_ratio){
            $config['image_library'] = 'gd2';
            $config['source_image'] = 'assets/img/500x500.png';
            $config['maintain_ratio'] = FALSE;
            if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))){
                $config['width'] = $w;
                $config['height'] = round($w/$new_ratio);
                $config['y_axis'] = round(($h - $config['height'])/2);
                $config['x_axis'] = 0;
            } else {
                $config['width'] = round($h * $new_ratio);
                $config['height'] = $h;
                $size_config['x_axis'] = round(($w - $config['width'])/2);
                $size_config['y_axis'] = 0;
            }
            $this->image_lib->initialize($config);
            $this->image_lib->crop();
            $this->image_lib->clear();
        }
        $config['image_library'] = 'gd2';
        $config['source_image'] = 'assets/img/500x500.png';
        $config['new_image'] = 'assets/img/resized_image.jpg';
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $n_w;
        $config['height'] = $n_h;
        $this->image_lib->initialize($config);
        if (!$this->image_lib->resize()){
            echo $this->image_lib->display_errors();
        } else {
            echo "done";
        }
    }
    public function editarDatosNoticia()
    {
        $data = array(
            'id' => $this->input->get('id'),
            'titulo' => $this->input->post('txtTitulo'),
            'contenido' => $this->input->post('content')
        );
        $query = 'UPDATE Noticias SET ';
            $query.= 'Titulo = "'.$data['titulo'].'", Descripcion = "'.$data['contenido'].'" WHERE idNoticias = '.$data['id'];
            $this->user_model->editarDatosNoticia($query);
            echo '1';
    }
    //Función que crea una cadena aleatoria de 24 caracteres para el nombre de un archivo.
    private function createHash()
    {
        $len = 24;
        for($s = '', $i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')-1; $i != $len; $x = rand(0, $z), $s .= $a{$x}, $i++);
        return $s;
    }
    public function editarNoticia()
    {
        $id = $_GET['id'];
        $datos = $this->user_model->obtenerNoticia($id);
        $d = $datos->row();
        $data = array(
            'id'            => $id,
            'titulo'        => $d->Titulo,
            'descripcion'   => $d->Descripcion,
            'img'           => $d->img
        );
        $this->load->view('editarNoticia',$data);
    }
    public function Perfil(){
        $id = $this->session->userdata('idUsuario');
        $data_user= $this->user_model->get_user_data($id);//Aqui
        $user_academico= $this->user_model->get_user_academico($id);
        $user_institucion= $this->user_model->get_user_institucion($data_user->idInstitucion);
        $data_user= $this->user_model->get_user_data($id);//porque esta otra vez?
        $paises=$this->user_model->get_countries();
        $estados=$this->user_model->get_regions($user_institucion->idPais);
        $instituciones=$this->user_model->get_instituciones($user_institucion->idEst);
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
            'password'      => $data_user->Password, //news
            'idInst'        => $data_user->idInstitucion,
            'grado'         => $user_academico->Grado,
            'cuerpoA'       => $user_academico->cuerpoAcademico,
            'consolidacion' => $user_academico->consolidacionCA,
            'promep'        => $user_academico->perfilPROMEP,
            'sni'           => $user_academico->nivelSNI,
            'areaC'         => $user_academico->areaConocimiento,
            'unidad'        => $user_academico->UAcademica,
            'institucion'   => $user_institucion->Nombre,
            'paisInst'      => $user_institucion->Pais,
            'estadoInst'    => $user_institucion->Estado,
            'ciudadInst'    => $user_institucion->cp,
            'countries'     => $paises,
            'regions'       => $estados,
            'instituciones' => $instituciones
        );
       // $this->load->view('helpers/headerUsuario');
        $this->load->view('perfilUsuario',$datos);
    }
    public function getRegions()
    {
        $q = $this->user_model->get_regions($this->input->get('countryId'));
        echo '<option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>';
        foreach($q->result() as $regions)
        {
            echo '<option value="'.$regions->id.'">'.$regions->name.'</option>';
        }
    }
    public function getInstituciones()
    {
        $q = $this->user_model->get_instituciones($this->input->get('regionId'));
        echo '<option value="0" disabled="disabled" selected="selected">Seleccionar opción...</option>';
        foreach($q->result() as $inst)
        {
            echo '<option value="'.$inst->idInstitucion.'">'.$inst->Nombre.'</option>';
        }
    }
    public function getCP()
    {
        $q = $this->user_model->get_cp($this->input->get('instId'));
        echo $q->cp;
    }
    public function imagenNoticia()
    {
        $this->load->library('upload');
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $this->upload->initialize($config);
    }
    private function setImageOptions()
    {
        $config = array();
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG';
        $config['file_name'] = $this->createHash().'-1';
        return $config;
    }
    public function investigaciones()
    {
        $data = array(
            'investigaciones'   => $this->user_model->getInvestigaciones($this->session->userdata('idUsuario'))
        );
        $this->load->view('user/investigaciones', $data);
    }
    public function nuevaInvestigacion()
    {
        $q = $this->user_model->autoresUsuarios();
        if($q->num_rows() > 0)
        {
            $data['autores'] = $q;
            $this->load->view('user/nuevaInvestigacion', $data);
        }
        else
            $this->load->view('user/nuevaInvestigacion');
    }
    public function editarInvestigacion()
    {
        $data['investigacion'] = $this->user_model->getInvestigacion($this->input->get('id'));
        $data['autores'] = $this->user_model->getAutoresInv($this->input->get('id'));
        $data['id'] = $this->input->get('id');
        $this->load->view('user/editarInvestigacion', $data);
    }

    public function editarInv()
    {
        print_r($_POST);
        $invData = array(
            'Tipo'              => $this->input->post('tipo'),
            'Titulo'            => $this->input->post('titulo'),
            'Fecha'             => $this->input->post('fechaInv'),
            'Tema'              => $this->input->post('tema'),
            'Hash'              => $this->input->post('hash'),
            'idInvestigaciones' => $this->input->post('id')
        );
        $this->user_model->updateInv($invData);
    }
    public function registrarInv()
    {
        //var_dump($_FILES);
        $name = $this->createHash();
        $data = array(
            'idUsuario'             => $this->session->userdata('idUsuario'),
            'Hash'                  => $name.'.pdf',
            'Fecha'                 => $this->input->post('fechaInv'),
            'Titulo'                => $this->input->post('titulo'),
            //'DOI'                   => 'null',
            'Tema'                  => $this->input->post('tema'),
            'Tipo'                  => $this->input->post('tipo')
        );
        $config['file_name'] = $name;
        $config['allowed_types'] = '*';
        $config['upload_path'] = 'assets/documents';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('archivoInv'))
        {
            $newId = $this->user_model->nuevaInv($data);
            if(isset($_POST['autores']))
            {
                $query = 'INSERT INTO AutoresInv VALUES (';
                for($i = 1; $i<count($_POST['autores']); $i++)
                {
                    if($i == count($_POST['autores']) - 1)
                        $query.='(SELECT DISTINCT idAutores FROM Autores WHERE Nombre = "'.$_POST['autores'][$i].'"), '.$newId->idInvestigaciones.')';
                    else
                        $query.='(SELECT DISTINCT idAutores FROM Autores WHERE Nombre = "'.$_POST['autores'][$i].'"), '.$newId->idInvestigaciones.'), (';
                }
                $query.=';';
                $this->user_model->invAutor($query);
            }
            if(isset($_POST['autoresNuevos']))
            {
                for($i = 0; $i<count($_POST['autoresNuevos']); $i++)
                {
                    $data = array(
                        'Nombre'    => $_POST['autoresNuevos'][$i],
                        //'idAutores'=> $this->session->userdata('idUsuario')
                    );
                    $this->user_model->newAutor($data);
                }
                $query = 'INSERT INTO AutoresInv VALUES (';
                for($i = 0; $i<count($_POST['autoresNuevos']); $i++)
                {
                    if($i == count($_POST['autoresNuevos']) - 1)
                        $query.='(SELECT idAutores FROM Autores WHERE Nombre = "'.$_POST['autoresNuevos'][$i].'"), '.$newId->idInvestigaciones.')';
                    else
                        $query.='(SELECT idAutores FROM Autores WHERE Nombre = "'.$_POST['autoresNuevos'][$i].'"), '.$newId->idInvestigaciones.'), (';
                }
                $query.=';';
                $this->user_model->invAutor($query);
            }
        }
        else
            echo $this->upload->display_errors();
    }
    function inicio()
    {
        $publicaciones = $this->user_model->publicacionesRecientes();
        $data['noticias'] = $publicaciones['Noticias'];
        $data['investigaciones'] = $publicaciones['Investigaciones'];
        $data['Investigadores'] = $publicaciones['Investigadores'];
        $this->load->view('user/fedInicio', $data);
    }
}