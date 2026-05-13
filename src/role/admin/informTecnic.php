<?php 
include '../../structure/header.php';
include '../../structure/adminStructure/navBarAdmin.php'; 

$mysqli = include_once "../../connexio.php";

$resultado = $mysqli->query("
    SELECT
        t.nom AS tecnic,
        i.idIncidencia,
        i.descripcio AS incidencia,
        i.data AS dataInici,
        p.descripcio AS prioritat,
        COALESCE(SUM(a.temps), 0) AS tempsTotal

    FROM TECNIC t

    INNER JOIN INCIDENCIA i 
        ON t.idTecnic = i.idTecnic

    LEFT JOIN ACTUACIO a 
        ON i.idIncidencia = a.idIncidencia

    INNER JOIN PRIORITAT p
        ON i.idPrioritat = p.idPrioritat

    WHERE i.dataFinalitzacio IS NULL

    GROUP BY 
        t.nom,
        i.idIncidencia,
        i.descripcio,
        i.data,
        p.descripcio

    ORDER BY 
        t.nom,
        FIELD(p.descripcio, 'Alta', 'Mitja', 'Baixa')
");

$incidencies = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<main class="container py-5">

    <h1 class="text-center fw-bold mb-5">
        Informe de tècnics
    </h1>

    <div class="row">

        <?php if (!empty($incidencies)) { ?>

            <?php foreach ($incidencies as $i) { ?>

                <div class="col-md-6 col-lg-4 mb-4">

                    <div class="card border-0 shadow rounded-4 h-100">

                        <div class="card-body">

                            <h4 class="fw-bold text-primary mb-3">
                                <?= $i["tecnic"] ?>
                            </h4>

                            <p>
                                <strong>Incidència:</strong><br>
                                <?= $i["incidencia"] ?>
                            </p>

                            <p>
                                <strong>Data inici:</strong><br>
                                <?= $i["dataInici"] ?>
                            </p>

                            <p>
                                <strong>Prioritat:</strong><br>

                                <?php if ($i["prioritat"] == "Alta") { ?>
                                    <span class="badge bg-danger">
                                        Alta
                                    </span>

                                <?php } elseif ($i["prioritat"] == "Mitja") { ?>

                                    <span class="badge bg-warning text-dark">
                                        Mitja
                                    </span>

                                <?php } else { ?>

                                    <span class="badge bg-success">
                                        Baixa
                                    </span>

                                <?php } ?>
                            </p>

                            <hr>

                            <h5 class="text-center">

                                Temps dedicat:
                                <span class="fw-bold">
                                    <?= $i["tempsTotal"] ?> min
                                </span>

                            </h5>

                        </div>

                    </div>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="col-12">

                <div class="alert alert-info text-center">

                    No hi ha incidències pendents

                </div>

            </div>

        <?php } ?>

    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>