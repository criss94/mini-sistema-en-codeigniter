<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class IndexController extends CI_Controller
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
            $this->load->view('index');
            $this->load->view('templates/pie');
        }

        public function listarProductosConAjax()
        {
            echo json_encode($this->Producto_model->listarProductosConAjax());
            sleep(1);
        }

        public function listarProductosConAjaxEnTiempoReal()
        {
            $campo = $this->input->post('campo');
            echo json_encode($this->Producto_model->listarProductosConAjaxEnTiempoReal($campo));
        }
    }
