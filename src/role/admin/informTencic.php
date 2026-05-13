<?php include '../../structure/header.php'; ?>

<?php

$mysqli = include_once "../../connexio.php";

$resultado = $mysqli->query("
    SELECT 
        t.nom AS tecnic,
        COUNT(i.idIncidencia) AS totals,
        SUM(CASE 
            WHEN i.dataFinalitzacio IS NOT NULL 
            THEN 1 
            ELSE 0 
        END
        )AS resoltes,
        SUM(
            CASE 
                WHEN i.dataFinalitzacio IS NULL 
                THEN 1 
                ELSE 0 
            END
        ) AS pendents
    FROM TECNIC t
    LEFT JOIN INCIDENCIA i ON t.idTecnic = i.idTecnic
    GROUP BY t.idTecnic, t.nom
    ORDER BY totals DESC
");

$tecnics = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<main class="container py-5">

    <?php include '../../structure/adminStructure/navBarAdmin.php'; ?>

    <h1 class="text-center fw-bold mb-5">
        Informe de tècnics
    </h1>

    <div class="row">

        <?php if (!empty($tecnics)) { ?>

            <?php foreach ($tecnics as $t) { ?>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="card border-0 shadow-lg rounded-4 h-100">

                        <div class="card-body p-4 text-center">

                            <h3 class="fw-bold mb-4">
                                <?= $t["tecnic"] ?>
                            </h3>

                            <div class="mb-3">
                                <h1 class="text-primary">
                                    <?= $t["totals"] ?>
                                </h1>

                                <p class="text-muted">
                                    Incidències totals
                                </p>
                            </div>

                            <hr>

                            <div class="d-flex justify-content-around mt-4">

                                <div>
                                    <h2 class="text-success">
                                        <?= $t["resoltes"] ?>
                                    </h2>

                                    <small class="text-muted">
                                        Resoltes
                                    </small>
                                </div>

                                <div>
                                    <h2 class="text-danger">
                                        <?= $t["pendents"] ?>
                                    </h2>

                                    <small class="text-muted">
                                        Pendents
                                    </small>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="col-12">

                <div class="alert alert-info text-center rounded-4 shadow-sm">

                    No hi ha informes disponibles

                </div>

            </div>

        <?php } ?>

    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>