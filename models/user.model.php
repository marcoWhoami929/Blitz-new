<?php
require_once "conexion.php";
class ModelUser
{
    static public function mdlMostrarEncuestadores($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = ConexionsBd::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = ConexionsBd::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
}
