<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function altaNoticia($datos){
      $this->db->insert('noticias',array('idUsuarios'=> $datos['id'],
      'Titulo'=>$datos['titulo'],'Descripcion'=>$datos['contenido'],
      'Fecha'=>$datos['fecha'],'img'=>$datos['imagen']));
    }
    public function uploadimg($datos){
      $this->db->update('usuarios', array('file_name' => $datos['imagen']),"idUsuarios = 2");
    }
    public function get_user_data($id){
      $q = $this->db->select('*')->from('usuarios')->where('idUsuarios',$id)->get();
      return $q->row();
    }

}
?>
