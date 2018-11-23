<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function altaNoticia($datos)
    {
        $this->db->insert('Noticias',array('idUsuarios'=> $datos['id'],
        'Titulo'=>$datos['titulo'],'Descripcion'=>$datos['contenido'],
        'Fecha'=>$datos['fecha'],'img'=>$datos['imagen']));
    }

    public function uploadimg($query)
    {
        $this->db->query($query);
    }

    public function update_prf($id, $data, $dataca, $datain)
    {
        $this->db->where('idUsuarios', $id);
        $this->db->update('Usuarios', $data);
        $this->db->update('infoAcademica', $dataca);
        $this->db->update('institucion', $datain);
    }
    public function get_user_data($id)
    {
        $q = $this->db->select('*')->from('Usuarios')->where('idUsuarios',$id)->get();
        return $q->row();
    }
    public function get_user_academico($id)
    {
        $q = $this->db->select('*')->from('Infoacademica')->where('idUsuario',$id)->get();
        return $q->row();
    }
    public function get_user_institucion($id)
    {
        $q = $this->db->select('*')->from('Institucion')->where('idUsuario',$id)->get();
        return $q->row();
    }
    public function misNoticias($id)
    {
        $this->db->select('idNoticias,Titulo,Fecha,Descripcion,img')->from('Noticias')->where('idUsuarios >=', $id)->order_by("Fecha", "desc")->order_by("idNoticias", "desc");
        $query = $this->db->get();
        if($query->num_rows() > 0 ) return $query;
        else return false;
    }

    public function eliminar($id)
    {
        return $this->db->delete( 'Noticias' ,  array ( 'idNoticias'  =>  $id ));
    }

    public function obtenerNoticia($id)
    {
        $this->db->select('Titulo,Fecha,Descripcion,img')->from('Noticias')->where('idNoticias >=', $id);
        $query = $this->db->get();
        if($query->num_rows() > 0 ) return $query;
        else return false;
    }

    public function getImg($id)
    {
        $query = 'SELECT img FROM Noticias WHERE idNoticias = '.$id;
        $q = $this->db->query($query);
        return $q;
    }

    public function editarDatosNoticia($query)
    {
        $this->db->query($query);
    }
    public function get_countries()
    {
        $q = $this->db->select('id,name')->from('Countries')->get();
        return $q;
    }
    public function get_regions($id)
    {
        $q = $this->db->select('id,name')->from('Regions')->where('country_id',$id)->get();
        return $q;
    }
}
?>
