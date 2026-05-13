<?php include '../../structure/header.php'; ?>

<?php

$mysqli = include_once "../../connexio.php";

$resultado = $mysqli->query("
    SELECT 
        d.idDepartament,
        d.nom AS departament,

        COUNT(i.idIncidencia) AS totals,

        SUM(i.dataFinalitzacio IS NOT NULL) AS resoltes,

        SUM(i.dataFinalitzacio IS NULL) AS pendents

    FROM DEPARTAMENT d

    LEFT JOIN INCIDENCIA i 
        ON d.idDepartament = i.idDepartament

    GROUP BY d.idDepartament, d.nom
");

$departaments = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<main class="container py-5">

    <?php include '../../structure/adminStructure/navBarAdmin.php'; ?>

    <h1 class="text-center fw-bold mb-5">Consum per departaments</h1>

    <div class="row">

        <?php if (!empty($departaments)) { ?>

            <?php foreach ($departaments as $d) { ?>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="card shadow-lg border-0 rounded-4 h-100">

                        <div class="card-body text-center p-4">

                            <h3 class="fw-bold mb-4">
                                <?= $d["departament"] ?>
                            </h3>

                            <h1 class="text-primary">
                                <?= $d["totals"] ?>
                            </h1>

                            <p class="text-muted">
                                Incidències totals
                            </p>

                            <hr>

                            <div class="d-flex justify-content-around mt-3">

                                <div>
                                    <h2 class="text-success">
                                        <?= $d["resoltes"] ?>
                                    </h2>
                                    <small>Resoltes</small>
                                </div>

                                <div>
                                    <h2 class="text-danger">
                                        <?= $d["pendents"] ?>
                                    </h2>
                                    <small>Pendents</small>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="col-12 text-center">

                <div class="alert alert-info">
                    No hi ha dades disponibles
                </div>

            </div>

        <?php } ?>

    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>