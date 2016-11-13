<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Persona_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function listarDatosPersona()
        {
            $this->db->select('p.idpersona,p.nombre,p.appaterno,p.apmaterno,p.email,p.dni,p.fecnac,
                               p.idciudad,p.imagen,c.ciudad,u.usu_nombre,u.usu_clave');
            $this->db->from('persona p');
            $this->db->join('ciudad c','c.idciudad = p.idciudad');
            $this->db->join('usuario u','u.idpersona = p.idpersona');
            $data = $this->db->get();
            return $data;
        }

        public function listarCiudadAjax()
        {
            $data = $this->db->get('ciudad');
            return $data->result();
        }

        public function listarCiudad()
        {
            $data = $this->db->get('ciudad');
            return $data;
        }

        public function addUser($per,$img)
        {
            $campos = array(
                'nombre'=>$per['nombre'],
                'appaterno'=>$per['appaterno'],
                'apmaterno'=>$per['apmaterno'],
                'email'=>$per['email'],
                'dni'=>$per['dni'],
                'fecnac'=>$per['fecnac'],
                'idciudad'=>$per['idciudad'],
                'imagen'=>$img
            );
            $this->db->insert('persona',$campos);
            return $this->db->insert_id();
        }

        public function verUsuarioPorID($id)
        {
            $this->db->select('p.idpersona,p.nombre,p.appaterno,p.apmaterno,p.email,p.dni,p.fecnac,
                               p.idciudad,p.imagen,c.ciudad,u.usu_nombre,u.usu_clave');
            $this->db->from('persona p');
            $this->db->join('ciudad c','c.idciudad = p.idciudad');
            $this->db->join('usuario u','u.idpersona = p.idpersona');
            $this->db->where('p.idpersona',$id);
            $data = $this->db->get();
            return $data->row();
        }

        public function EditPersona($per,$img,$id)
        {
            $campos = array(
                'nombre'=>$per['nombre'],
                'appaterno'=>$per['appaterno'],
                'apmaterno'=>$per['apmaterno'],
                'email'=>$per['email'],
                'dni'=>$per['dni'],
                'fecnac'=>$per['fecnac'],
                'idciudad'=>$per['idciudad'],
                'imagen'=>$img
            );
            $this->db->where('idpersona',$id);
            $this->db->update('persona',$campos);
        }

        public function EditPersonaSinFoto($per,$id)
        {
            $campos = array(
                'nombre'=>$per['nombre'],
                'appaterno'=>$per['appaterno'],
                'apmaterno'=>$per['apmaterno'],
                'email'=>$per['email'],
                'dni'=>$per['dni'],
                'fecnac'=>$per['fecnac'],
                'idciudad'=>$per['idciudad']
            );
            $this->db->where('idpersona',$id);
            $this->db->update('persona',$campos);
        }

        public function eliminarPersona($id)
        {
            $this->db->where('idpersona',$id);
            $this->db->delete('persona');
        }

        public function editPerfil($per,$img)
        {
            $campos = array(
                'nombre'=>$per['nombre'],
                'appaterno'=>$per['appaterno'],
                'apmaterno'=>$per['apmaterno'],
                'email'=>$per['email'],
                'dni'=>$per['dni'],
                'fecnac'=>$per['fecnac'],
                'idciudad'=>$per['idciudad'],
                'imagen'=>$img
            );
            $this->db->where('idpersona',$this->session->userdata('idpersona'));
            $this->db->update('persona',$campos);
        }

        public function editPerfilSinFoto($per)
        {
            $campos = array(
                'nombre'=>$per['nombre'],
                'appaterno'=>$per['appaterno'],
                'apmaterno'=>$per['apmaterno'],
                'email'=>$per['email'],
                'dni'=>$per['dni'],
                'fecnac'=>$per['fecnac'],
                'idciudad'=>$per['idciudad'],
            );
            $this->db->where('idpersona',$this->session->userdata('idpersona'));
            $this->db->update('persona',$campos);
        }
    }