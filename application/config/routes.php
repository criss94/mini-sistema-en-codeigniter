<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'IndexController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['index']='IndexController';

//crud de usuario con ajax
$route['panelUsuarios']='PersonaController';
$route['agregarUsuario']='PersonaController/formAddUser';
$route['formEditUser']='PersonaController/verUsuarioPorID';
$route['formDropUser']='PersonaController/verUsuarioPorIDDrop';

//registro de usuario
$route['registro']='LoginController/registro';

// crud de productos con ajax
$route['panelProductos']='ProductoController/vistaPanelProductos';
$route['formAddProductos']='ProductoController/formAddProductos';
$route['formEditProducto']='ProductoController/formEditProducto';
$route['formDropProducto']='ProductoController/formDropProducto';

// crud e categorias con ajax
$route['panelCategorias']='CategoriaController';
$route['formAddCategoria']='CategoriaController/formAddCategoria';
$route['formEditCategoria']='CategoriaController/formEditCategoria';
$route['formDropCategoria']='CategoriaController/formDropCategoria';

// buscador avanzado
$route['formBuscar']='ProductoController/formBuscar';

// inicio de sesion
$route['formLogin']='LoginController/formLogin';
$route['admin']='LoginController';
$route['logout']='LoginController/logout';

// editar el perfil del usuario logueado
$route['formEditLogin']='LoginController/formEditLogin';
$route['formDropLogin']='LoginController/formdropLogin';

