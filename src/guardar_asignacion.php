<?php
$mysqli = include_once "connexio.php";

$idIncidencia = $_POST["idIncidencia"];
$idTecnic = $_POST["idTecnic"];
$idTipus = $_POST["idTipus"];


$sentencia = $mysqli->prepare("UPDATE INCIDENCIA
SET idTecnic = ?,
    idTipus = ?
WHERE idIncidencia = ?");
$sentencia->bind_param("iii", $idTecnic, $idTipus , $idIncidencia);
$sentencia->execute();



?>