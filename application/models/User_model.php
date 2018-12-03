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

    public function update_prf($id, $data, $dataca)
    {
        $this->db->where('idUsuarios', $id);
        $this->db->update('Usuarios', $data);
        $this->db->update('infoAcademica', $dataca);
    }
    public function update_pass($query)
    {
        if($this->db->query($query))
          return true;

        return false;
    }
    //Jalar datos de los usuarios para perfil
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
        $q = $this->db->select('*')->from('Institucion')->where('idInstitucion',$id)->get();
        return $q->row();
    }
    //fin de datos Perfil usuario
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
    public function get_instituciones($id)
    {
        $q = $this->db->select('*')->from('Institucion')->where('idEst',$id)->get();
        return $q;
    }
    public function get_cities($id, $country)
    {
        $q = $this->db->query('SELECT id, name FROM Cities WHERE region_id = '.$id.' AND country_id = '.$country);
        return $q;
    }
    public function get_name_pais($id){
        $q = $this->db->select('name')->from('Countries')->where('id',$id)->get();
        return $q;
    }
    public function get_name_estado($id){
        $q = $this->db->select('name')->from('Regions')->where('id',$id)->get();
        return $q;
    }
    public function get_name_ciudad($id){
        $q = $this->db->select('name')->from('Cities')->where('id',$id)->get();
        return $q;
    }

    public function getInvestigaciones($id)
    {
        $query = $this->db->query('SELECT * FROM Investigaciones WHERE idUsuario = '.$id);
        return $query;
    }
    public function getFeedNot(){//youre here
     $this->db->select('img, Descripcion, Fecha, Titulo');
      return $this->db->get('noticias')->result();
    }
    public function nuevaInv($data)
    {
        $this->db->insert('Investigaciones', $data);
    }
}
?>
