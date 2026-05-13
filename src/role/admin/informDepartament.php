<?php 
include '../../structure/header.php';
include '../../structure/adminStructure/navBarAdmin.php';

$mysqli = include_once "../../connexio.php";

$resultado = $mysqli->query("
    SELECT 
        d.idDepartament,
        d.nom AS departament,

        (
            SELECT COUNT(*)
            FROM INCIDENCIA i
            WHERE i.idDepartament = d.idDepartament
        ) AS totalIncidencies,

        (
            SELECT COALESCE(SUM(a.temps), 0)

            FROM ACTUACIO a

            INNER JOIN INCIDENCIA i
                ON a.idIncidencia = i.idIncidencia

            WHERE i.idDepartament = d.idDepartament

        ) AS tempsTotal

    FROM DEPARTAMENT d

    ORDER BY tempsTotal DESC
");

$departaments = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<main class="container mt-5">

    <h1 class="text-center mb-5">
        Consum per departaments
    </h1>

    <?php if (count($departaments) > 0): ?>

        <div class="row">

            <?php foreach ($departaments as $d): ?>

                <div class="col-md-6 mb-4">

                    <div class="card shadow-sm h-100">

                        <div class="card-body">

                            <h4 class="card-title mb-4">

                                <?= htmlspecialchars($d['departament']); ?>

                            </h4>

                            <p class="mb-3">

                                <strong>Incidències reportades:</strong>

                                <?= $d['totalIncidencies']; ?>

                            </p>

                            <hr>

                            <p class="mb-0">

                                <strong>Temps total dedicat:</strong>

                                <?= $d['tempsTotal']; ?> minuts

                            </p>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <div class="alert alert-warning text-center">

            No hi ha dades disponibles.

        </div>

    <?php endif; ?>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>