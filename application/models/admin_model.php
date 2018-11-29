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
}
?>
