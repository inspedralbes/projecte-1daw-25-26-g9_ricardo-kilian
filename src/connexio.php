<?php
$host = "localhost";
$usuario = "a21ricsaagon_Admin";
$contrasenia = "G9_Ric&&Kil";
$base_de_datos = "a21ricsaagon_Gestor_incidències";
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
return $mysqli;
?>