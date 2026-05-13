<?php
$mysqli = include_once "../../connexio.php";

$descripcio = $_POST["descripcio"];
$idTipus = $_POST["idTipus"];
$idDepartament = $_POST["idDepartament"];

$sentencia = $mysqli->prepare("INSERT INTO INCIDENCIA (descripcio, idTipus , idDepartament, data) VALUES (?, ? , ?, NOW())");
$sentencia->bind_param("sii", $descripcio, $idTipus , $idDepartament);
$sentencia->execute();
$idIncidencia = $mysqli ->query("SELECT LAST_INSERT_ID()")->fetch_row()[0];

header("Location: alert.php?idIncidencia=" . $idIncidencia);
exit;