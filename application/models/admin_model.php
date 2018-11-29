<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_usuarios(){
        $q = $this->db->select('*')->from('Usuarios')->where('Privilegio','2')->get();
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
}
?>
