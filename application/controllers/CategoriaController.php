<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class CategoriaController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Categoria_model');
        }

        public function index()
        {
            $data['cat'] = $this->Categoria_model->listarCategorias();
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('categoria/index',$data);
            $this->load->view('templates/pie');
        }

        public function formAddCategoria()
        {
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('categoria/addCategoria');
            $this->load->view('templates/pie');
        }

        public function addCategoria()
        {
            $categoria['cat_nombre'] = $this->input->post('cat_nombre');
            $this->Categoria_model->addCategoria($categoria);
        }

        public function formEditCategoria()
        {
            $id = $_GET['id'];
            $data['cat'] = $this->Categoria_model->verCategoriaPorID($id);
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('categoria/formEditCategoria',$data);
            $this->load->view('templates/pie');
        }

        public function editCategoria()
        {
            $id = $this->input->post('cat_id');
            $categoria['cat_nombre'] = $this->input->post('cat_nombre');
            $this->Categoria_model->editCategoria($categoria,$id);
        }

        public function formDropCategoria()
        {
            $id = $_GET['id'];
            $data['cat'] = $this->Categoria_model->verCategoriaPorID($id);
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('categoria/formDropCategoria',$data);
            $this->load->view('templates/pie');
        }

        public function dropCategoria()
        {
            $id = $this->input->post('cat_id');
            $this->Categoria_model->dropCategoria($id);
        }
    }