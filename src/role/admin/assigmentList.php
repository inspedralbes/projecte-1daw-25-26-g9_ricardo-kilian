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

$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<main class="container py-5" id="main-content">


    <h1 class="text-center fw-bold mb-5">
        Incidències per assignar
    </h1>

    <div class="row">

        <?php if (!empty($incidencias)) { ?>

            <?php foreach ($incidencias as $incidencia) { ?>

                <div class="col-md-6 col-lg-4 mb-4">

                    <article class="card border-0 shadow-lg h-100 rounded-4">

                        <div class="card-body d-flex flex-column p-4">

                            <h2 class="h4 fw-bold mb-3">
                                Incidència #<?= htmlspecialchars($incidencia["idIncidencia"]) ?>
                            </h2>

                            <p class="text-muted mb-3">
                                <?= htmlspecialchars($incidencia["descripcio"]) ?>
                            </p>

                            <p class="mb-2">
                                <strong>Data:</strong>
                                <?= htmlspecialchars($incidencia["data"]) ?>
                            </p>

                            <p class="mb-2">
                                <strong>Departament:</strong>
                                <?= htmlspecialchars($incidencia["departament"] ?? '') ?>
                            </p>

                            <p class="mb-2">
                                <strong>Tipus:</strong>
                                <?= htmlspecialchars($incidencia["tipus"] ?? '') ?>
                            </p>

                            <p class="mb-4">
                                <strong>Prioritat:</strong>
                                <?= htmlspecialchars($incidencia["prioritat"] ?? '') ?>
                            </p>

                            <div class="mt-auto">

                                <a
                                    href="assignmentSave.php?idIncidencia=<?= urlencode($incidencia["idIncidencia"]) ?>"
                                    class="btn btn-primary w-100 rounded-pill"
                                    aria-label="Assignar incidència <?= htmlspecialchars($incidencia["idIncidencia"]) ?>"
                                >
                                    Assignar incidència
                                </a>

                            </div>

                        </div>

                    </article>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="col-12 text-center mt-5">

                <div
                    class="alert alert-success text-center shadow-sm"
                    role="status"
                >

                    <h2 class="h4 alert-heading">
                        No hi ha incidències per assignar
                    </h2>

                </div>

            </div>

        <?php } ?>

    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>