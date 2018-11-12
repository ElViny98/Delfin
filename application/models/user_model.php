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
    public function misNoticias($id){
        $this->db->select('Titulo')->from('noticias')->where('idUsuarios >=', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0 ) return $query;
        else return false;
    }

}
?>
