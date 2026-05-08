<?php

$mysqli = include_once "../../connexio.php";

$idIncidencia = $_POST['idIncidencia'];
$descripcio = $_POST['descripcio'];
$temps = $_POST['temps'];
$visible = $_POST['visible'];

$stmt = $mysqli->prepare("
    INSERT INTO ACTUACIO
    (idIncidencia, descripcio, temps, visible)
    VALUES (?, ?, ?, ?)
");

$stmt->bind_param(
    "isii",
    $idIncidencia,
    $descripcio,
    $temps,
    $visible
);

$stmt->execute();

header("Location: tecnicList.php?idTecnic=1");
exit;