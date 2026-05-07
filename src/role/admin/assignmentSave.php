<?php include '../../structure/header.php'; ?>

<?php

$mysqli = include_once "../../connexio.php";

// Validación básica
$idIncidencia = $_POST["idIncidencia"] ?? null;
$idTecnic = $_POST["idTecnic"] ?? null;
$idTipus = $_POST["idTipus"] ?? null;
$idPrioritat = $_POST["idPrioritat"] ?? null;

$success = false;
$error = null;

if ($idIncidencia && $idTecnic && $idTipus && $idPrioritat) {

    $stmt = $mysqli->prepare("
        UPDATE INCIDENCIA
        SET idTecnic = ?,
            idTipus = ?,
            idPrioritat = ?
        WHERE idIncidencia = ?
    ");

    if ($stmt) {

        $stmt->bind_param( "iiii", $idTecnic, $idTipus, $idPrioritat, $idIncidencia);

        if ($stmt->execute()) {
            $success = true;
        } else {
            $error = "Error al guardar la incidència.";
        }

        $stmt->close();

    } else {
        $error = "Error al preparar la consulta.";
    }

} else {
    $error = "Falten dades per completar l'actualització.";
}

?>

<main class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <?php if ($success) ?>

                <div class="alert alert-success text-center shadow-sm">

                    <h4 class="alert-heading">
                        Incidència actualitzada correctament
                    </h4>

                    <p class="mb-2">
                        L'ID de la incidència 
                        <strong>#<?php echo htmlspecialchars($idIncidencia); ?></strong>
                        s'ha actualitzat correctament.
                    </p>

                    <hr>

                    <a href="assignment.php?idIncidencia=<?php echo htmlspecialchars($idIncidencia); ?>" 
                       class="btn btn-primary">
                        Tornar a la incidència
                    </a>

                    <a href="adminList.php" 
                       class="btn btn-secondary ms-2">
                        Veure llistat
                    </a>

                </div>

        </div>

    </div>

</main>

<?php include '../../structure/footer.php'; ?>