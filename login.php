<?php

require_once 'config/constants.php';
require_once 'controlador/login.controller.php';
require_once 'controlador/funciones.php';

$auth = autenticar();

if ($auth) {
	header('Location: ' . URL);
}

$error = false;

$error_user = "";
$error_pass = "";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$nombre_usuario = trim($_POST["nombre_usuario"]);
	$password = trim($_POST["password"]);



	if ($nombre_usuario == '') {
		$error_user = "Escribir usuario";
	} else {
		$resultado = verifyUser($nombre_usuario, $password);
		if ($resultado) {
			$verificaPass = password_verify($password, $resultado["password"]);

			if ($verificaPass) {

				$_SESSION["login"] =  true;
				$_SESSION["id_usuario"] =  $resultado["id"];
				$_SESSION["nombre_usuario"] =  $resultado["nombre_usuario"];
				$_SESSION["password"] =  $resultado["password"];
				$_SESSION["nombres"] =  $resultado["nombres"];
				$_SESSION["apellido_paterno"] =  $resultado["apellido_paterno"];
				$_SESSION["apellido_materno"] =  $resultado["apellido_materno"];
				$_SESSION["idrol"] =  $resultado["idrol"];


				header('Location: ' . URL);
			} else {
	
				$error_pass = "Contraseña incorrecta";
			}
		} else {
		
			$error_user = "Usuario no existe";
		}
	}
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/empresa/logocorto.png" />
	<title>Iniciar Sesión</title>
	<link href="css/app.css" rel="stylesheet">
	<link href="css/app2.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Bienvenido</h1>
							<p class="lead">
								Ingresa tus datos para Seguir
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img/empresa/logocorto2.png" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form method="POST">
										<div class="mb-3">
											<label class="form-label">Usuario</label>
											<input class="form-control form-control-lg <?php if(($error_user)!='') echo  "boder-invalid"; ?>" type="text" name="nombre_usuario" placeholder="Ingresa tu usuario" value="<?php if(($error_user)!='' || $error_pass!='') echo  $nombre_usuario; ?>" />
											<?php if (($error_user)!='') : ?>
												<div class="invalid-feedback displayBlock">
													<?php echo $error_user; ?>
												</div>
											<?php endif; ?>
										</div>
										<div class="mb-3">
											<label class="form-label">Contraseña</label>
											<input class="form-control form-control-lg <?php if(($error_pass)!='') echo  "boder-invalid"; ?>" type="password" name="password" placeholder="Ingresa tu Contraseña"  value="<?php if(($error_user)!='' || $error_pass!='') echo  $password; ?>"/>
											<?php if (($error_pass)!='') : ?>
												<div class="invalid-feedback displayBlock">
													<?php echo $error_pass; ?>
												</div>
											<?php endif; ?>
											<!-- <small>
												<a href="index.html">Forgot password?</a>
											</small> -->
										</div>
										<!-- <div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
												<span class="form-check-label">
													Remember me next time
												</span>
											</label>
										</div> -->
										<div class="text-center mt-3">

											<button type="submit" class="btn btn-lg btn-primary">Ingresar</button>
											<!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
										</div>
									</form>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/login/login.js"></script>

	<?php include "includes/jsGeneral.php" ?>

</body>

</html>