<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class iniciar extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }
    /**
     * Función que se encarga de la lógica de inicio de sesión.
     * Los parámetros que recibe son el correo electrónico y la contraseña
     * Retorna un arreglo con los datos del usuario en caso de un inicio correcto.
     * Es llamada desde el controlador de "inicio"
     */
    public function iniciar($user, $pass)
    {
        $sql = 'SELECT * FROM Usuarios WHERE Correo = "'. $user . '" AND Password = "' . $pass . '";';
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
            return $query->row();

        else
            return null;
    }


  public function File_upload($data) {
    $this->db->insert('usuarios',$data);
    }

    public function noticias()
    {
        $sql = 'SELECT * FROM noticias ORDER BY Fecha DESC';
        $query = $this->db->query($sql);
        if($query->num_rows() > 0)
            return $query;

        else
            return null;
    }

    public function getNoticia($id)
    {
        $sql = 'SELECT * FROM noticias WHERE idNoticias = '.$id.';';
        $query = $this->db->query($sql);
        return $query->row();
    }

    public function buscarNoticia($param)
    {
        $sql = 'SELECT DISTINCT Titulo, Descripcion FROM noticias WHERE Titulo LIKE "%'.$param.'%"
        OR Descripcion LIKE "%'.$param.'";';
        $query = $this->db->query($sql);
        return $query;
    }
}
?>
