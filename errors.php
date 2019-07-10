<?php 
global $display_error;
$display_error = array();
// Error 401: No autorizado
$display_error[401] = new stdclass();
$display_error[401]->code = 401;
$display_error[401]->error = "Unauthorized";
$display_error[401]->message = "No tienes acceso a esta página, Si el problema persiste, ponte en contacto con el propietario del sitio web.";


function showError($num_e){
	global $display_error;
	$error = new stdclass();
	return json_encode($display_error[$num_e]);
}

