<?php include '../../structure/header.php';

$mysqli = include_once "../../connexio.php";

$resultTecnics = $mysqli->query("
    SELECT idTecnic, nom
    FROM TECNIC
");

?>

<main class="container mt-5">

    <?php include '../../structure/tecnicStructure/navBarTecnic.php'; ?>

    <div class="text-center">

        <h1 class="mb-4">PANELL TÈCNIC</h1>

        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <div class="card accion-card p-4">

                    <h4 class="mb-3">Incidències per Tècnic  </h4>

                    <form action="tecnicList.php" method="GET">

                        <select name="idTecnic" class="form-select mb-3" required>

                            <option value="">
                                -- Selecciona un tècnic --
                            </option>

                            <?php while($tecnic = $resultTecnics->fetch_assoc()): ?>

                                <option value="<?php echo $tecnic['idTecnic']; ?>">

                                    <?php echo htmlspecialchars($tecnic['nom']); ?>

                                </option>

                            <?php endwhile; ?>

                        </select>

                        <button type="submit" class="btn btn-primary">Veure Incidències</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>