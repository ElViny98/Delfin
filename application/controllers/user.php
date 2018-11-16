<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library(array('session'));
        $this->load->library('image_lib');
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
        $this->load->view('user/misNoticias',$datos);
        $this->load->view('helpers/footer');
    }
    public function editar_perfil(){
      $data = $this->user_model->get_user_data(2);
      $this->load->view('helpers/headerUsuario');
      $this->load->view('editprofile', array('data' => $data));
    }

    function update_prof() {
      $id= $this->input->post('Id');
      $data = array(
      'Nombre' => $this->input->post('name'),
      'Correo' => $this->input->post('mail'),
      'Ciudad' => $this->input->post('city'),
      'Pais' => $this->input->post('country')
    );
    $this->user_model->update_prf($id,$data);
    }

    public function datosNoticia(){

        $this->load->library('upload');
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'jpg|png';
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
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] =TRUE;
        $this->upload->initialize($config);
        if($this->upload->do_upload('userfile'))
        {
          $image_path = $this->upload->data();
          $this->resize_image($image_path);//quiero mandar la imagen por esta funcion para que se ajuste a una medida de 300x300
            $datos = array(
                'imagen' => $config['upload_path'].$image_path['file_name'],//creo que este es el path.
              );

            $this->user_model->uploadimg($datos);
            redirect('/inicio/iniciarUsuario');
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
            $config['allowed_types'] = 'jpg|png';
            $config['overwrite'] = TRUE;
            echo $i->img;
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
        $this->load->view('helpers/headerUsuario');
        $this->load->view('editarNoticia',$data);
        $this->load->view('helpers/footer');
    }

}
