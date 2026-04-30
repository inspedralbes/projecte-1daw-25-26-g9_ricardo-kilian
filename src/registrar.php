<?php
$mysqli = include_once "connexio.php";
$prioritat = $_POST["prioritat"];
$idTecnic = $_POST["idTecnic"];
$idTipus = $_POST["idTipus"];


$sentencia = $mysqli->prepare("INSERT INTO INCIDENCIA
(prioritat, idTecnic , idTipus)
VALUES
(?, ? , ?)");
$sentencia->bind_param("sss", $descripcio, $idDepartament , $idTipus);
$sentencia->execute();
$idIncidencia = $mysqli ->query("SELECT LAST_INSERT_ID()")->fetch_row()[0];

header("Location: aviso.php?idIncidencia=" . $idIncidencia);
exit;