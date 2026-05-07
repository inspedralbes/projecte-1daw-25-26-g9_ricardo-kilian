<?php
$mysqli = include_once "../../connexio.php";

$idIncidencia = $_POST["idIncidencia"];
$idTecnic = $_POST["idTecnic"];
$idTipus = $_POST["idTipus"];
$idPrioritat = $_POST["idPrioritat"];


$sentencia = $mysqli->prepare("UPDATE INCIDENCIA
SET idTecnic = ?,
    idTipus = ?
    prioritat = ?
WHERE idIncidencia = ?");
$sentencia->bind_param("iii", $idTecnic, $idTipus , $idIncidencia, $idPrioritat);
$sentencia->execute();



?>