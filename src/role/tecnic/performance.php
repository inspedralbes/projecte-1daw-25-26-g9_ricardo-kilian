<?php include '../../structure/header.php';

$idIncidencia = $_GET['idIncidencia'] ?? null;

if (!$idIncidencia) {

    echo "
    <main class='container mt-5'>
        <div class='alert alert-danger'>
            No s'ha rebut cap incidència.
        </div>
    </main>
    ";

    include '../../structure/footer.php';
    exit;
}

?>

<main class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">

                    <h1 class="text-center mb-4">
                        REGISTRAR ACTUACIÓ
                    </h1>

                    <form action="savePerformance.php" method="POST">

                        <input type="hidden" name="idIncidencia"value="<?php echo $idIncidencia; ?>">

                        <div class="mb-3">

                            <label class="form-label">Descripció</label>
                            <textarea name="descripcio" class="form-control" rows="4" required></textarea>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Temps requerit (minuts)</label>
                            <input type="number" name="temps" class="form-control" min="1" required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Visible per l'usuari</label>

                            <select name="visible" class="form-select">

                                <option value="1">SI</option>
                                <option value="0">NO</option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Incidència resolta</label>
                            
                            <select name="resolta" class="form-select">

                                <option value="1">SI</option>
                                <option value="0">NO</option>

                            </select>

                        </div>

                        <button class="btn btn-success w-100">Guardar actuació</button>
                        <a 
                            href="performanceByIncidence.php?idIncidencia=<?php echo $idIncidencia; ?>"
                            class="btn btn-primary w-100 mt-3"
                        >
                            LLISTAR ACTUACIONS
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>