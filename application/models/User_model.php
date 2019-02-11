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
    public function getNoticiasTodas()
    {
        $sql = 'SELECT * FROM noticias ';
        $query = $this->db->query($sql);
        return $query;
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
        $q = $this->db->select('*')->from('usuarios')->where('idUsuarios',$id)->get();
        return $q->row();
    }
    public function get_user_academico($id)
    {
        $q = $this->db->select('*')->from('infoacademica')->where('idUsuario',$id)->get();
        return $q->row();
    }
    public function get_user_institucion($id)
    {
        $q = $this->db->select('*')->from('Inst')->where('idInstitucion',$id)->get();
        return $q->row();
    }
    //fin de datos Perfil usuario
    public function misNoticias($id)
    {
        return $this->db->query('SELECT * FROM Noticias WHERE idUsuarios = '.$id);
    }

    public function eliminar($id)
    {
        return $this->db->delete( 'Noticias' ,  array ( 'idNoticias'  =>  $id ));
    }

    public function obtenerNoticia($id)
    {
        $this->db->select('Titulo,Fecha,Descripcion,img')->from('Noticias')->where('idNoticias >=', $id);//?? solo jala la noticia de el idNoticia que es dado
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
        $q = $this->db->select('*')->from('Inst')->where('idEst',$id)->get();
        return $q;
    }
    public function get_cp($id)
    {
        $q = $this->db->select('cp')->from('Inst')->where('idInstitucion',$id)->get();
        return $q->row();
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
      $sql = 'SELECT * FROM Investigaciones WHERE idUsuario='.$id.' ORDER BY Fecha DESC' ;
      $query = $this->db->query($sql);
      return $query;
    }
    public function get_user_noticias($id){//youre here
      $sql = 'SELECT * FROM Noticias WHERE idUsuarios='.$id.' ORDER BY Fecha DESC' ;
      $query = $this->db->query($sql);
      return $query;
    }
    public function nuevaInv($data)
    {
        $this->db->insert('Investigaciones', $data);
        return $this->db->query('SELECT MAX(idInvestigaciones) as idInvestigaciones FROM Investigaciones')->row();
    }

    public function publicacionesRecientes()
    {
        $queryNoticias = 'SELECT Usuarios.idUsuarios,Usuarios.Nombre, Usuarios.ApPaterno, Usuarios.ApMaterno, Usuarios.Img, Noticias.idNoticias, Noticias.Titulo, Noticias.img ,Noticias.Descripcion,Noticias.Fecha FROM Noticias, Usuarios WHERE  Noticias.idUsuarios = Usuarios.idUsuarios ORDER BY Noticias.Fecha DESC';
        $queryInvestigaciones = 'SELECT Usuarios.Img, Usuarios.Nombre, Usuarios.ApPaterno, Usuarios.ApMaterno, Investigaciones.Titulo, Investigaciones.Hash FROM Usuarios, Investigaciones WHERE Investigaciones.idUsuario = Usuarios.idUsuarios';
        $queryInvestigadores = 'SELECT Usuarios.Nombre, Usuarios.ApPaterno, Usuarios.ApMaterno From Usuarios';
        return array(
            'Noticias' => $this->db->query($queryNoticias),
            'Investigaciones' => $this->db->query($queryInvestigaciones),
            'Investigadores' => $this->db->query($queryInvestigadores)
        );
    }

    public function autoresUsuarios()
    {
        return $this->db->query('SELECT Nombre FROM Autores');
    }

    public function invAutor($query)
    {
        return $this->db->query($query);
    }

    public function newAutor($data)
    {
        $this->db->insert('Autores', $data);
    }
    //reciente 07/02/2019

}
?>
