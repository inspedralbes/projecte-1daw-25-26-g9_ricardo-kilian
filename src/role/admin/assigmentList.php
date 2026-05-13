<?php include '../../structure/header.php'; ?>
<?php include '../../structure/adminStructure/navBarAdmin.php'; ?>

<?php

$mysqli = include_once "../../connexio.php";

$resultado = $mysqli->query("
    SELECT 
        i.idIncidencia,
        i.descripcio,
        i.data,
        d.nom AS departament,
        t.nom AS tecnic,
        tp.nom AS tipus,
        p.descripcio AS prioritat
    FROM INCIDENCIA i
    LEFT JOIN DEPARTAMENT d 
        ON i.idDepartament = d.idDepartament
    LEFT JOIN TECNIC t 
        ON i.idTecnic = t.idTecnic
    LEFT JOIN TIPUS tp 
        ON i.idTipus = tp.idTipus
    LEFT JOIN PRIORITAT p 
        ON i.idPrioritat = p.idPrioritat
    WHERE 
        i.dataFinalitzacio IS NULL
        AND i.idTecnic IS NULL
");

if (!$resultado) {
    die("Error en la consulta: " . $mysqli->error);
}

$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<main class="container mt-5">

    <h1 class="text-center mb-4">
        Incidències per assignar
    </h1>

    <div class="row">

        <?php if (!empty($incidencias)) { ?>

            <?php foreach ($incidencias as $incidencia) { ?>

                <div class="col-md-6 mb-4">

                    <div class="card shadow-sm h-100">

                        <div class="card-body">

                            <h5 class="card-title">
                                <?= htmlspecialchars($incidencia["idIncidencia"]) ?>
                            </h5>

                            <h5 class="card-title">
                                Descripcio
                            </h5>

                            <p class="text-muted mb-3">
                                <?= htmlspecialchars($incidencia["descripcio"]) ?>
                            </p>

                            <hr>

                            <p class="mb-1">
                                <strong>Data:</strong>
                                <?= htmlspecialchars($incidencia["data"]) ?>
                            </p>

                            <p class="mb-1">
                                <strong>Departament:</strong>
                                <?= htmlspecialchars($incidencia["departament"] ?? '') ?>
                            </p>

                            <p class="mb-3">
                                <strong>Tipus:</strong>
                                <?= htmlspecialchars($incidencia["tipus"] ?? '') ?>
                            </p>

                            <div class="mt-3">

                                <a href="assignment.php?idIncidencia=<?= urlencode($incidencia["idIncidencia"]) ?>"
                                   class="btn btn-primary w-100">
                                    Assignar incidència
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="col-12 text-center">

                <div class="alert alert-success shadow-sm">

                    <h4 class="mb-0">
                        No hi ha incidències per assignar
                    </h4>

                </div>

            </div>

        <?php } ?>

    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>