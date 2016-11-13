<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class PersonaController extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Persona_model');
            $this->load->model('Usuario_model');
        }

        public function index()
        {
            $data['persona'] = $this->Persona_model->listarDatosPersona();
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('persona/index',$data);
            $this->load->view('templates/pie');
        }

        public function formAddUser()
        {
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('persona/formAddUser');
            $this->load->view('templates/pie');
        }

        public function listarCiudadAjax()
        {
            echo json_encode($this->Persona_model->listarCiudadAjax());
        }

        public function addUser()
        {
            $config = array(
                'upload_path'=>'./assets/imgUser/',
                'allowed_types'=>'png|gif|jpg|jpeg',
                'max_size'=>'5000',
                'max_width'=>'2000',
                'max_height'=>'2000'
            );
            $this->load->library('upload',$config);
            if ($this->upload->do_upload('imagen')){
                $file_data = $this->upload->data();
                $name_image = $file_data['file_name'];

                $persona = array(
                    'nombre'=>$this->input->post('nombre'),
                    'appaterno'=>$this->input->post('appaterno'),
                    'apmaterno'=>$this->input->post('apmaterno'),
                    'email'=>$this->input->post('email'),
                    'dni'=>$this->input->post('dni'),
                    'fecnac'=>$this->input->post('fecnac'),
                    'idciudad'=>$this->input->post('idciudad'),
                );
                $usuario = array(
                    'usu_nombre'=>$this->input->post('usu_nombre'),
                    'usu_clave'=>sha1($this->input->post('usu_clave')),
                );

                $lastID = $this->Persona_model->addUser($persona,$name_image);
                if ($lastID > 0){
                    $usuario['idpersona']=$lastID;
                    $this->Usuario_model->addUser($usuario);
                }
            }else{
                $name_image = 'sin-foto.png';
                $persona = array(
                    'nombre'=>$this->input->post('nombre'),
                    'appaterno'=>$this->input->post('appaterno'),
                    'apmaterno'=>$this->input->post('apmaterno'),
                    'email'=>$this->input->post('email'),
                    'dni'=>$this->input->post('dni'),
                    'fecnac'=>$this->input->post('fecnac'),
                    'idciudad'=>$this->input->post('idciudad'),
                );
                $usuario = array(
                    'usu_nombre'=>$this->input->post('usu_nombre'),
                    'usu_clave'=>sha1($this->input->post('usu_clave')),
                );

                $lastID = $this->Persona_model->addUser($persona,$name_image);
                if ($lastID > 0){
                    $usuario['idpersona']=$lastID;
                    $this->Usuario_model->addUser($usuario);
                }
            }
        }

        public function verUsuarioPorID()
        {
            $id = $_GET['id'];
            $data['u'] = $this->Persona_model->verUsuarioPorID($id);
            $data['ciudad'] = $this->Persona_model->listarCiudad();
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('persona/formEditUser',$data);
            $this->load->view('templates/pie');
        }

        public function verUsuarioPorIDDrop()
        {
            $id = $_GET['id'];
            $data['u'] = $this->Persona_model->verUsuarioPorID($id);
            $data['ciudad'] = $this->Persona_model->listarCiudad();
            $this->load->view('templates/encabezado');
            $this->load->view('templates/menu');
            $this->load->view('persona/formDropUser',$data);
            $this->load->view('templates/pie');
        }

        public function editPersona()
        {
            $config = array(
                'upload_path'=>'./assets/imgUser/',
                'allowed_types'=>'png|jpg|jpeg|gif',
                'max_size'=>'5000',
                'max_width'=>'2000',
                'max_height'=>'2000'
            );
            $this->load->library('upload',$config);
            if ($this->upload->do_upload('imagen')){
                $file_data = $this->upload->data();
                $name_file = $file_data['file_name'];
                $id = $this->input->post('idpersona');

                $persona = array(
                    'nombre'=>$this->input->post('nombre'),
                    'appaterno'=>$this->input->post('appaterno'),
                    'apmaterno'=>$this->input->post('apmaterno'),
                    'email'=>$this->input->post('email'),
                    'dni'=>$this->input->post('dni'),
                    'fecnac'=>$this->input->post('fecnac'),
                    'idciudad'=>$this->input->post('idciudad'),
                );
                $usuario = array(
                    'usu_nombre'=>$this->input->post('usu_nombre'),
                    'usu_clave'=>sha1($this->input->post('usu_clave'))
                );

                $this->Persona_model->editPersona($persona,$name_file,$id);
                $this->Usuario_model->editPersona($usuario,$id);

            }else{
                $id = $this->input->post('idpersona');
                $persona = array(
                    'nombre'=>$this->input->post('nombre'),
                    'appaterno'=>$this->input->post('appaterno'),
                    'apmaterno'=>$this->input->post('apmaterno'),
                    'email'=>$this->input->post('email'),
                    'dni'=>$this->input->post('dni'),
                    'fecnac'=>$this->input->post('fecnac'),
                    'idciudad'=>$this->input->post('idciudad')
                );
                $usuario = array(
                    'usu_nombre'=>$this->input->post('usu_nombre'),
                    'usu_clave'=>sha1($this->input->post('usu_clave'))
                );

                $this->Persona_model->editPersonaSinfoto($persona,$id);
                $this->Usuario_model->editPersona($usuario,$id);
            }
        }

        public function eliminarPersona()
        {
            $id = $this->input->post('idpersona');
            $this->Usuario_model->eliminarPersona($id);
            $this->Persona_model->eliminarPersona($id);
        }

    }


































