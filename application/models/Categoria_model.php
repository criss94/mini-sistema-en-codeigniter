<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Categoria_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function listarCategorias()
        {
            $data = $this->db->get('categorias');
            return $data;
        }

        public function addCategoria($cat)
        {
            $campo = array(
                'cat_nombre'=>$cat['cat_nombre']
            );
            $this->db->insert('categorias',$campo);
        }

        public function verCategoriaPorID($id)
        {
            $this->db->select('cat_id,cat_nombre');
            $this->db->from('categorias');
            $this->db->where('cat_id',$id);
            $data = $this->db->get();
            return $data->row();
        }

        public function editCategoria($cat,$id)
        {
            $campo = array(
                'cat_nombre'=>$cat['cat_nombre']
            );
            $this->db->where('cat_id',$id);
            $this->db->update('categorias',$campo);
        }

        public function dropCategoria($id)
        {
            $this->db->select('prd_id,prd_nombre,prd_descripcion,prd_precio,cat_id');
            $this->db->from('productos');
            $this->db->where('cat_id',$id);
            $data = $this->db->get();
            if ($data->num_rows() > 0){
                return false;
            }else{
                $this->db->where('cat_id',$id);
                $this->db->delete('categorias');
            }
        }
    }