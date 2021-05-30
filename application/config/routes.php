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
$route['default_controller'] = 'Home';
$route['translate_uri_dashes'] = FALSE;
$route['404_override'] = '';

$route['imagen/(:any)/(:any)'] = 'EditarReparacion_controller/imagen/$1/$2';

$route['noticies'] = 'noticies_controller/index';
$route[''] = 'Home/index';

$route['login'] = 'Login_controller/login'; 
$route['logout'] = 'Login_controller/logout'; 


/* ADMIN */ 
$route['adminUsuarios'] = 'Admin_controller/adminUsuarios'; 
$route['user_groups'] = 'Admin_controller/user_groups'; 
$route['groups'] = 'Admin_controller/groups'; 
$route['incidencia'] = 'Admin_controller/incidencia'; 
$route['infocontacto'] = 'Admin_controller/infocontacto'; 
$route['mail'] = 'Admin_controller/mail'; 
$route['material'] = 'Admin_controller/material'; 
$route['tipoConsulta'] = 'Admin_controller/tipoConsulta'; 
$route['consulta'] = 'Admin_controller/consulta'; 
$route['noticias'] = 'Admin_controller/noticias'; 

$route['passwdchange'] = 'UpdatePassword_controller/index'; 
$route['updatePassword'] = 'UpdatePassword_controller/updatePassword'; 


$route['nuevareparacion'] = 'Nuevareparacion_controller/index'; 
$route['editarReparacion'] = 'EditarReparacion_controller/editar_reparacion'; 
$route['do_upload'] = 'EditarReparacion_controller/do_upload'; 
$route['editarReparacionGestor'] = 'EditarReparacionGestor_controller/index'; 


$route['anadirnuevareparacion'] = 'Reparaciones_controller/anadirnuevareparacion'; 

$route['misreparaciones'] = 'Reparaciones_controller/index'; 




$route['todasLasIncidencias'] = 'Gestor_controller/todasLasIncidencias'; 
$route['todasLasIncidencias/add'] = 'Gestor_controller/todasLasIncidencias/add';
$route['todasLasIncidencias/insert'] = 'Gestor_controller/todasLasIncidencias/insert';
$route['todasLasIncidencias/insert_validation'] = 'Gestor_controller/todasLasIncidencias/insert_validation';
$route['todasLasIncidencias/success/:num'] = 'Gestor_controller/todasLasIncidencias/success';
$route['todasLasIncidencias/delete/:num'] = 'Gestor_controller/todasLasIncidencias/delete';
$route['todasLasIncidencias/edit/:num'] = 'Gestor_controller/todasLasIncidencias/edit';
$route['todasLasIncidencias/clone/:num'] = 'Gestor_controller/todasLasIncidencias/clone';
$route['todasLasIncidencias/update_validation/:num'] = 'Gestor_controller/todasLasIncidencias/update_validation';
$route['todasLasIncidencias/update/:num'] = 'Gestor_controller/todasLasIncidencias/update';
$route['todasLasIncidencias/ajax_list_info'] = 'Gestor_controller/todasLasIncidencias/ajax_list_info';
$route['todasLasIncidencias/ajax_list'] = 'Gestor_controller/todasLasIncidencias/ajax_list';
$route['todasLasIncidencias/read/:num'] = 'Gestor_controller/todasLasIncidencias/read';
$route['todasLasIncidencias/export'] = 'Gestor_controller/todasLasIncidencias/export';












$route['register'] = 'Register_controller/index'; 
$route['create_user'] = 'Register_controller/create_user'; 
$route['update_password'] = 'UpdatePassword_controller/update_password'; 


$route['Nosotros'] = 'Nosotros/index'; 
$route['Contactanos'] = 'Contactanos/index'; 

$route['noticies/index'] = 'noticies_controller/index'; 

$route['noticies/create'] = 'noticies_controller/create'; 

$route['noticies/edit/(:any)'] = 'noticies_controller/edit/$1'; 

$route['noticies/delete/(:any)'] = 'noticies_controller/delete/$1'; 

$route['noticies/(:any)'] = 'noticies_controller/view/$1'; 


$route['pdf'] = "pdf_controller/index";

$route['api/noticies'] = "Api_Noticies/noticies";

$route['private/noticies'] = "ApiJwt_controller/noticies";
$route['private/login'] = "ApiJwt_controller/params";





/* ###################################################################### */

$route['(:any)/add'] = 'Admin_controller/$1/add';
$route['(:any)/insert'] = 'Admin_controller/$1/insert';
$route['(:any)/insert_validation'] = 'Admin_controller/$1/insert_validation';
$route['(:any)/success/:num'] = 'Admin_controller/$1/success';
$route['(:any)/delete/:num'] = 'Admin_controller/$1/delete';
$route['(:any)/edit/:num'] = 'Admin_controller/$1/edit';
$route['(:any)/clone/:num'] = 'Admin_controller/$1/clone';
$route['(:any)/update_validation/:num'] = 'Admin_controller/$1/update_validation';
$route['(:any)/update/:num'] = 'Admin_controller/$1/update';
$route['(:any)/ajax_list_info'] = 'Admin_controller/$1/ajax_list_info';
$route['(:any)/ajax_list'] = 'Admin_controller/$1/ajax_list';
$route['(:any)/read/:num'] = 'Admin_controller/$1/read';
$route['(:any)/export'] = 'Admin_controller/$1/export';
$route['(:any)/print'] = 'Admin_controller/$1/print';



/* ################### MENSAJERIA ##################*/ 

$route['contactanosPeticion'] = "Mensajes_controller/contactanosPeticion";



/* ################### CLIENT ##################*/ 

$route['generateForUuid'] = "Client_Controller/generateForUuid";
$route['fichaUUID'] = "Client_Controller/fichaUUID";
$route['incidenciasCliente'] = "Incidencias_controller/index";
