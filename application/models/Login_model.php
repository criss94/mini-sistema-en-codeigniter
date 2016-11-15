<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Login_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function verificarUsuario($name)
        {
            $this->db->select('usu_nombre');
            $this->db->from('usuario');
            $this->db->where('usu_nombre',$name);
            $data = $this->db->get();
            if ($data->num_rows() > 0){
                return $data->result();
            }else{
                return 0;
            }
        }

        public function verificarPassword($name,$pass)
        {
            $this->db->select('p.idpersona,p.nombre,p.appaterno,p.apmaterno,p.email,u.idusuario,u.usu_nombre,u.usu_clave,u.idpersona');
            $this->db->from('persona p');
            $this->db->join('usuario u','u.idpersona = p.idpersona');
            $this->db->where('u.usu_nombre',$name);
            $this->db->where('u.usu_clave',$pass);
            $data = $this->db->get();
            if ($data->num_rows() > 0){
                $fila = $data->row();
                $session1 = array(
                    'idusuario'=>$fila->idusuario,
                    'idpersona'=>$fila->idpersona,
                    'usuario'=>$fila->usu_nombre,
                    'nombre'=>$fila->nombre.' '.$fila->appaterno,
                    'login'=>1
                );
                $this->session->set_userdata($session1);
                return 1;
            }else{
                return 0;
            }
        }

        public function verMisDatos()
        {
            $this->db->select('p.idpersona,p.nombre,p.appaterno,p.apmaterno,p.email,p.dni,p.fecnac,p.idciudad,
                               p.imagen,c.ciudad,u.idusuario,u.usu_nombre,u.usu_clave,u.idpersona');
            $this->db->from('persona p');
            $this->db->join('ciudad c','c.idciudad = p.idciudad');
            $this->db->join('usuario u','u.idpersona = p.idpersona');
            $this->db->where('p.idpersona',$this->session->userdata('idpersona'));
            $data = $this->db->get();
            return $data->result();
        }

        public function dropLoginUsuario()
        {
            $this->db->where('idpersona',$this->session->userdata('idpersona'));
            $this->db->delete('usuario');
        }

        public function dropLoginPersona()
        {
            $this->db->where('idpersona',$this->session->userdata('idpersona'));
            $this->db->delete('persona');
        }
    }