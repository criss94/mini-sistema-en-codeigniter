<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Usuario_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function addUser($user)
        {
            $campos = array(
                'usu_nombre'=>$user['usu_nombre'],
                'usu_clave'=>$user['usu_clave'],
                'idpersona'=>$user['idpersona']
            );
            $this->db->insert('usuario',$campos);
        }

        public function editPersona($user,$id)
        {
            $campos = array(
                'usu_nombre'=>$user['usu_nombre'],
                'usu_clave'=>$user['usu_clave'],
            );
            $this->db->where('idpersona',$id);
            $this->db->update('usuario',$campos);
        }

        public function eliminarPersona($id)
        {
            $this->db->where('idpersona',$id);
            $this->db->delete('usuario');
        }

        public function editPerfil($user)
        {
            $campos = array(
                'usu_nombre'=>$user['usu_nombre'],
                'usu_clave'=>$user['usu_clave'],
            );
            $this->db->where('idpersona',$this->session->userdata('idpersona'));
            $this->db->update('usuario',$campos);
        }
    }