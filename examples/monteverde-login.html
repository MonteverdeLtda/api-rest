<!DOCTYPE html>
<html>
<head>
<title>PHP-REST-API (v2) - Developed by FelipheGomez - Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700|Roboto:300,400,700" rel="stylesheet">
    <style>
      body {
        margin: 0;
        padding: 0;
      }
    </style>
<meta charset="UTF-8">
<style>

</style>
</head>
<body>
<script>
function statusChangeCallback(response) {
	console.log('statusChangeCallback' + JSON.stringify(response));
	console.log(JSON.stringify(response));
	console.log(response.status);
	if (response.status === 'disconnect') {
		document.getElementById('status').innerHTML = 'Porfavor inicie sesion para continuar.';
	} else if (response.status === 'connected') {
		testAPI(response.authResponse);
	} else {
		document.getElementById('status').innerHTML = 'La persona no ha iniciado sesión en su aplicación o no podemos decírselo.';
	}
}

function checkLoginState() {
	console.log('checkLoginState');
	Mv.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

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
			name: 'api.monteverdeltda.com'
		},
	});

    Mv.getLoginStatus(function(response) {
		console.log('Mv.getLoginStatus Front: ' + JSON.stringify(response));
		statusChangeCallback(response);
    });
};

function testAPI(authResponse) {
	document.getElementById('status').innerHTML = 'Welcome!  Fetching your information.... ';
		document.getElementById('status').innerHTML = 'Hola! ' + authResponse.userData.username + ', Esta es la documentacion de la API.';
	document.getElementById('userData').innerHTML = JSON.stringify(Mv.getUserInfo());
	
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


</body>
</html>