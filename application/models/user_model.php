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
        $this->db->select('idNoticias,Titulo,Fecha,Descripcion,img')->from('noticias')->where('idUsuarios >=', $id)->order_by("Fecha", "desc")->order_by("idNoticias", "desc");
        $query = $this->db->get();
        if($query->num_rows() > 0 ) return $query;
        else return false;
    }
    public function eliminar($id){
        return $this->db->delete( 'noticias' ,  array ( 'idNoticias'  =>  $id ));
    }
    public function obtenerNoticia($id){
        $this->db->select('Titulo,Fecha,Descripcion,img')->from('noticias')->where('idNoticias >=', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0 ) return $query;
        else return false;
    }
}
?>
