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
}
?>
