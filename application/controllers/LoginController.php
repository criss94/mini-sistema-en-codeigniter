<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class LoginController extends CI_Controller
 {
     public function __construct()
     {
         parent::__construct();
         $this->load->model('Login_model');
         $this->load->model('Persona_model');
         $this->load->model('Usuario_model');
     }

     public function index()
     {
         $this->load->view('templates/encabezado');
         $this->load->view('templates/menu');
         $this->load->view('admin');
         $this->load->view('templates/pie');
     }

     public function formLogin()
     {
         $this->load->view('templates/encabezado');
         $this->load->view('templates/menu');
         $this->load->view('formLogin');
         $this->load->view('templates/pie');
     }

     public function verificarUsuario()
     {
         $name = $this->input->post('usu_nombre');
         echo json_encode($this->Login_model->verificarUsuario($name));
         sleep(2);
     }

     public function verificarPassword()
     {
         $pass = sha1($this->input->post('usu_clave'));
         echo json_encode($this->Login_model->verificarPassword($pass));
     }

     public function logout()
     {
         session_destroy();
         $this->output->set_header('refresh:1; url='.base_url());
     }

     public function formEditLogin()
     {
         $this->load->view('templates/encabezado');
         $this->load->view('templates/menu');
         $this->load->view('persona/formEditLogin');
         $this->load->view('templates/pie');
     }

     public function verMisDatos()
     {
         echo json_encode($this->Login_model->verMisDatos());
     }

     public function editPerfil()
     {
         $config = array(
             'upload_path'=>'./assets/imgUser/',
             'allowed_types'=>'png|jpg|jpeg|gif',
             'max_size'=>'5000',
             'max_width'=>'2000',
             'max_height'=>'2000',
         );
         $this->load->library('upload',$config);
         if ($this->upload->do_upload('imagen')){
             $fila_data = $this->upload->data();
             $fila_name = $fila_data['file_name'];
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
             $this->Persona_model->editPerfil($persona,$fila_name);
             $this->Usuario_model->editPerfil($usuario);
         }else{
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
             $this->Persona_model->editPerfilSinfoto($persona);
             $this->Usuario_model->editPerfil($usuario);
         }
     }

     public function registro()
     {
         $this->load->view('templates/encabezado');
         $this->load->view('templates/menu');
         $this->load->view('formRegistro');
         $this->load->view('templates/pie');
     }

     public function formDropLogin()
     {
         $this->load->view('templates/encabezado');
         $this->load->view('templates/menu');
         $this->load->view('persona/formDropLogin');
         $this->load->view('templates/pie');
     }

     public function dropLogin()
     {
         $this->Login_model->dropLoginUsuario();
         $this->Login_model->dropLoginPersona();
     }
 }