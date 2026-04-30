<?php
$idIncidencia = $_GET["idIncidencia"] ?? null;

if ($idIncidencia === null) {
    echo "Error: no se recibió el ID";
    exit;
}
?>

<?php include_once "header.php"; ?>

<div class="row">
    <div class="col-12">
        <h1>Incidencia registrada exitosamente</h1>
        <p>El ID de la incidencia es <?php echo htmlspecialchars($idIncidencia); ?></p>

        <a href="insertar.php">Volver</a>
    </div>
</div>