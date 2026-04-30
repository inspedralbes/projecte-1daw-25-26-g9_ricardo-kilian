<?php
$mysqli = include_once "connexio.php";
$descripcio = $_POST["descripcio"];
$idDepartament = $_POST["idDepartament"];
$idTipus = $_POST["idTipus"];

$sentencia = $mysqli->prepare("INSERT INTO INCIDENCIA
(descripcio, idDepartament , idTipus)
VALUES
(?, ? , ?)");
$sentencia->bind_param("sss", $descripcio, $idDepartament , $idTipus);
$sentencia->execute();
$id = $mysqli ->query("SELECT LAST_INSERT_ID()")->fetch_row()[0];

header("Location: aviso.php");