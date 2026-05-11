<?php

$mysqli = include_once "../../connexio.php";

$idIncidencia = $_POST['idIncidencia'];
$descripcio = $_POST['descripcio'];
$temps = $_POST['temps'];
$visible = $_POST['visible'];
$resolta = $_POST['resolta'];


$stmt = $mysqli->prepare("
    INSERT INTO ACTUACIO
    (
        idIncidencia,
        descripcio,
        temps,
        visible
    )
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


if ($resolta == 1) {

    $update = $mysqli->prepare("
        UPDATE INCIDENCIA
        SET dataFinalitzacio = NOW()
        WHERE idIncidencia = ?
    ");

    $update->bind_param("i", $idIncidencia);

    $update->execute();
}

header("Location: tecnicList.php");

exit;