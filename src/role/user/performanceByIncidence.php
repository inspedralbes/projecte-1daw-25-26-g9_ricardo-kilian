<?php include '../../structure/header.php'; ?>
<?php include '../../structure/userStructure/navBarUser.php'; ?>

<?php

$mysqli = include_once "../../connexio.php";

$idIncidencia = $_GET['idIncidencia'] ?? null;

if (!$idIncidencia) {

    echo "
    <main class='container mt-5'>
        <div class='alert alert-danger'>
            No s'ha seleccionat cap incidència.
        </div>
    </main>
    ";

    include '../../structure/footer.php';
    exit;
}

$stmt = $mysqli->prepare("
    SELECT 
        descripcio,
        data,
        temps
    FROM ACTUACIO
    WHERE idIncidencia = ?
    AND visible = 1
    ORDER BY data DESC
");

$stmt->bind_param("i", $idIncidencia);

$stmt->execute();

$resultado = $stmt->get_result();

$actuacions = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<main class="container mt-5">


    <h1 class="text-center mb-4">

        Actuacions de la incidència #<?php echo $idIncidencia; ?>

    </h1>

    <?php if (count($actuacions) > 0): ?>

        <div class="row">

            <?php foreach ($actuacions as $a): ?>

                <div class="col-md-6 mb-4">

                    <div class="card shadow-sm h-100">

                        <div class="card-body">

                            <h5 class="card-title">

                                Actuació

                            </h5>

                            <p class="card-text">

                                <?php echo htmlspecialchars($a['descripcio']); ?>

                            </p>

                            <hr>

                            <p class="mb-1">

                                <strong>Data:</strong>
                                <?php echo $a['data']; ?>

                            </p>

                            <p class="mb-0">

                                <strong>Temps requerit:</strong>
                                <?php echo $a['temps']; ?> minuts

                            </p>

                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    <?php else: ?>

        <div class="alert alert-warning text-center">

            No hi ha actuacions visibles per aquesta incidència.

        </div>
         <a href='incidenceList.php' class='btn btn-success w-100 mt-3' >
            LLISTAR INCIDÈNCIES
        </a> 

    <?php endif; ?>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>