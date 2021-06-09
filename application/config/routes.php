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
$route['public_imagen/(:any)/(:any)'] = 'Admin_controller/public_imagen/$1/$2';

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
$route['homeinfo'] = 'Admin_controller/homeinfo'; 


$route['passwdchange'] = 'UpdatePassword_controller/index'; 
$route['updatePassword'] = 'UpdatePassword_controller/updatePassword'; 


$route['nuevareparacion'] = 'Nuevareparacion_controller/index'; 
$route['editarReparacion'] = 'EditarReparacion_controller/editar_reparacion'; 
$route['do_upload'] = 'EditarReparacion_controller/do_upload'; 
$route['editarReparacionGestor'] = 'EditarReparacionGestor_controller/index'; 
$route['anadirnuevareparacion'] = 'Reparaciones_controller/anadirnuevareparacion'; 
$route['misreparaciones'] = 'Reparaciones_controller/index'; 


$route['todasLasIncidencias'] = 'Gestor_controller/todasLasIncidencias'; 
$route['todasLasIncidencias/(:any)'] = 'Gestor_controller/todasLasIncidencias/$1'; 
$route['todasLasIncidencias/(:any)/(:any)'] = 'Gestor_controller/todasLasIncidencias/$1/$2'; 





$route['register'] = 'Register_controller/index'; 
$route['create_user'] = 'Register_controller/create_user'; 
$route['update_password'] = 'UpdatePassword_controller/update_password'; 
$route['Nosotros'] = 'Nosotros/index'; 
$route['Contactanos'] = 'Contactanos/index'; 


// GROCERY 
$route['noticias'] = 'Admin_controller/noticias'; 
$route['noticias/(:any)'] = 'Admin_controller/noticias/$1'; 
$route['noticias/(:any)/(:any)'] = 'Admin_controller/noticias/$1/$2'; 

$route['homeinfo'] = 'Admin_controller/homeinfo'; 
$route['homeinfo/(:any)'] = 'Admin_controller/homeinfo/$1'; 
$route['homeinfo/(:any)/(:any)'] = 'Admin_controller/homeinfo/$1/$2'; 

$route['tipoConsulta'] = 'Admin_controller/tipoConsulta'; 
$route['tipoConsulta/(:any)'] = 'Admin_controller/tipoConsulta/$1'; 
$route['tipoConsulta/(:any)/(:any)'] = 'Admin_controller/tipoConsulta/$1/$2'; 





// API BITBIT

    // HOME INFO & PUBLIC INFORMATION
    $route['public/homeinfo'] = "ApiJwt_controller/homeinfo";
    $route['public/temasConsulta'] = "ApiJwt_controller/temas";
    $route['public/consulta'] = "ApiJwt_controller/consulta"; 


    // LOGIN & LOGOUT
    $route['private/login'] = "ApiJwt_controller/params";
    $route['private/logout'] = "ApiJwt_controller/logout";
    
    
    // PRIVATE INFO 
    $route['private/noticiasByGroup/(:any)'] = "ApiJwt_controller/noticias/$1";
    $route['private/incidencias/(:any)'] = "ApiJwt_controller/incidencias/$1";
    // $route['private/incidencias/(:any)/(:any)'] = "ApiJwt_controller/incidencias/$1/$2";
    
    // MESSAGES 
    $route['private/getmessages/(:any)'] = "ApiJwt_controller/getMessages/$1";
    $route['private/messages'] = "ApiJwt_controller/sendMessage";
    $route['private/tomessages'] = "ApiJwt_controller/toMessagesAdmin";
    
    //OPTIONS
    $route['private/opciones/(:any)'] = "ApiJwt_controller/opciones/$1";
    $route['private/updateOpciones'] = "ApiJwt_controller/updateOpciones";
    $route['private/updateOpcionesWithout'] = "ApiJwt_controller/updateOpcionesWithout";
    

// $route['public/noticias'] = "ApiJwt_controller/noticias";





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
$route['mensajeriaClient'] = "Mensajes_controller/mensajeria";
$route['setMensajeByClient'] = "Mensajes_controller/setMensaje";
$route['mensajeriaAdmin'] = "Mensajes_controller/mensajeria";
$route['setMensajeByAdmin'] = "Mensajes_controller/setMensaje";
$route['myMessages'] = "Mensajes_controller/myMessages";



/* ################### tecnic ##################*/ 

$route['incidenciasTecnico'] = "Incidencias_controller/index";

/* ################### CLIENT ##################*/ 

$route['generateForUuid'] = "Client_Controller/generateForUuid";
$route['fichaUUID'] = "Client_Controller/fichaUUID";
$route['incidenciasCliente'] = "Incidencias_controller/index";



