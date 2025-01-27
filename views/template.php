<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<title>BLITZ | DEKKERLAB</title>
	<link rel="shortcut icon" type="image/png" href="views/images/logos/icono.png" />
	<link rel="stylesheet" href="views/css/styles.min.css" />
	<script src="views/libs/jquery/dist/jquery.min.js"></script>
	<script src="views/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
	<?php

	session_start();
	if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok") {
		echo '<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">';

		include "moduls/header.php";
		include "moduls/sidebar.php";

		if (isset($_GET["ruta"])) {

			$carpeta = "views/moduls/";
			$class = $carpeta . $_GET["ruta"] . '.php';

			if (!file_exists($class)) {

				include "moduls/404.php";
			} else {

				include $class;
			}
		} else {


			include "moduls/inicio.php";
		}
	} else {
		if (isset($_GET["ruta"])) {

			if ($_GET["ruta"] == "login") {
				include "moduls/login.php";
			} else {
				include "moduls/login.php";
			}
		} else {
			include "moduls/login.php";
		}
	}


	?>

	<script src="views/js/sidebarmenu.js"></script>
	<script src="views/js/template.js"></script>
	<script src="views/js/app.min.js"></script>
	<script src="views/libs/apexcharts/dist/apexcharts.min.js"></script>
	<script src="views/libs/simplebar/dist/simplebar.js"></script>
	<script src="views/js/dashboard.js"></script>
</body>

</html>