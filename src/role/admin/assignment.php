<?php include '../../structure/header.php'; ?>

<?php
$mysqli = include_once "../../connexio.php";

$idIncidencia = $_GET["idIncidencia"];

$tecnics = $mysqli->query("SELECT idTecnic, nom FROM TECNIC");
$tipus = $mysqli->query("SELECT idTipus, nom FROM TIPUS");
$prioritat = $mysqli->query("SELECT idPrioritat, descripcio FROM PRIORITAT");
?>

<main class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-12 col-md-6">

            <h2 class="mb-4 text-center">
                Asignar incidència #<?php echo $idIncidencia; ?>
            </h2>

            <form action="assignmentSave.php" method="POST">

                <input type="hidden" name="idIncidencia" value="<?php echo $idIncidencia; ?>">

                <!-- Técnic -->
                <div class="mb-3">
                    <label class="form-label">Tècnic</label>
                    <select name="idTecnic" class="form-select" required>
                        <option value="">--Selecciona tècnic--</option>
                        <?php while ($tec = $tecnics->fetch_assoc()): ?>
                            <option value="<?php echo $tec["idTecnic"]; ?>">
                                <?php echo $tec["nom"]; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- Tipus -->
                <div class="mb-3">
                    <label class="form-label">Tipus</label>
                    <select name="idTipus" class="form-select" required>
                        <option value="">--Selecciona tipus--</option>
                        <?php while ($ti = $tipus->fetch_assoc()): ?>
                            <option value="<?php echo $ti["idTipus"]; ?>">
                                <?php echo $ti["nom"]; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- Prioritat -->
                <div class="mb-3">
                    <label class="form-label">Prioritat</label>
                    <select name="idPrioritat" class="form-select" required>
                        <option value="">--Selecciona prioritat--</option>
                        <?php while ($pr = $prioritat->fetch_assoc()): ?>
                            <option value="<?php echo $pr["idPrioritat"]; ?>">
                                <?php echo $pr["descripcio"]; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <!-- Botón -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success">
                        Guardar asignació
                    </button>
                </div>

            </form>

        </div>
    </div>

</main>
<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>