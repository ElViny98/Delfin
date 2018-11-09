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

}
?>
