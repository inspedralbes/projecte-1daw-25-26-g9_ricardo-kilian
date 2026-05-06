<?php include '../../structure/header.php'; 

$idIncidencia = $_GET["idIncidencia"] ?? null;

if ($idIncidencia === null) {
    echo "<div class='container mt-5'>
            <div class='alert alert-danger'>Error: no s'ha rebut l'ID de la incidència</div>
          </div>";
    include './structure/footer.php';
    exit;
}
?>

<main class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="alert alert-success text-center shadow-sm">
                <h4 class="alert-heading">Incidència registrada amb èxit</h4>
                
                <p class="mb-2">
                    L'ID de la incidència és: 
                    <strong><?php echo htmlspecialchars($idIncidencia); ?></strong>
                </p>

                <hr>

                <a href="insertar.php" class="btn btn-primary">
                    Crear una nova incidència
                </a>

                <a href="llistat.php" class="btn btn-secondary ms-2">
                    Veure incidències
                </a>

            </div>

        </div>
    </div>

</main>

<?php include '../../structure/footer.php'; ?>