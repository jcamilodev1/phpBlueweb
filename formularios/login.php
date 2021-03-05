<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="master_estilos.css">
	<style type="text/css">
		body {
	background: #a1edcd;
		}
	</style>	
</head>
<body>
	<h1>Inicia Sesión</h1>
	<!-- <div>
		<ul>
			<li><a href="m/master.php">Master</a></li>
			<li><a href="v/vendedor.php">Vendedor</a></li>
			<li><a href="a/vender_administrador.php">Administrador</a></li>
		</ul>
	</div> -->
	<form method="post" action="login_proceso.php">
		<p>Correo</p>
		<input type="email" required="required" name="correo">
		<p>Pasword</p>
		<input type="password" required="required" name="password">
		<br><br>
		<input type="submit" name="">
	</form>

</body>
</html>