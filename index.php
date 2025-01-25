<?php

/*
	CONTROLLERS
 */
require_once "controllers/template.controller.php";
require_once "controllers/user.controller.php";

/*
MODELS
 */
require_once "models/conexion.php";
require_once "models/user.model.php";

/*
OTHERS
 */
require_once "models/rutas.php";

$plantilla = new ControladorPlantilla();
$plantilla->plantilla();
