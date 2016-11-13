<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Producto_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function listarProductos()
        {
            $this->db->select('p.prd_id,p.prd_nombre,p.prd_descripcion,p.prd_precio,p.cat_id,c.cat_id,c.cat_nombre,p.prd_foto1');
            $this->db->from('productos p');
            $this->db->join('categorias c','c.cat_id = p.cat_id');
            $data = $this->db->get();
            return $data;
        }
        public function listarProductosConAjax()
        {
            $this->db->select('p.prd_id,p.prd_nombre,p.prd_descripcion,p.prd_precio,p.cat_id,c.cat_id,c.cat_nombre,p.prd_foto1');
            $this->db->from('productos p');
            $this->db->join('categorias c','c.cat_id = p.cat_id');
            $data = $this->db->get();
            return $data->result();
        }

        public function listarProductosConAjaxEnTiempoReal($campo)
        {
            $this->db->select('p.prd_id,p.prd_nombre,p.prd_descripcion,p.prd_precio,p.cat_id,c.cat_id,c.cat_nombre,p.prd_foto1');
            $this->db->from('productos p');
            $this->db->join('categorias c','c.cat_id = p.cat_id');
            $this->db->like('p.prd_nombre',$campo,'both');
            $data = $this->db->get();
            return $data->result();
        }

        public function listarCategorias()
        {
            $data = $this->db->get('categorias');
            return $data->result();
        }

        public function listarCategoriasSinAjax()
        {
            $data = $this->db->get('categorias');
            return $data;
        }

        public function agregarProductos($product,$imagen)
        {
            $campos = array(
                'prd_nombre'=>$product['prd_nombre'],
                'prd_descripcion'=>$product['prd_descripcion'],
                'prd_precio'=>$product['prd_precio'],
                'cat_id'=>$product['cat_id'],
                'prd_foto1'=>$imagen
            );
            $this->db->insert('productos',$campos);
        }

        public function verProductosPorID($id)
        {
            $this->db->select('prd_id,prd_nombre,prd_descripcion,prd_precio,cat_id,prd_foto1');
            $this->db->from('productos');
            $this->db->where('prd_id',$id);
            $data = $this->db->get();
            return $data->row();
        }

        public function editarProducto($product,$imagen,$id)
        {
            $campos = array(
                'prd_nombre'=>$product['prd_nombre'],
                'prd_descripcion'=>$product['prd_descripcion'],
                'prd_precio'=>$product['prd_precio'],
                'cat_id'=>$product['cat_id'],
                'prd_foto1'=>$imagen
            );
            $this->db->where('prd_id',$id);
            $this->db->update('productos',$campos);
        }

        public function editarProductoSinFoto($product,$id)
        {
            $campos = array(
                'prd_nombre'=>$product['prd_nombre'],
                'prd_descripcion'=>$product['prd_descripcion'],
                'prd_precio'=>$product['prd_precio'],
                'cat_id'=>$product['cat_id']
            );
            $this->db->where('prd_id',$id);
            $this->db->update('productos',$campos);
        }

        public function eliminarProducto($id)
        {
            $this->db->where('prd_id',$id);
            $this->db->delete('productos');
        }

        public function buscarProducto($palabra,$cat_id)
        {
            $this->db->select('p.prd_id,p.prd_nombre,p.prd_descripcion,p.prd_precio,p.cat_id,c.cat_id,c.cat_nombre,p.prd_foto1');
            $this->db->from('productos p');
            $this->db->join('categorias c','c.cat_id = p.cat_id');
            $this->db->like('p.prd_nombre',$palabra,'both');
            if ($cat_id != 0){
                $this->db->like('c.cat_id',$cat_id);
            }
            $data = $this->db->get();
            return $data->result();
        }
    }