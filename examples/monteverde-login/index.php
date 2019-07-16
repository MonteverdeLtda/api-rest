<!DOCTYPE html>
<html>
<head>
<title>Monteverde - SDK - Login</title>
<meta charset="UTF-8">
<style>

</style>
</head>
<body>
<script>
// Esto se llama con los resultados de Mv.getLoginStatus().
function statusChangeCallback(response) {
	console.log('statusChangeCallback');
	// El objeto de respuesta se devuelve con un campo de estado que permite a
	// la aplicación conocer el estado actual de inicio de sesión de la persona.
	// Los documentos completos sobre el objeto de respuesta se pueden encontrar en la documentación.
	// para Mv.getLoginStatus().	
	if (response.status === 'disconnect') {
		document.getElementById('status').innerHTML = 'Porfavor inicie sesion para continuar.';
	} else if (response.status === 'connected') {
		// Inicia sesión en tu aplicación y en Monteverde.
		testAPI();
	} else {
		document.getElementById('status').innerHTML = 'La persona no ha iniciado sesión en su aplicación o no podemos decírselo.';
	}
}
// Esta función se llama cuando alguien termina con el inicio de sesión
// Botón. Ver el controlador onlogin adjunto a él en la muestra
// código abajo.
function checkLoginState() {
	console.log('checkLoginState');
	Mv.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}
  // Load the SDK asynchronously
(function () {
	var s = document.createElement('script');
	s.type = 'text/javascript';
	s.async = true;
	s.src = 'https://connect.monteverdeltda.com/';
	var x = document.getElementsByTagName('script')[0];
	x.parentNode.insertBefore(s, x);
})();

window.MonteverdeAPIInit = function() {
	Mv.init({
		clientId   : '10000000001',
		version     : '2.0.0'
	});
	// Ahora que hemos inicializado el SDK de JavaScript, llamamos
	// Mv.getLoginStatus(). Esta función obtiene el estado del
	// persona que visita esta página y puede devolver uno de los tres estados a
	// la devolución de llamada que proporcionas. Ellos pueden ser:
	//
	// 1. Inicia sesión en tu aplicación ('connected')
	// 2. Ha iniciado sesión en Facebook, pero no en su aplicación ('not_authorized')
	// 3. No ha iniciado sesión en Facebook y no puede saber si están conectados
	// tu aplicación o no.
	// Estos tres casos se manejan en la función de devolución de llamada.

    Mv.getLoginStatus(function(response) {
		console.log('Mv.getLoginStatus Front: ');
		statusChangeCallback(response);
    });
};

// Aquí ejecutamos una prueba muy simple después de que el inicio de sesión sea exitoso.
// Consulte statusChangeCallback() para saber cuándo se realiza esta llamada.
function testAPI() {
	document.getElementById('status').innerHTML = 'Welcome!  Fetching your information.... ';
}
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the Mv.login() function when clicked.
-->

<mv:login-button scope="email" onlogin="checkLoginState();">
</mv:login-button>


<div id="status">
</div>

</body>
</html>