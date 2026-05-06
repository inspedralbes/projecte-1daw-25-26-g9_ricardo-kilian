<?php include '../../structure/header.php'; 

$mysqli = include_once "../../connexio.php";

$llistatTipus = $mysqli->query("SELECT idTipus, nom FROM TIPUS");
$tipus = $llistatTipus->fetch_all(MYSQLI_ASSOC);

$llistatDept = $mysqli->query("SELECT idDepartament, nom FROM DEPARTAMENT");
$departaments = $llistatDept->fetch_all(MYSQLI_ASSOC);

?>

<main class="container mt-5">

    <?php include '../../structure/userStructure/navBarUser.php'; ?>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            
            <h1 class="mb-4 text-center">Registrar Incidencia</h1>

            <form action="registrar.php" method="POST">
                
                <!-- Descripció -->
                <div class="mb-3">
                    <label for="descripcio" class="form-label">Descripció</label>
                    <textarea placeholder="Descripció" class="form-control" name="descripcio" id="descripcio" rows=2" required> </textarea>
                </div>

                <!-- Tipus -->
                <div class="mb-3">
                    <label class="form-label">Tipus</label>
                    <select name="idTipus" class="form-control" required>
                        <option value="">-- Selecciona un tipus --</option>

                        <?php foreach ($tipus as $t): ?>
                            <option value="<?php echo $t['idTipus']; ?>">
                                <?php echo $t['nom']; ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <!-- Departament -->
                <div class="mb-3">
                    <label class="form-label">Departament</label>
                    <select name="idDepartament" class="form-control" required>
                        <option value="">-- Selecciona un departament --</option>

                        <?php foreach ($departaments as $dept): ?>
                            <option value="<?php echo $dept['idDepartament']; ?>">
                                <?php echo $dept['nom']; ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                </div>

                <!-- Botón -->
                <div class="d-grid">
                    <button class="btn btn-success">Guardar</button>
                </div>

            </form>

        </div>
    </div>

</main>
<?php include '../../structure/logOut.php'; ?>
<?php include '../../structure/footer.php'; ?>