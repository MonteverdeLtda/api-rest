<!DOCTYPE html>
<html>
	<head>
		<title>PHP-REST-API (v2) - Developed by FelipheGomez - Docs</title>
			<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700|Roboto:300,400,700" rel="stylesheet">

			<!--
			ReDoc doesn't change outer page styles
			-->
			<style>
			  body {
				margin: 0;
				padding: 0;
			  }
			</style>
		<meta charset="UTF-8">
	</head>
	<body>
		<script>
		// Esto se llama con los resultados de Mv.getLoginStatus().
		function statusChangeCallback(response) {
			console.log('statusChangeCallback' + JSON.stringify(response));
			console.log(JSON.stringify(response));
			// El objeto de respuesta se devuelve con un campo de estado que permite a
			// la aplicación conocer el estado actual de inicio de sesión de la persona.
			// Los documentos completos sobre el objeto de respuesta se pueden encontrar en la documentación.
			// para Mv.getLoginStatus().	
			
			console.log(response.status);
			if (response.status === 'disconnect') {
				document.getElementById('status').innerHTML = 'Porfavor inicie sesion para continuar.';
			} else if (response.status === 'connected') {
				// Inicia sesión en tu aplicación y en Monteverde.
				testAPI(response.authResponse);
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
				version     : '2.0.0',
				domain: 'api.monteverdeltda.com',
				baseURL: 'https://api.monteverdeltda.com',
				cookie: {
					cookieName: 'MV-XSRF-TOKEN',
					headerName: 'MV-X-XSRF-TOKEN'
				},
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
				console.log('Mv.getLoginStatus Front: ' + JSON.stringify(response));
				statusChangeCallback(response);
			});
		};

		// Aquí ejecutamos una prueba muy simple después de que el inicio de sesión sea exitoso.
		// Consulte statusChangeCallback() para saber cuándo se realiza esta llamada.
		function testAPI(authResponse) {
			document.getElementById('status').innerHTML = 'Welcome!  Fetching your information.... ';
				document.getElementById('status').innerHTML = 'Hola! ' + authResponse.userData.username + ', Esta es la documentacion de la API.';
			document.getElementById('userData').innerHTML = JSON.stringify(Mv.getUserInfo());
			
			Redoc.init(Mv.initConfig().baseURL + '/openapi', {
			  scrollYOffset: 50
			}, document.getElementById('docs'))
		}
		</script>

		<!--
		  Below we include the Login Button social plugin. This button uses
		  the JavaScript SDK to present a graphical Login button that triggers
		  the Mv.login() function when clicked.
		-->

		<mv:login-button scope="email" onlogin="checkLoginState();">
		</mv:login-button>


		<div id="userData"></div>
		<div id="status"></div>
		<div id="docs"></div>
	<!-- // <redoc spec-url='https://api.monteverdeltda.com/openapi'></redoc> -->
	<script src="https://cdn.jsdelivr.net/npm/redoc@next/bundles/redoc.standalone.js"> </script>

	</body>
</html>