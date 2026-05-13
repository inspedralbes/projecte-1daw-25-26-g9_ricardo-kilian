<?php include '../../structure/header.php'; ?>

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

<main class="container py-5">

    <?php include '../../structure/adminStructure/navBarAdmin.php'; ?>

    <h1 class="text-center fw-bold mb-5">Incidències per assignar </h1>

    <div class="row">

        <?php if (!empty($incidencias)) { ?>

            <?php foreach ($incidencias as $incidencia) { ?>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="card border-0 shadow-lg h-100 rounded-4">

                        <div class="card-body d-flex flex-column p-4">

                            <h4 class="fw-bold mb-3">
                                #<?= $incidencia["idIncidencia"] ?>
                            </h4>

                            <p class="text-muted mb-3">
                                <?= $incidencia["descripcio"] ?>
                            </p>

                            <p class="mb-2">
                                <strong>Data:</strong>
                                <?= $incidencia["data"] ?>
                            </p>

                            <p class="mb-2">
                                <strong>Departament:</strong>
                                <?= $incidencia["departament"] ?>
                            </p>

                            <p class="mb-2">
                                <strong>Tipus:</strong>
                                <?= $incidencia["tipus"] ?>
                            </p>

                         

                            <div class="mt-auto">

                                <a href="assignment.php?idIncidencia=<?= $incidencia["idIncidencia"] ?>"
                                   class="btn btn-primary w-100 rounded-pill">
                                    Assignar incidència
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="col-12 text-center mt-5">

                <div class="alert alert-success text-center shadow-sm">

                    <h4 class="alert-heading">
                        No hi ha incidències per assignar
                    </h4>

                </div>

            </div>

        <?php } ?>

    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>