<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_usuarios($query){
        $q = $this->db->query($query);
        return $q;
    }

    public function bloquearPermiso($id, $p)
    {
        $q = $this->db->query('UPDATE Usuarios SET Status = '.$p.' WHERE idUsuarios = '.$id);
        return $q;
    }
    public function get_instituciones(){
      $q = $this->db->select('*')->from('inst')->get();
      return $q;
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

    public function getConfig()
    {
        return $this->db->query('SELECT * FROM Mantenimiento');
    }
}
?>
