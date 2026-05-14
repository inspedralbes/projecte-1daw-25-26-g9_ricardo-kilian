<?php include '../../structure/header.php';
include '../../structure/userStructure/navBarUser.php';

$mysqli = include_once "../../connexio.php";

$incidencia = null;

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $stmt = $mysqli->prepare("
        SELECT 
            i.idIncidencia,
            i.descripcio,
            i.data,
            d.nom AS departament,
            t.nom AS tecnic,
            tp.nom AS tipus,
            i.dataFinalitzacio,
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
        WHERE i.idIncidencia = ?
    ");

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $incidencia = $resultado->fetch_assoc();
}
?>

<main class="container mt-5">


    <h1 class="mb-4 text-center">Filtrar Incidència per ID</h1>

    <form method="GET" class="row justify-content-center mb-4">
        <div class="col-md-4">
            <input type="number" name="id" class="form-control" placeholder="Introdueix ID..." required>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>
    </form>

    <?php if ($incidencia) { ?>

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow-sm">

                    <div class="card-body">

                        <p>
                            <strong>Descripció:</strong><br>
                            <?php echo htmlspecialchars($incidencia["descripcio"]); ?>
                        </p>

                        <hr>

                        <p>
                            <strong>Data:</strong><br>
                            <?php echo date("d/m/Y H:i", strtotime($incidencia["data"])); ?>
                        </p>

                        <p>
                            <strong>Departament:</strong><br>
                            <?php echo htmlspecialchars($incidencia["departament"]); ?>
                        </p>

                        <p>
                            <strong>Tècnic:</strong><br>
                            <?php echo htmlspecialchars($incidencia["tecnic"]); ?>
                        </p>

                        <p>
                            <strong>Tipus:</strong><br>
                            <?php echo htmlspecialchars($incidencia["tipus"]); ?>
                        </p>

                        <p>
                            <strong>Finalització:</strong><br>

                            <?php
                            if ($incidencia["dataFinalitzacio"]) {
                                echo date(
                                    "d/m/Y",
                                    strtotime($incidencia["dataFinalitzacio"])
                                );
                            } else {
                                echo "No finalitzada";
                            }
                            ?>
                        </p>

                        <p>
                            <strong>Prioritat:</strong><br>
                            <?php echo htmlspecialchars($incidencia["prioritat"]); ?>
                        </p>

                    </div>

                </div>

            </div>

        </div>

    <?php } elseif (isset($_GET["id"])) { ?>

        <div class="alert alert-danger text-center">
            No s'ha trobat cap incidència amb aquest ID.
        </div>

    <?php } ?>

</main>
<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>