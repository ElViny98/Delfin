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
        $sql = 'SELECT * FROM Noticias ORDER BY Fecha DESC';
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

    public function generarToken($email, $token)
    {
        $id = $this->db->query('SELECT idUsuarios FROM usuarios WHERE Correo = "'.$email.'";');
        //En caso de que el correo no esté registrado
        if($id->num_rows() == 0)
            return null;

        else
        {
            $id = $id->row();
        }
        $insert = 'INSERT INTO recuperacion VALUES('.$id->idUsuarios.', "'.$token.'");';
        $this->db->query($insert);
        return 1;
    }

    public function updatePass($token, $pass)
    {
        $id = $this->db->query('SELECT idUsuario FROM recuperacion WHERE Token = "'.$token.'";');
        if($id->num_rows() == 0)
            return 0;

        $id = $id->row();

        if($this->db->query('UPDATE Usuarios SET Password = "'.$pass.'" WHERE idUsuarios = '.$id->idUsuario.';'))
        {
            //Para evitar llenar la base de datos de basura y por seguridad,
            //se borran los tokens que ya se usaron anteriormente para recuperar contraseñas.
            $this->db->query('DELETE FROM recuperacion WHERE idUsuario = '.$id->idUsuario);
            return 1;
        }

        else
            return 0;
    }
    public function get_countries()
    {
        $q = $this->db->select('id,name')->from('Countries')->get();
        return $q;
    }
    public function get_instituciones()
    {
        $q = $this->db->select('*')->from('inst')->get();
        return $q;
    }
    public function altaInstitucion($datos){
        $this->db->insert('inst',$datos);
    }
    public function lastInst(){
        $q=$this->db->select('idInstitucion')->from('Inst')->order_by('idInstitucion','DESC')->get();
        return $q->row();
    }
    public function lastUser(){
        $q=$this->db->select('idUsuarios')->from('Usuarios')->order_by('idUsuarios','DESC')->get();
        return $q->row();
    }
    public function altaUser($datos){
        $this->db->insert('Usuarios', $datos);
        if($this->db->affected_rows() > 0) {
            $lastIdUser=$this->lastUser();
            $datos2= array('idUsuario' => $lastIdUser->idUsuarios );
            $this->db->insert('Infoacademica',$datos2);
            if ($this->db->affected_rows() > 0) {
                return '1';
            }else {
                return '0';
            }
        }
        else {
            return '0';
        }
    }
}
?>
