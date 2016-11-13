<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class ProductoController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Producto_model');
        }

        public function index()
        {
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('producto/panelProductos');
            $this->load->view('templates/pie');
        }

        public function vistaPanelProductos()
        {
            $data['consulta'] = $this->Producto_model->listarProductos();
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('producto/index',$data);
            $this->load->view('templates/pie');
        }

        public function formAddProductos()
        {
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('producto/formAddProductos');
            $this->load->view('templates/pie');
        }

        public function listarCategorias()
        {
            echo json_encode($this->Producto_model->listarCategorias());
        }

        public function agregarProducto()
        {
            $config = array(
                'upload_path'=>'./assets/imagenes/',
                'allowed_types'=>'png|jpg|jpeg|gif',
                'max_size'=>'5000',
                'max_width'=>'2000',
                'max_height'=>'2000'
            );
            $this->load->library('upload',$config);
            if ($this->upload->do_upload('prd_foto1')){
                $file_data = $this->upload->data();
                $name_image = $file_data['file_name'];
                $productos = array(
                    'prd_nombre'=>$this->input->post('prd_nombre'),
                    'prd_descripcion'=>$this->input->post('prd_descripcion'),
                    'prd_precio'=>$this->input->post('prd_precio'),
                    'cat_id'=>$this->input->post('cat_id')
                );
                $this->Producto_model->agregarProductos($productos,$name_image);
            }else{
                $name_image = 'sin-foto.png';
                $productos = array(
                    'prd_nombre' => $this->input->post('prd_nombre'),
                    'prd_descripcion' => $this->input->post('prd_descripcion'),
                    'prd_precio' => $this->input->post('prd_precio'),
                    'cat_id' => $this->input->post('cat_id')
                );
                $this->Producto_model->agregarProductos($productos, $name_image);

            }
        }

        public function formEditProducto()
        {
            $id = $_GET['id'];
            $data['p'] = $this->Producto_model->verProductosPorID($id);
            $data['categorias'] = $this->Producto_model->listarCategoriasSinAjax();
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('producto/formEditProducto',$data);
            $this->load->view('templates/pie');
        }

        public function editarProducto()
        {
            $id = $this->input->post('prd_id');
            $config = array(
                'upload_path'=>'./assets/imagenes/',
                'allowed_types'=>'png|jpg|jpeg|gif',
                'max_size'=>'5000',
                'max_width'=>'2000',
                'max_height'=>'2000'
            );
            $this->load->library('upload',$config);
            if ($this->upload->do_upload('prd_foto1')){
                $file_data = $this->upload->data();
                $name_image = $file_data['file_name'];
                $productos = array(
                    'prd_nombre'=>$this->input->post('prd_nombre'),
                    'prd_descripcion'=>$this->input->post('prd_descripcion'),
                    'prd_precio'=>$this->input->post('prd_precio'),
                    'cat_id'=>$this->input->post('cat_id')
                );
                $this->Producto_model->editarProducto($productos,$name_image,$id);
            }else{
                $id = $this->input->post('prd_id');
                $productos = array(
                    'prd_nombre' => $this->input->post('prd_nombre'),
                    'prd_descripcion' => $this->input->post('prd_descripcion'),
                    'prd_precio' => $this->input->post('prd_precio'),
                    'cat_id' => $this->input->post('cat_id')
                );
                $this->Producto_model->editarProductoSinFoto($productos,$id);
            }
        }

        public function formDropProducto()
        {
            $id = $_GET['id'];
            $data['p'] = $this->Producto_model->verProductosPorID($id);
            $data['categorias'] = $this->Producto_model->listarCategoriasSinAjax();
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('producto/formDropProducto',$data);
            $this->load->view('templates/pie');
        }

        public function eliminarProducto()
        {
            $id = $this->input->post('prd_id');
            $this->Producto_model->eliminarProducto($id);
        }

        public function formBuscar()
        {
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('formBuscar');
            $this->load->view('templates/pie');
        }

        public function buscarProducto()
        {
            $palabra = $this->input->get('query');
            $cat_id = $this->input->get('cat_id');
            echo json_encode($this->Producto_model->buscarProducto($palabra,$cat_id));
        }

    }