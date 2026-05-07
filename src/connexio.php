<?php

$host = "db";
$usuario = "admin";
$contrasenia = "admin1234";
$base_de_datos = "gestorIncidencia";

$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
$mysqli->set_charset("utf8mb4");

if ($mysqli->connect_errno) {
    die("Connexió errònea: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

return $mysqli;